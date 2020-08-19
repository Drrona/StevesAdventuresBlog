<?php
    
/* UNCOMMENT FOR LOCAL DB CREDENTIALS
	$dbUser = "root";			
	$dbPass = "root";				
    $db = "steve_adventures";	
   */ 	

/* UNCOMMENT FOR SERVER DB CREDENTIALS */
	$dbUser = "ics325su2022";		
    $dbPass = "6697";				
	$db = "ics325su2022";			
	
    @ $dbc = mysqli_connect('localhost', $dbUser, $dbPass, $db);
    
    if(mysqli_connect_errno() ) {
                echo "Error: could not connect to database. Please try again later.";
                exit;
	}
?>
  