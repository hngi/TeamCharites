<?php
require("../includes/db_connection.php");
$first_name_check = $last_name_check = $user_name_check = $email_check = $password_check = $confirm_password_check ="";
$first_name_error = $last_name_error = $email_error = $password_error = $confirm_password_error ="";
$first_name = $last_name = $email = $password ="";
//SIGN UP PROCESS
if(isset($_POST["signup"])){
	
	function validateFormData($data){
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	$data = strip_tags($data);
	
	return $data;
}
	
		$first_name_check = validateFormData($_POST["firstname"]);
		$last_name_check = validateFormData($_POST["lastname"]);
    $user_name_check = validateFormData($_POST["username"]);
		$email_check = validateFormData($_POST["email"]);
		$password_check = validateFormData($_POST["password"]);
		$confirm_password_check = validateFormData($_POST["confirm_password"]);
		
	
		//checking the firstname format
		if(!preg_match("/^[A-Za-z]+$/", $first_name_check) && $first_name_check){
			$first_name_error = "Alphabets only for first name";
		} else if(empty($first_name_check)){
		$first_name_error = "Empty first name not allowed";
	}else{
		$first_name = validateFormData($_POST["firstname"]);
	}
	
	
		//checking the lastname format
		if(!preg_match("/^[A-Za-z]+$/", $last_name_check) && $last_name_check){
			$last_name_error = "alphabets only for last name";
		} else if(empty($last_name_check)){
		$last_name_error = "Empty last name not allowed";
	}else{
		$last_name = validateFormData($_POST["lastname"]);
	}
  
  //checking the username format
		if(!preg_match("/^[A-Za-z]+$/", $user_name_check) && $user_name_check){
			$user_name_error = "alphabets only for username";
		} else if(empty($last_name_check)){
		$user_name_error = "Empty username not allowed";
	}else{
		$user_name = validateFormData($_POST["username"]);
	}
	
		 
    	// checking if it is a valid email
    	if(!filter_var($email_check, FILTER_VALIDATE_EMAIL) && $email_check) {
      		$email_error = "Invalid email format"; 
    	}if(empty($email_check)) {
		$email_error = "Email is required";
		echo 'probLEM EMAIL';
    }else {
		 $email = validateFormData($_POST["email"]);
  	}
	
	if($confirm_password_check !== $password_check){
		$confirm_password_error = "password does not match";
		$password_error = "password does not match";
		echo 'probLEM mEPASS';
	}
	
	
	if(empty($_POST["password"])){
		$password_error = "You can't leave this field empty";
		echo 'probLEM EPASS';
	}else{
		$password = password_hash( validateFormData($_POST['password']), PASSWORD_DEFAULT );
	}
	
	if(empty($_POST["confirmpassword"])){
		$confirm_password_error = "You can't leave this field empty";
		echo 'probLEM cEPASS';
	}else{
		$confirm_password = password_hash( validateFormData($_POST['confirm_password']), PASSWORD_DEFAULT );
	}
	
	$query2 = "SELECT * FROM signup WHERE email = '$email'";
	
	$result2 = mysqli_query($conn, $query2);
	
	if(mysqli_num_rows($result2) > 0){
		$email_error = "This email has been taken";		
		echo 'probLEM EtPASS';
	}
	
	
		//if (empty($email_error) && empty($password_error)&& empty($last_name_error)&& empty($first_name_error)){
			if($password_check === $confirm_password_check && $email && $first_name && $last_name && mysqli_num_rows($result2) < 1){
			$query = "INSERT INTO signup (id, first_name, last_name, email, password, signup_date)
						VALUES (NULL, '$first_name', '$last_name', '$email', '$password',  CURRENT_TIMESTAMP)";
				
				
			
			if(mysqli_query($conn, $query)){
				session_start();
				$_SESSION['calcuser'] = $email;
				//header("Location: calculator.php");
				echo 'REGD_SUCCESS';
			}else{
				
			echo ("Database Error");
	
			}
		}
	// }else{
	// 	echo "sommmme error";
	// }
	
 }
//LOGIN PROCESS
	
mysqli_close($conn);
?>
