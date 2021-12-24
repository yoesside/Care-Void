<?php 
  include 'function.php';
  include 'connection.php';
  session_start();

  $name = $_SESSION['fullname'];   
/*  $getVname = $_POST['vaccineName'];
  $getHC = $_POST['healthCare'];
  $getICP = $_POST['ICP'];  
  $getProposed = $_POST['proposed'];  */

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
   <title>Care Void - My Appointment</title>
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
                        <span class="iconcont"><a href="index.php"><?php echo $name; ?></a></span> 
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
                        <li><a class="active" data-scroll href="myappointment.php">My Appointment</a></li>                                            
                     </ul>
                  </div>

               </nav>              
            </div>
         </div>
      </header>      

      <div class="col-lg-10 col-md-8 col-sm-6 col-xs-12" style="margin-top: 15%; margin-left: 9%;">
                  <div class="appointment-form">
                     <h3><span>+</span> Appointment Status</h3>
                     <div class="form">
                        <table class="table mt-2">
                          <tr>
                             <th scope="col">Vaccination ID</th>                             
                             <th scope="col">Date Requested</th>
                             <th scope="col">Remarks</th>                             
                             <th scope="col">Batch Number</th>  
                             <th scope="col">Status</th>  
                          </tr>

                        
                          <?php 
                              $sql = "SELECT * FROM vaccination WHERE patientName = '$name'";
                              $query = mysqli_query($connect, $sql);

                              $empty = true;

                              if($query){  
                                $empty = false;                              
                                while($row = mysqli_fetch_assoc($query)){
                                  echo "<tr>";
                                  echo "  
                                  <td scope='col'>".$row['vaccinationID']."</td>    
                                  <td scope='col'>".$row['appointmentDate']."</td>
                                  <td scope='col'>".$row['remarks']."</td>    
                                  <td scope='col'>".$row['batchNo']."</td>";

                                  if ($row['status'] == 'Confirmed.') {
                                    echo "<td scope='col' class ='bg-success'>".$row['status']."</td>";
                                  }

                                  else if ($row['status'] == 'Waiting for Confirmation ✅') {
                                    echo "<td scope='col' class ='bg-warning'>".$row['status']."</td>";
                                  }

                                  else if ($row['status'] == 'Rejected.'){
                                    echo "<td scope='col' class ='bg-danger'>".$row['status']."</td>";
                                  }
                                  echo " </tr>";
                                }
                              }

                              else{
                                 $empty = true;
                                 echo "<td colspan='5'><h2 class='card-text'>No appointment made.</h2></td>";                                  
                              }
                           ?>                          
                         
                        </table>
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