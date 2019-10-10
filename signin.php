<?php


session_start();
 

$con = mysqli_connect('sql12.freemysqlhosting.net','sql12307701', 'E5V4g1DbCE');
mysqli_select_db($con, 'sql12307701');
// $con = mysqli_connect('localhost','root');

// $con = mysqli_connect('fdb22.awardspace.net','3177438_userregistration');



// mysqli_select_db($con, 'userregistration');

// $username = $password = "";
// $username_err = $password_err = "";
 
// Define variables and initialize with empty values

 
// Processing form data when form is submitted
// if($_SERVER["REQUEST_METHOD"] == "POST")
if(isset($_POST['submit'])){
 
   


        $username = trim($_POST["username1"]);
		$password = trim($_POST["password1"]);

        $sql = "SELECT * FROM users WHERE user_username = ? AND user_password = ?";
        
        if($stmt = mysqli_prepare($con, $sql)){
            // Bind variables to the prepared statement as parameters

            mysqli_stmt_bind_param($stmt, "ss", $param_username, $param_password);
            
            // Set parameters
            $param_username = $username;
            $param_password = $password;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Store result
                mysqli_stmt_store_result($stmt);
                
                // Check if username exists, if yes then verify password
                if(mysqli_stmt_num_rows($stmt) == 1){                    
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt, $username, $password);
                    if(mysqli_stmt_fetch($stmt)){
                        // if(password_verify($password, $password)){
                    		
                            // Password is correct, so start a new session
                            session_start();
                            
                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            // $_SESSION["user_id"] = $id;
                            $_SESSION["user_username"] = $username; 

                            
                            // Redirect user to welcome page
                            header("location: calculator.html");
                        // }
                        
                    }
                } 

                
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
        
        // Close statement
        mysqli_stmt_close($stmt);
    // }
    
    // Close connection
    mysqli_close($con);
}




// }

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

			<div class="img-form">
			   <img class="img" src="css/img/dollar-resized3.jpg"/>
			   
				<form id="log-in" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>"  method="post" name="uform">
					
						<input type="text" name="username1" placeholder=" Username" value="" >
						 <div id="username1_error" style="color:red;"></div>
					

					
						<input type="password" name="password1" placeholder=" Password">
						 <div id="pass1_error" style="color:red;"></div>

					

					<input id="login" name="submit" type="Submit"  value="Sign in">

					<div id="login-alert">
						<p>Don't have an account?</p>
						<button type="button" onclick="window.location.href='signup.php'" value="signup">Sign up</button>
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

