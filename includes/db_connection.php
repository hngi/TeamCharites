<?php
	$server		 = 'localhost';
	$user		 = 'root';
	$password	 = '';
	$db			 = 'teamcharites';
	$conn		 = mysqli_connect($server, $user, $password, $db);
	if(!$conn){
		die("connection to this database failed: " .mysqli_connect_error());
	}
	//echo "Connection successful";
?>
