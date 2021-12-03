<?php 

include "connection.php";
include 'function.php';
error_reporting(E_ALL ^ E_NOTICE);
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Care Void - Landing Page</title>

	<!-- CSS -->
	<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
	<link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="assets/css/form-elements.css">
	<link rel="stylesheet" href="assets/css/style.css">


	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

        <!-- Favicon and touch icons -->
        <link rel="shortcut icon" href="images/fevicon.ico.png">
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/ico/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/ico/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/ico/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="assets/ico/apple-touch-icon-57-precomposed.png">

    </head>

    <body>

    	<!-- Top content -->
    	<div class="top-content">

    		<div class="inner-bg">
    			<div class="container">
    				<div class="row">
    					<div class="col-sm-8 col-sm-offset-2 text">                            
    						<h1><img src="images/logo-2.png" width="500"></h1>
    						<div class="description">
    							<p>
    								We have Vaccines! Stay Safe, Stay Healthy.
    							</p>
    						</div>
    					</div>
    				</div>

    				<div class="row">
    					<div class="col-sm-5">

    						<div class="form-box">
    							<div class="form-top">
    								<div class="form-top-left">
    									<h3>Sign up - Patient</h3>
    									<p>Fill in the form below to get access:</p>
    								</div>
    								<div class="form-top-right">
    									<i class="fa fa-pencil"></i>
    								</div>
    							</div>
    							<div class="form-bottom">
    								<form role="form" action="" method="post" class="registration-form">
    									<div class="form-group">
    										<label class="sr-only" for="form-last-name">Username</label>
    										<input type="text" name="username" placeholder="Username" class="form-last-name form-control" id="form-last-name" autocomplete="off" required>
    									</div>

    									<div class="form-group">
    										<label class="sr-only" for="form-first-name">Full name</label>
    										<input type="text" name="fullname" placeholder="Full name" class="form-first-name form-control" id="form-first-name" autocomplete="off" required>
    									</div>

    									<div class="form-group">
    										<label class="sr-only" for="form-email">Email</label>
    										<input type="text" name="email" placeholder="Email" class="form-email form-control" id="form-email" autocomplete="off" required>
    									</div>

    									<div class="form-group">
    										<label class="sr-only" for="form-password">Password</label>
    										<input type="password" name="password" placeholder="Create Password" class="form-password form-control" id="form-password" autocomplete="off" required>
    									</div>

    									<div class="row mt-5">
    										<button type="submit" name="regpatient" class=" col-lg-12 btn btn-lg">Sign Up</button>  
    									</div>
    								</form>

    								<?php 
    								if (isset($_POST['regpatient'])) {
    									$uname = $_POST['username'];
    									$fname = $_POST['fullname'];
    									$email = $_POST['email'];
    									$password= $_POST['password'];    						

    									$sql = "INSERT INTO patient VALUES('', '$uname','$fname', '$email','$password')";
    									$insert = mysqli_query($connect, $sql);

    									/*echo "<script type='text/javascript'>
    										window.location.href = 'login.php'
    									</script>";*/
    								}

    								?>
    							</div>
    						</div>

    					</div>

    					<div class="col-sm-1 middle-border"></div>
    					<div class="col-sm-1"></div>

    					<div class="col-sm-5">

    						<div class="form-box">
    							<div class="form-top">
    								<div class="form-top-left">
    									<h3>Sign up - Administrator</h3>
    									<p>Fill in the form below to get access:</p>
    								</div>
    								<div class="form-top-right">
    									<i class="fa fa-pencil"></i>
    								</div>
    							</div>

    							<div class="form-bottom">
    								<form role="form" action="#" method="post" class="registration-form">
    									<div class="form-group">
    										<label class="sr-only" for="form-last-name">Username</label>
    										<input type="text" name="username" placeholder="Username" class="form-last-name form-control" id="form-last-name" autocomplete="off" required>
    									</div>

    									<div class="form-group">
    										<label class="sr-only" for="form-first-name">Full name</label>
    										<input type="text" name="fullname" placeholder="Full name" class="form-first-name form-control" id="form-first-name" autocomplete="off" required>
    									</div>

    									<div class="form-group">
    										<label class="sr-only" for="form-email">Email</label>
    										<input type="text" name="email" placeholder="Email" class="form-email form-control" id="form-email" autocomplete="off" required>
    									</div>

    									<div class="form-group">
    										<label class="sr-only" for="form-password">Password</label>
    										<input type="password" name="password" placeholder="Create Password" class="form-password form-control" id="form-password" autocomplete="off" required>
    									</div>    								

    									<div class="form-group">
    										<h4 class="card-text">*Centre Name</h4>
    										<select class="form-select" name="centreName" style="width: 100%; font-size: 15px; height: 50px;">
    											<option style="font-size: 15px;">Sanglah</option>
    											<option style="font-size: 15px;">Prima</option>
    											<option style="font-size: 15px;">Surya</option>
                                                <option style="font-size: 15px;">Bross</option>
                                                <option style="font-size: 15px;">Kasih-Ibu</option>
    										</select>
    									</div>

    									<div class="form-group">    							
    										<input type="text" name="address" placeholder="Address" class="form-control" autocomplete="off" required >
    									</div>

    									<div class="row mt-5">
    										<button type="submit" name="reghealthcare" class=" col-lg-12 btn btn-lg">Sign Up</button>  
    									</div>
    								</form>

    								<?php 

    								if (isset($_POST['reghealthcare'])) {
    									$uname = $_POST['username'];
    									$fname = $_POST['fullname'];
    									$email = $_POST['email'];
    									$password= $_POST['password'];    						
    									$centre = $_POST['centreName']; 
    									$address = $_POST['address'];     									

    									$sql = "INSERT INTO administrator VALUES('', '$uname','$fname', '$email','$password','$centre','$address')";
    									$insert = mysqli_query($connect, $sql);     			

    									echo "<script type='text/javascript'>
    										window.location.href = 'login.php'
    									</script>";     			    									
    								}

    								?>
    							</div>
    						</div>

    					</div>
    				</div>

    			</div>
    		</div>

    	</div>

    	<!-- Javascript -->
    	<script src="assets/js/jquery-1.11.1.min.js"></script>
    	<script src="assets/bootstrap/js/bootstrap.min.js"></script>
    	<script src="assets/js/jquery.backstretch.min.js"></script>
    	<script src="assets/js/scripts.js"></script>

        <!--[if lt IE 10]>
            <script src="assets/js/placeholder.js"></script>
        <![endif]-->

    </body>

    </html>