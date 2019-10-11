<?php
// Include config file
// require_once "config.php";

//$con = mysqli_connect('sql12.freemysqlhosting.net','sql12307701', 'E5V4g1DbCE');

//$con = mysqli_connect('localhost', 'root', '', 'hng');
//
//mysqli_select_db($con, 'sql12307701');

// try{
//     $pdo = new PDO('mysql:unix_socket=/cloudsql/hngtobi:us-central1:hng;dbname=hng', 'root', '');
// }
// catch(PDOException $e){
//     $output = 'Unable to connect to the database server: ' . $e;
//     echo "<span class= 'alert-danger form-error'> Oops! Something went wrong please try again.</span>";
// }


$con = mysqli_connect('sql12.freemysqlhosting.net','sql12307701', 'E5V4g1DbCE');
mysqli_select_db($con, 'sql12307701');

$messages='';
$error='';



// Processing form data when form is submitted
if(isset($_POST['submit'])){

    $name = trim($_POST["name"]);
    $email = trim($_POST["email"]);
    $phone = trim($_POST["phone"]);
    $message = trim($_POST["message"]);

if(empty($name)){
   $error='name field cant be empty';
}
elseif (empty($email)){
    $error='Mail field Cant be empty';
}
elseif(empty($phone)){
   $error='Phone Field cant be empty';
}
elseif (empty($message)){
    $error='message field cant be empty';
}
elseif (!filter_var($email,FILTER_VALIDATE_EMAIL)){
    $error='Invalid Email Address';
}
else {

//     $pdoquery = "INSERT INTO `contact` (`name`,`email`,`phone`,`message`)VALUES (:a,:b,:j,:d)";
//     $pdoresult = $pdo->prepare($pdoquery);
//     $pdoExec = $pdoresult->execute(array(":a" => $name, ":b" => $email, ":j" => $phone, ":d" => $message));
	
	     $sql = "INSERT INTO contact (`name`,`email`,`phone`,`message`) VALUES (?, ?, ?, ? )";
		$stmt = mysqli_prepare($con, $sql)
			 mysqli_stmt_bind_param($name,$email,$phone,$message);
    if(mysqli_stmt_execute($stmt)){
        $messages='message sent succesfully';
    }
    else{
        $error="Something went wrong. Please try again later.";

    }
}

//
//    $sql = "INSERT INTO contact (name, email, phone, message) VALUES ('$name','$email','$phone','$message')";
//
//    if($con->query($sql)){
//
//        $messages='message sent succesfully';
//    }
//    else{
//        $error="Something went wrong. Please try again later.";
//
//    }
//
//
   mysqli_close($con);
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Contact Us</title>
    <!-- Font awesome -->
    <!-- <link href="font-awesome.css" type='text/css' rel="stylesheet"> -->
    <link href="css/animate.css" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/font-awesome.css">
    <link href="https://fonts.googleapis.com/css?family=Quicksand&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/about.css">
    

    <style>
        .navbar-toggler-icon {
            background-image: url("data:image/svg+xml;charset=utf8,%3Csvg viewBox='0 0 30 30' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath stroke=' #008000 ' stroke-width='2' stroke-linecap='round' stroke-miterlimit='10' d='M4 7h22M4 15h22M4 23h22'/%3E%3C/svg%3E");
        }

        .navbar-toggler {
            border-color: #008000;
        }
    </style>
</head>


<body>
    <nav class="navbar navbar-expand-md text-white navbar-light">
        <div class="container">
            <a class="navbar-brand" href="index.html"><img src="css/img/nav.png" id='logo' alt="Brand"></a>
            <button class="navbar-toggler bg-white" type="button" data-toggle="collapse" data-target="#navbarResponsive">
                <span class="navbar-toggler-icon text-white"></span>
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
						<a class="nav-link" href="howto.html">TIPS</a>
					</li>
                    <li class="nav-item">
                        <a class="nav-link" href="signup.php">REGISTER</a>
                    </li>                
                    <li class="nav-item">
                        <a class="nav-link" href="signin.php">LOGIN</a>
                    </li>                
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-5" class="animate-bottom">
        <div class="text-content">
            <div class="row">
                <div class="col-md-6 mb-4">
                    <h2 class="pt-3">About Us</h2>
                    <img src="css/img/networth.png" id='circle' class='img-flud' alt="">
                    <p>Charites Finance is a start up that aims to create a stable financial life
                        for its users. We are
                        interested in helping you have a knowledge of your current financial status and assist you in
                        maximizing your money for a secure future.</p>
                </div>

                <div class="col-md-6">
                    <h2 class="pt-3">Contact Us</h2>
			 <?php
                    if(!empty($messages)){
                        echo "<div  class='alert-success'>";
                        echo $messages;
                        echo "</div>";
                    }
                    if(!empty($error)){
                        echo "<div  class='alert-danger'>";
                        echo $error;
                        echo "</div>";
                    }
                    ?>
			  <form action="about.php" method="post">

                        <input name="name" type="text" class='field' placeholder="Your Name" >
                        <input name="email" type="email" class="field" placeholder="Email Address" >
                        <input name="phone" type="text" class="field" placeholder="Telephone Number" >
                        <textarea name="message" class="field area" id="" placeholder="Message"></textarea>
                        <button name="submit" type="submit" class='btn'>Submit</button>
                    </form>
<!--                     <form action="">
                        <input type="text" class='field' placeholder="Your Name" required>
                        <input type="email" class="field" placeholder="Email Address" required>
                        <input type="text" class="field" placeholder="Telephone Number" required>
                        <textarea name="" class="field area" id="" placeholder="Message"
                            required></textarea>
                        <button type="submit" class='btn'>Submit</button>
                    </form> -->
                </div>
            </div>
        </div>
    </div>
   

    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-5">
                    <h3 class=''>About Us</h3>
                    <p>Charites Finance is a start up that aims to create a stable financial life for its users. We are
                        interested in helping you have a knowledge of your current financial status and assist you in
                        maximizing your money for a secure future.</p>
                </div>
                <div class="col-md-4">
                    <h3 class=''>About the App</h3>
                    <p>This free calculator helps you get a view of your financial positon by adding the values of your
                        assets and substracting your liabilites.</p>
                </div>
                <div class="col-md-3">
                    <h3 class='      '>Contact Us</h3>
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
                <p style='text-align: center' class='   rollIn'>
                    CharitesFinance.com &copy;  2019
                </p>
            </div>
            </div>
        </div>
        </footer>


    <script src="js/jquery.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.js"></script>

</body>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->


</html>
