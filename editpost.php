<?php    
 
  	if(null === session_id()){
		session_start();
	}
	require("navigation.inc");
    $navigation = new Navigation();
    echo $navigation; 
    
?>
