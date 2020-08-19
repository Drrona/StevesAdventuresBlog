<?php 	
 
 	if(null === session_id()){
		session_start();
	}

	require("navigation.inc");
	$navigation = new Navigation();
	echo $navigation;
	
	require("controllers/database.php");
  
	if(isset($_POST['Send'])) {
	    
	$username = $_POST['userName'];
	$password = $_POST['password'];
	
	}  

	if((!isset($username)) || (!isset($password))) {
  
?>			
	<div class="col-md-8 col-lg-9">
          <form action="#/" class="form-contact contact_form" action="contact_process.php" method="post" id="contactForm" novalidate="novalidate">
            <div class="row">
              <div class="col-lg-5">
                <div class="form-group">
                  <input class="form-control" name="userName" id="userName" type="text" placeholder="Username">
                </div>
                <div class="form-group">
                  <input class="form-control" name="password" id="password" type="password" placeholder="Password">
                </div>
              </div>
            </div>
            <div class="form-group text-center text-md-left mt-3">
              <button type="submit" class="button button--active button-contactForm" name="Send" alt="Send" value ="Send">Log-In</button>
			</div>
	</form>



<?php 

} else {
    
    $loginQuery = "select isAdmin from authors where username = '" . $username . "' and 
    password = sha1('" . $password . "')";
    
    $result = mysqli_query($dbc, $loginQuery);
           
          
    if($result->num_rows == 0) {
        
        echo "We have no account with those credentials. Please try again.";
        exit;
        
    }
        
	$_SESSION['uname'] = $username;
	
	$_SESSION['confirmMessage'] = "Welcome " . $_SESSION['uname'];
	
	while ($row = mysqli_fetch_assoc($result)) {
		if (($row["isAdmin"]) == 1)
		{
			$_SESSION['adminFlag'] = 1;
		}
		else 
		{
			$_SESSION['adminFlag'] = 0;
		}
	}
	
	
	header("Location: index.php");
           
        
        ?>
        
      <div class="breadcrumb">
		<nav>
		  <ul>
		    <li><a href="../index.php">home</a></li> 
		    <li><a href="">login</a></li> 
		  </ul>
		</nav>
	</div>
        
        <div class ="mainContent">
        	Your username or password are not correct. Please try again. <br /><br>
        	<a href = "login.php">Back to Login</a>       
        </div>
       
   <?php 
       
         }

?>
	</body>
</html>