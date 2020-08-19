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
    $password2 = $_POST['password2'];
    $age = $_POST['age'];
    $aboutme = $_POST['aboutMe'];
    $email = $_POST['email'];
    $profilepic = $_POST['profilePic'];
    $displayName = $_POST['displayName'];
	
	}  

	if((!isset($username)) || (!isset($password))) {
  
?>			
	<div class="col-md-8 col-lg-9">
          <form action="#/" class="form-contact contact_form" action="contact_process.php" method="post" id="contactForm" novalidate="novalidate">
            <div class="row">
              <div class="col-lg-5">
                <div class="form-group">
                  <input class="form-control" name="userName" id="userName" type="text" placeholder="Username (required)" required>
                </div>
                <div class="form-group">
                  <input class="form-control" name="password" id="password" required type="password" placeholder="Password (required)">
                </div>
                <div class="form-group">
                  <input class="form-control" name="password2" id="password2" required type="password" placeholder="Re-Enter Password (required)">
                </div>
                <div class="form-group">
                  <input class="form-control" name="age" id="age" required type="number" placeholder="Age (required)">
                </div>
                <div class="form-group">
                <textarea class="form-control different-control w-100" name="aboutMe" id="aboutMe" required cols="1" rows="1" placeholder="About Me (required)"></textarea>
                </div>
                <div class="form-group">
                  <input class="form-control" name="email" id="email" type="text" placeholder="Email (required)">
                </div>
                <div class="form-group">
                  <input class="form-control" name="profilePic" id="profilePic" type="text" placeholder="Profile Pic File Path (required)">
                </div>
                <div class="form-group">
                  <input class="form-control" name="displayName" id="displayName" type="text" placeholder="Display Name (required)">
                </div>
              </div>
            </div>
            <div class="form-group text-center text-md-mid mt-3">
              <button type="submit" class="button button--active button-contactForm" name="Send" alt="Send" value ="Send">Register</button>
			</div>
	</form>



<?php 

} else {
    
    $selectQuery = "select MAX(idauthors) as idauthor from authors";
    $selectResult = mysqli_query($dbc, $selectQuery);

    while($row = mysqli_fetch_assoc($selectResult))
    {
        $newId = $row["idauthor"] + 1;
    }
    
    if(empty($username)){
        echo "Registration unsuccessful. Username cannot be empty.";
        exit; 
    }
    if(empty($password)){
        echo "Registration unsuccessful. Password cannot be empty.";
        exit; 
    }
    if($password != $password2){
        echo "Registration unsuccessful. Passwords do not match.";
        exit; 
    }
    if(empty($age)){
        echo "Registration unsuccessful. Age cannot be empty.";
        exit; 
    }
    if(empty($aboutme)){
        echo "Registration unsuccessful. About Me cannot be empty.";
        exit; 
    }
    if(empty($email)){
        echo "Registration unsuccessful. Email cannot be empty.";
        exit; 
    }
    if(empty($profilepic)){
        echo "Registration unsuccessful. Profile Pic cannot be empty.";
        exit; 
    }
    if(empty($displayName)){
        echo "Registration unsuccessful. Display Name cannot be empty.";
        exit; 
    }
    
    $checkUsername = "select * from authors where username='" . $username . "'"; 
    $checkUsernameResult = mysqli_query($dbc, $checkUsername);
    if ($checkUsernameResult->num_rows > 0) {
        echo "Registration unsuccessful. Username already exists.";
        exit; 
    }
    
    $registerQuery = "insert into authors VALUES ('" . $newId . "','" . $username . "','" .  sha1($password) . "','" . $age . "','" . $aboutme . "','" . $email . "','" . $profilepic . "'," . "False". ",'" . $displayName. "')";
    echo $registerQuery;
    $registerResult = mysqli_query($dbc, $registerQuery);

    $checkQuery = "select * from authors where idauthors=" . $newId;
    $checkResult = mysqli_query($dbc, $checkQuery);
    echo $checkQuery;
    if(!$checkResult)
    {
        echo "Registration unsuccessful. Please try again later.";
        exit; 
    }
    $_SESSION['uname'] = $username;
	
	$_SESSION['confirmMessage'] = "Welcome " . $_SESSION['uname'];

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