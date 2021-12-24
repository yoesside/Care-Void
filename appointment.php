<?php 

  include 'connection.php';
  include 'function.php';
  
  session_start();

  error_reporting(E_ALL ^ E_NOTICE);
  $name = $_SESSION['fullname'];    
  $bn = $_POST['batchNo'];
  $vname = $_POST['vaccineName'];

  $getProposed = $_POST['pdate'];  
  $getReal = $_POST['expireDate'];  

  $getHC = $_POST['hc'];

  $sql = "SELECT * FROM patient WHERE fullname = '$name'";
  $con = mysqli_query($connect, $sql);
  $row = mysqli_fetch_assoc($con);    

 ?>
<!DOCTYPE html>
<html lang="en">
   <!-- Basic -->
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <!-- Mobile Metas -->
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <meta name="viewport" content="initial-scale=1, maximum-scale=1">
   <!-- Site Metas -->
   <title>Care Void - Appointment</title>
   <meta name="keywords" content="">
   <meta name="description" content="">
   <meta name="author" content="">
   <!-- Site Icons -->
   <link rel="shortcut icon" href="images/fevicon.ico.png" type="image/x-icon" />
   <link rel="apple-touch-icon" href="images/apple-touch-icon.png">
   <!-- Bootstrap CSS -->
   <link rel="stylesheet" href="css/bootstrap.min.css">
   <!-- Site CSS -->
   <link rel="stylesheet" href="style.css">
   <!-- Colors CSS -->
   <link rel="stylesheet" href="css/colors.css">
   <!-- ALL VERSION CSS -->
   <link rel="stylesheet" href="css/versions.css">
   <!-- Responsive CSS -->
   <link rel="stylesheet" href="css/responsive.css">
   <!-- Custom CSS -->
   <link rel="stylesheet" href="css/custom.css">
   <!-- Modernizer for Portfolio -->
   <script src="js/modernizer.js"></script>
   <!-- [if lt IE 9] -->
   </head>
   <body class="clinic_version">
      <!-- LOADER -->
      <div id="preloader">
         <img class="preloader" src="images/loaders/heart-loading2.gif" alt="">
      </div>
      <!-- END LOADER -->
      <header>
          <div class="header-top wow fadeIn">
            <div class="container">  
              <a class="navbar-brand" href="index.php">
                <img src="images/logo1.png" alt="image">
              </a>             
               <div class="right-header">
                  <div class="header-info">
                     <div class="info-inner">
                        <span class="icontop"><i class="fa fa-user"></i></span>
                        <span class="iconcont"><a href="index.php"><?php echo $name;?></a></span> 
                     </div>
                     
                     <div class="info-inner">
                        <span class="icontop"><i class="fa fa-clock-o" aria-hidden="true"></i></span>
                        <span class="iconcont"><a data-scroll href="login.php">Logout</a></span> 
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="header-bottom wow fadeIn">
            <div class="container">
               <nav class="main-menu">
                  <div class="navbar-header">
                     <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar"><i class="fa fa-bars" aria-hidden="true"></i></button>
                  </div>
              
                  <div id="navbar" class="navbar-collapse collapse">
                     <ul class="nav navbar-nav">
                        <li><a href="index.php">Home</a></li>
                        <li><a class="active" href="appointment.php">Request Vaccines</a></li>
                        <li><a data-scroll href="myappointment.php">My Appointment</a></li>
                     </ul>
                  </div>
               </nav>              
            </div>
         </div>
      </header>      

      <div class="col-lg-10 col-md-8 col-sm-6 col-xs-12" style="margin-top: 15%; margin-left:9%;">
                  <div class="appointment-form">
                     <h3><span>+</span> Book Appointment</h3>
                     <div class="form">
                        <form action="#" method="post">
                           <fieldset>                      
                              <h5 style="margin-top: 2%;">
                                 <?php 
                                    $cek = dateFormat($getProposed) > dateFormat($getReal);                                   
                                    if($cek){
                                       echo "<div class='alert alert-danger' role='alert'>
                                       The date chosen must not exceed the expiration date of the vaccine. Please select another date!
                                       </div> ";

                                       echo "<script type='text/javascript'>
                                          setTimeout(function () {
                                             window.location.href = 'index.php'; 
                                            }, 4000);
                                            </script>";
                                    }                 
                                 ?>
                              </h5>        
                              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 select-section">
                                 <div class="row">
                                    <div class="form-group">
                                       <label> Full Name </label>
                                       <input type="text" name="name" placeholder="Your Full Name"value="<?php echo $name; ?>">
                                    </div>
                                    
                                    <div class="form-group">
                                       <label> Email </label>
                                      <input type="email" name="email" placeholder="Email Address">
                                    </div>                                    
                                 </div>

                                 <div class="row" style="margin-top: 2%;">
                                   <div class="form-group">
                                    <label> IC Passport </label>
                                    <input type="text" name="ICP" placeholder="ICP Pasport" value="<?php echo $row['icpassport']; ?>">
                                    </div>

                                    <div class="form-group">
                                       <label> Batch Number </label>
                                       <input type="text" name="batchNo" placeholder="Batch Number" value="<?php echo $bn; ?>">
                                    </div>
                                 </div>                             
                              </div>                              

                              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 select-section">
                                 <div class="row">
                                    <div class="form-group">
                                       <input type="hidden" name="date" value="<?php echo $getProposed ?>">
                                    </div>                                    
                                 </div>
                              </div>

                              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                 <div class="row">
                                    <div class="form-group">
                                       <textarea rows="4" id="textarea_message" class="form-control" name="remarks" placeholder="Your Message..."></textarea>
                                       <input type="hidden" name="vaccineName" value="<?php echo $vname; ?>">
                                       <input type="hidden" name="healthCare" value="<?php echo $getHC; ?>">

                                       <input type="hidden" name="proposed" value="<?php echo $getProposed; ?>">
                                    </div>
                                 </div>
                              </div>
                              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                 <div class="row">
                                    <div class="form-group">
                                       <div class="center"><button type="submit" name="book">Submit</button></div>
                                    </div>
                                 </div>
                              </div>                              
                           </fieldset>                           
                        </form>

                        <?php 
                           if (isset($_POST['book'])){
                              //record full name & vaccine names
                              $name = $_POST['name'];                               
                              //getting input from user and pass value to database
                              $date = $_POST['date'];
                              $batchNo = $_POST['batchNo'];
                              $msg = $_POST['remarks'];

                              $sql = "INSERT INTO vaccination VALUES('','$date','Waiting for Confirmation ✅', '$msg','$batchNo','$name')";
                              $run  = mysqli_query($connect, $sql);
                              $row = mysqli_fetch_assoc($run);                              

                              echo "<script>
                              window.location.href= 'myappointment.php';
                              </script>";
                           }

                         ?>                                             
                     </div>
                  </div>
               </div>


      <footer id="footer" class="footer-area wow fadeIn">         
      </footer>
      <div class="copyright-area wow fadeIn">
         <div class="container">
            <div class="row">
               <div class="col-md-8">
                  <div class="footer-text">
                     <p>© Copyright 2021</p>
                  </div>
               </div>               
            </div>
         </div>
      </div>
      <!-- end copyrights -->
      <a href="#home" data-scroll class="dmtop global-radius"><i class="fa fa-angle-up"></i></a>
      <!-- all js files -->
      <script src="js/all.js"></script>
      <!-- all plugins -->
      <script src="js/custom.js"></script>
      <!-- map -->
     <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCNUPWkb4Cjd7Wxo-T4uoUldFjoiUA1fJc&callback=myMap"></script>
   </body>
</html>