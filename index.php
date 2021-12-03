<?php 
  include 'function.php';  
  include 'connection.php';
  session_start();

  $name = $_SESSION['fullname'];  
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
   <title>Care Void</title>
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
      <!-- <div id="preloader">
         <img class="preloader" src="images/loaders/heart-loading2.gif" alt="">
      </div> -->
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
                        <span class="iconcont"><a href="myappointment.php">
                          <?php echo $name; ?>
                        </a></span> 
                     </div>
                     
                     <div class="info-inner">
                        <span class="icontop"><i class="fa fa-clock-o" aria-hidden="true"></i></span>
                        <span class="iconcont"><a data-scroll href="logout.php">Logout</a></span> 
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
                        <li><a class="active" href="index.php">Home</a></li>
                        <li><a data-scroll href="#service">Request Vaccines</a></li>
                        <li><a data-scroll href="myappointment.php">My Appointment</a></li>
                        <li><a data-scroll href="#about">About us</a></li>                                                
                     </ul>                     
                  </div>
               </nav>              
            </div>
         </div>
      </header>
      <div id="home" class="parallax first-section wow fadeIn" data-stellar-background-ratio="0.4" style="background-image:url('images/slider-bg.png');">
         <div class="container">
            <div class="row">
               <div class="col-md-12 col-sm-12">
                  <div class="text-contant">
                     <h2>
                        <span class="center"><span class="icon"><img src="images/icon-logo.png" alt="#" /></span></span>
                        <a href="" class="typewrite" data-period="2000" data-type='[ "Welcome to Care Void", "Find Nearest Vaccine Provider", "Your Safety is Number One!" ]'>
                        <span class="wrap"></span>
                        </a>
                     </h2>
                  </div>
               </div>
            </div>
            <!-- end row -->
         </div>
         <!-- end container -->
      </div>
      <!-- end section -->
      <div id="time-table" class="time-table-section">
         <div class="container">
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
               <div class="row">
                  <div class="service-time one" style="background:#2895f1;">
                     <span class="info-icon"><i class="fa fa-ambulance" aria-hidden="true"></i></span>
                     <h3>Emergency Case</h3>
                     <p>Prevent your family & friends from Covid-19, always ready to contact us!</p>
                  </div>
               </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
               <div class="row">
                  <div class="service-time middle" style="background:#0071d1;">
                     <span class="info-icon"><i class="fa fa-clock-o" aria-hidden="true"></i></span> 
                     <h3>Working Hours</h3>
                     <div class="time-table-section">
                        <ul>
                           <li><span class="left">Monday - Friday</span><span class="right">8.00 – 18.00</span></li>
                           <li><span class="left">Saturday</span><span class="right">8.00 – 16.00</span></li>
                           <li><span class="left">Sunday</span><span class="right">8.00 – 13.00</span></li>
                        </ul>
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
               <div class="row">
                  <div class="service-time three" style="background:#0060b1;">
                     <span class="info-icon"><i class="fa fa-hospital-o" aria-hidden="true"></i></span>
                     <h3>Health Care</h3>
                     <p>Every Health Care you know will provide vaccines every time.</p>
                  </div>
               </div>
            </div>
         </div>
      </div>

            <div id="service" class="services wow fadeIn">
         <div class="container">
            <div class="row">
               <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <div class="appointment-form">
                     <h3><span>+</span> Available Health Care</h3>
                     <div class="form">
                        <table class="table mt-2">
                          <tr>
                             <th scope="col">No</th>
                             <th scope="col">Health Care</th>
                             <th scope="col">Address</th>                       
                             <th scope="col">Action</th>
                          </tr>
                          <?php                              
                              $sql = "SELECT * FROM administrator";
                              $display = mysqli_query($connect,$sql);
                              $no=1;                              
                              while($row = mysqli_fetch_assoc($display)){           
                                echo "<tr>";
                                echo "<td scope='col'>".$no++."</td>";        
                                echo "<td scope='col'>".$row['centreName']."</td>";   
                                echo "<td scope='col'>".$row['address']."</td>";        
                                echo "<td scope='col'>
                                <form action='vaccine.php' method='post'>
                                <input type='hidden' name='centre' value=".$row['centreName'].">
                                <button class='btn btn-success' type='submit' name='select'>Select</button>
                                </form>
                                </td>";
                                echo "</tr>";
                              }
                                 
                           ?>                                                                     
                        </table>
                     </div>
                  </div>
               </div>               
            </div>
         </div>
      </div>    


      <div id="about" class="section wow fadeIn">
         <div class="container">
            <div class="heading">
               <span class="icon-logo"><img src="images/icon-logo.png" alt="#"></span>
               <h2>What We Provide</h2>
            </div>
            <!-- end row -->
            <hr class="hr1">
            <div class="row">
               <div class="col-md-3 col-sm-6 col-xs-12 ">
                  <div class="service-widget">
                     <div class="post-media wow fadeIn">
                        <a href="images/clinic_01.jpg" data-rel="prettyPhoto[gal]" class="hoverbutton global-radius"><i class="flaticon-unlink"></i></a>
                        <img src="images/clinic_01.jpg" alt="" class="img-responsive">
                     </div>
                     <h3>Provide Available Health Care</h3>
                  </div>
                  <!-- end service -->
               </div>
               <div class="col-md-3 col-sm-6 col-xs-12">
                  <div class="service-widget">
                     <div class="post-media wow fadeIn">
                        <a href="images/clinic_02.jpg" data-rel="prettyPhoto[gal]" class="hoverbutton global-radius"><i class="flaticon-unlink"></i></a>
                        <img src="images/clinic_02.jpg" alt="" class="img-responsive">
                     </div>
                     <h3>Find Available Vaccine Batch</h3>
                  </div>
                  <!-- end service -->
               </div>
               <div class="col-md-3 col-sm-6 col-xs-12">
                  <div class="service-widget">
                     <div class="post-media wow fadeIn">
                        <a href="images/clinic_03.jpg" data-rel="prettyPhoto[gal]" class="hoverbutton global-radius"><i class="flaticon-unlink"></i></a>
                        <img src="images/clinic_03.jpg" alt="" class="img-responsive">
                     </div>                     
                     <h3>Manage Vaccine Appointment</h3>
                  </div>
                  <!-- end service -->
               </div> 
               <div class="col-md-3 col-sm-6 col-xs-12">
                  <div class="service-widget">
                     <div class="post-media wow fadeIn">
                        <a href="images/clinic_05.jpg" data-rel="prettyPhoto[gal]" class="hoverbutton global-radius"><i class="flaticon-unlink"></i></a>
                        <img src="images/clinic_05.jpg" alt="" class="img-responsive">
                     </div>                     
                     <h3>View Manufacturers</h3>
                  </div>
                  <!-- end service -->
               </div>               
            </div>
            <!-- end row -->
         </div>
         <!-- end container -->
      </div>
      <!-- end section -->

      <footer id="footer" class="footer-area wow fadeIn">
         <div class="container">
            <div class="row">
               <div class="col-md-4">
                  <div class="logo padding">
                     <a href=""><img src="images/icon-logo.png" style="width: 100px; height: 80px;"></a>
                     <p>Care Void Will Always Care For You!</p>
                  </div>
               </div>
               <div class="col-md-4">
                  <div class="footer-info padding">
                     <h3>CONTACT US</h3>
                     <p><i class="fa fa-map-marker" aria-hidden="true"></i> PT. Kimia Farma - Denpasar, Bali</p>
                     <p><i class="fa fa-paper-plane" aria-hidden="true"></i> info@gmail.com</p>
                     <p><i class="fa fa-phone" aria-hidden="true"></i> (+62) 881 123 456</p>
                  </div>
               </div>               
            </div>
         </div>
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
