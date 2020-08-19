<?php 	
 
 	if(null === session_id()){
		session_start();
	}

	require("navigation.inc");
	$navigation = new Navigation();
	echo $navigation;
	
	require("controllers/database.php");
  
	if(isset($_POST['Send'])) {  
        $title = $_POST['title'];
        $content = $_POST['content'];
        $medialink = $_POST['medialink'];
    }  
	if(empty($title) || empty($content) || empty($medialink)) {
  
?>			
	<div class="col-md-8 col-lg-9">
          <form action="#/" class="form-contact contact_form" action="contact_process.php" method="post" id="contactForm" novalidate="novalidate">
            <div class="row">
              <div class="col-lg-5">
                <div class="form-group">
                  <input class="form-control" name="title" id="title" type="text" placeholder="Post Title (required)" required>
                </div>
                <div class="form-group">
                <textarea class="form-control different-control w-100" name="content" id="content" required cols="1" rows="1" placeholder="Content Text (required)"></textarea>
                </div>
                <div class="form-group">
                  <input class="form-control" name="medialink" id="medialink" required type="text" placeholder="Media File Path (required)">
                </div>
              </div>
            </div>
            <div class="form-group text-center text-md-mid mt-3">
              <button type="submit" class="button button--active button-contactForm" name="Send" alt="Send" value ="Send">Create Post</button>
			</div>
	</form>



<?php 

} else {
    $getAuthorIdQuery = "select * from authors where username='" . $_SESSION['uname'] . "'"; 
    $getAuthorIdResult = mysqli_query($dbc, $getAuthorIdQuery);

    while ($row = mysqli_fetch_assoc($getAuthorIdResult)) {
        $authorid = $row["idauthors"];
    }

    $getNewPostIdQuery = "select MAX(idposts) as idposts from posts";
    $getNewPostIdResult = mysqli_query($dbc, $getNewPostIdQuery);

    while ($row = mysqli_fetch_assoc($getNewPostIdResult)) {
        $newPostId = $row["idposts"] + 1;
    }
    
    if(empty($title)){
        echo "Post unsuccessful. Title cannot be empty.";
        exit; 
    }
    if(empty($content)){
        echo "Post unsuccessful. Content cannot be empty.";
        exit; 
    }
    if(empty($medialink)){
        echo "Post unsuccessful. Media link cannot be empty.";
        exit; 
    }
    
    $postQuery = "insert into posts VALUES ('" . $newPostId . "','" . $authorid . "','" .  $medialink . "','" . $content . "','". 1 . "','" . date("Y/m/d") . "','" . $title . "')";

    $postQuery = mysqli_query($dbc, $postQuery);

    $checkQuery = "select * from posts where idposts=" . $newPostId;
    $checkResult = mysqli_query($dbc, $checkQuery);
    if(!$checkResult)
    {
        echo "Registration unsuccessful. Please try again later.";
        exit; 
    }
    else 
    {
        echo "Post successful. Go check it out!";
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