<?php
// Check for cookies setting and if the browser send cookies for the session
if( isset($_COOKIE[session_name()]) ) {
	
	// empty the cookie
	
	setcookie( session_name(), '', time()-86400, '/' );
	
}

//You must start a session before you can destroy it
session_start();
//Clearing all session variables 
session_unset();

//Destroy the session
session_destroy();
echo "You have been logged out! see you next time";
// Checking if the session was destroyed
//print_r($_SESSION);
header("Location: index.php")
?>
