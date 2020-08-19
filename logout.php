<?php 
	session_start();     
	session_unset();
	session_destroy();
 
	session_start();
 
	$_SESSION['logoutMessage'] = "You have succesfully logged out.";
    
    header("Location: index.php");

?>
