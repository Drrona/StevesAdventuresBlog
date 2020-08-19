<?php    
 
  	if(null === session_id()){
		session_start();
	}
	require("navigation.inc");
    $navigation = new Navigation();
    echo $navigation; 
    
?>

<?php
    
	if ($_SESSION['adminFlag'] !== 1) {
    	header ('Location: login.php'); 
    }
    
	?>
        
    <style>
        h1 {text-align: center;}
        h2 {text-align: center;}
    </style>
    <div class = "mainContent">
		
		<h1 class="indexH1">Administration Page </h1><br />
		<h2 class="indexH1"> 
			<span><a href="edituser.php">Edit Users</a></span> |
			<span><a href="editpost.php">Edit Posts</a></span>
		</h2>
   
    </div>
     
	 </body> 
</html>	 