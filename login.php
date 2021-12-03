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
                    <h3>Login to our site</h3>
                    <p>Enter username and password to log on:</p>
                  </div>               
                </div>
                <div class="form-bottom">
                  <form role="form" action="#" method="post" class="login-form">
                   <div class="form-group">
                    <label class="sr-only" for="form-username">Username</label>
                    <input type="text" name="username" placeholder="Username" class="form-username form-control" id="form-username" autocomplete="off" >
                  </div>
                  <div class="form-group">
                   <label class="sr-only" for="form-password">Password</label>
                   <input type="password" name="password" placeholder="Password" class="form-password form-control" id="form-password">
                 </div>
                 <button type="submit" onclick="myFunction()" name="submit" class="col-lg-12 btn btn-lg">Sign in!</button>
                 <p style="color: white; margin-top: 20px;" >Don't have account? <a href="register.php">Register now!</a></p>
               </form>

               <!--  Login Session-->
               <?php 
               if (isset($_POST['submit'])) {
                $username = $_POST['username'];
                $password = $_POST['password'];

                $adminsql = "SELECT * FROM administrator WHERE username='$username' AND password = '$password'";

                $patientsql = "SELECT * FROM patient WHERE username='$username' AND password = '$password'";

                $admin = mysqli_query($connect,$adminsql);
                $patient = mysqli_query($connect,$patientsql);

                $cek1 = mysqli_num_rows($admin);
                $cek2 = mysqli_num_rows($patient);

                if ($cek1!=0) {
                  $row1 = mysqli_fetch_assoc($admin);
                  $_SESSION['centreName'] = $row1['centreName'];
                  $_SESSION['staffID'] = $row1['staffID'];
                  $_SESSION['fullname'] = $row1['fullname'];

                  echo "<script type='text/javascript'>
                        window.location.href = 'index2.php'
                      </script>";
                }
                else if($cek2!=0){
                  $row2 = mysqli_fetch_assoc($patient);
                  $_SESSION['fullname']=$row2['fullname'];
                  /*$_SESSION['username'] = $row2['username'];
                  $_SESSION['icpassport'] = $row2['icpassport'];
                  $_SESSION['fullname'] = $row2['fullname'];                  
*/
                    echo "<script type='text/javascript'>
                        window.location.href = 'index.php'
                      </script>";
                }

                else{
                  echo "<script>
                  function myFunction() {
                    alert('No such a data! Please Register first!');
                  }
                  </script>";
                }


                
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