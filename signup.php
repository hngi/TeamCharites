


<?php
// Include config file
// require_once "config.php";

$con = mysqli_connect('sql12.freemysqlhosting.net','sql12307701', 'E5V4g1DbCE');



mysqli_select_db($con, 'sql12307701');

// $con = mysqli_connect('localhost','root');

// $con = mysqli_connect('fdb22.awardspace.net','3177438_userregistration');

// mysqli_select_db($con, 'userregistration');

// mysqli_select_db($con, 'userregistration');

 
// Define variables and initialize with empty values




 
// Processing form data when form is submitted
if(isset($_POST['submit'])){
 
    // Validate username
    // if(empty(trim($_POST["username"]))){
    //     $username_err = "Please enter a username.";
    // } else{
        // Prepare a select statement
	
        
    
    // Check input errors before inserting in database
    
    	$fname = trim($_POST["firstname"]);
		 $lname = trim($_POST["lastname"]);
		 $username = trim($_POST["username"]);
		 $email = trim($_POST["email"]);
		$password = trim($_POST["password"]);
        
        // Prepare an insert statement
        $sql = "INSERT INTO users (user_firstname, user_lastname, user_username, user_email, user_password) VALUES (?, ?, ?, ?, ? )";
         
        if($stmt = mysqli_prepare($con, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sssss", $param_fname, $param_lname, $param_username, $param_email, $param_password);
            
            // Set parameters
            $param_fname = $fname;
            $param_lname = $lname;
            $param_username = $username;
            $param_email = $email;
            $param_password = $password;

           
            // $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash(It hides the password in the database)
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Redirect to login page
                header("location: registered.php");
            } else{
                echo "Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);

    
    // Close connection
    mysqli_close($con);
}
?>






<!DOCTYPE html>
<html>

<head lang="en">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/signup.css">
	<link href="https://fonts.googleapis.com/css?family=Quicksand&display=swap" rel="stylesheet">
	<title>Login & Signup Page</title>


</head>

<body>

	<nav class="navbar navbar-expand-md text-white navbar-light">
		<div class="container">
			<a class="navbar-brand" href="index.html"><img src="css/img/nav.png" id='nav-logo' alt="Brand"></a>
			<button class="navbar-toggler bg-white" type="button" data-toggle="collapse" data-target="#navbarResponsive">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse text-white" id="navbarResponsive">
				<ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.html">HOME</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="about.html">ABOUT</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="calculator.html">CALCULATOR</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="howto.html">TIPS</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="signup.php">SIGN UP</a>
                    </li>     
                    
                </ul>
			</div>
		</div>
	</nav>



	<div id="container">


		<div id="form-container">


			<!-- <div class="header-links">
				<a href="#">What?</a>
			</div> -->

			<div class="img-form rounded">
			   <img class="img" src="css/img/dollar-resized3.jpg" height="100" width="100%"/>
                <h3 class="text-center text-bold mt-3 mb-3" style="color: #00B300; font-weight: 800;">SIGN UP</h3>
				<form id="register" class="rounded" style="border-radius: 10px;" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" onsubmit="return Validate1()" name="vform">
				<div id="firstname_div">
					<input type="text" name="firstname" placeholder="Firstname" value=""  required="">
					<div id="fname_error"></div>
				</div>

				<div id="lastname_div">
					<input type="text" name="lastname" placeholder=" Lastname" value="" required="">
					 <div id="lname_error"></div>
				</div>

				<div id="username_div">
					<input type="text" name="username" placeholder=" Username" value="" required="">
					 <div id="username_error" style="color:red;"></div>
				</div>

				<div id="email_div">
					<input type="email" name="email" placeholder=" Email address" value="" required="">
					 <div id="email_error"> </div>
				</div>

				<div id="password_div">
					<input type="password" name="password" placeholder=" Password" required="">
					<div id="pass_error" style="color:red;"></div>
				</div>


				<div id="pass_confirm_div">
					<input type="password" name="password_confirm" placeholder="Confirm Password" required="">
					<div id="password_error" style="color:red;"></div>
				</div>
				
				

				<!-- <input id="reg" name="submit" type="Submit"  value="Sign up"> -->
                <button type="submit" name="submit" id="reg">Sign up</button>

				<div id="register-alert">
					<p>Have an account?</p>
					<button type="button" onclick="window.location.href='signin.php'" value="signin">Sign in</button>
				</div>
			</form>
			</div>

			

		</div>

	</div>



	

	<footer>
        <div class="container footer-height">
            <div class="row">
                <div class="col-md-5">
                    <h3>About Us</h3>
                    <p>Charites Finance is a start up that aims to create a stable financial life for its users. We are
                        interested in helping you have a knowledge of your current financial status and assist you in
                        maximizing your money for a secure future.</p>
                </div>
                <div class="col-md-4">
                    <h3>About the App</h3>
                    <p>This free calculator helps you get a view of your financial positon by adding the values of your
                        assets and substracting your liabilites.</p>
                </div>
                <div class="col-md-3">
                    <h3>Contact Us</h3>
                    <address style="margin-bottom:30px;">
                        Team Charites <br>
                        3, Remote House,<br>
                        HNG Avenue, Nigeria <br>
                        +234-1111-0000 <br>
                        info@charitesfinance.com
                    </address>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                <p style='text-align: center' class='animated rollIn'>
                    CharitesFinance.com &copy;  2019
                </p>
            </div>
            </div>
        </div>
        </footer>

 

    <!-- <script type="text/javascript" src="js/script.js"></script> -->
	<script type="text/javascript" src="js/signup.js"></script>
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/popper.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.js"></script>
</body>

</html>

