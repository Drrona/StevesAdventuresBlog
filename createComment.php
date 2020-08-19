<?php 	
 
 	if(null === session_id()){
		session_start();
	}

	require("navigation.inc");
	$navigation = new Navigation();
	echo $navigation;
	
	require("controllers/database.php");
  
	if(isset($_POST['Send'])) {
	    
        $comment = $_POST['comment'];
        $postid = $_GET["id"];	
	}  

	if(!isset($comment)) {
  
?>			
	<div class="col-md-8 col-lg-9">
          <form action="#/" class="form-contact contact_form" action="contact_process.php" method="post" id="contactForm" novalidate="novalidate">
            <div class="row">
              <div class="col-lg-6">
              <div class="form-group">
                <textarea class="form-control different-control w-100" name="comment" id="comment" required cols="1" rows="1" placeholder="Enter Your Comment Here!"></textarea>
                </div>
              </div>
            </div>
            <div class="form-group text-center text-md-left mt-3">
              <button type="submit" class="button button--active button-contactForm" name="Send" alt="Send" value ="Send">Submit Comment</button>
			</div>
	</form>



<?php 

} else {
    
    $getCommentIdQuery = "select MAX(idcomments) as idcomments from comments";
    $getCommentIdResult = mysqli_query($dbc, $getCommentIdQuery);

    while($row = mysqli_fetch_assoc($getCommentIdResult))
    {
        $newCommentId = $row["idcomments"] + 1;
    }
    
    $getAuthorIdQuery = "select * from authors where username='" . $_SESSION['uname'] . "'"; 

    $getAuthorIdResult = mysqli_query($dbc, $getAuthorIdQuery);

    while ($row = mysqli_fetch_assoc($getAuthorIdResult)) {
        $authorid = $row["idauthors"];
    }
           
    $postCommentQuery = "insert into comments VALUES ('". $newCommentId . "','" . $authorid . "','" . $comment . "','" . date("Y/m/d") . "','" . $postid . "'," . True . ")";
    $postCommentResult = mysqli_query($dbc, $postCommentQuery);

    $checkQuery = "select * from comments where idcomments=" . $newCommentId; 
    $checkResult = mysqli_query($dbc, $checkQuery);
    if(!$checkResult)
    {
        echo "Comment post was unsuccessful. Please try again later.";
        exit; 
    }
    else {
        echo "Comment posted successfully! Go check it out!";
        exit; 
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