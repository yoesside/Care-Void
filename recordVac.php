<?php 
  include 'connection.php';
  include 'function.php';
  
  error_reporting(E_ALL ^ E_NOTICE);
  session_start();

  $cname = $_SESSION['centreName'];
  $id = $_POST['vid'];    

  if (isset($_POST['select'])) {    
    $sql = "SELECT * FROM vaccines WHERE vaccineID='$id'";
    $display = mysqli_query($connect,$sql);
    $row = mysqli_fetch_assoc($display);
  }  

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
  <!--  <div id="preloader">
      <img class="preloader" src="images/loaders/heart-loading2.gif" alt="">
   </div> -->
   <!-- END LOADER -->
   <header>
    <div class="header-top wow fadeIn">
     <div class="container">  
      <a class="navbar-brand" href="index.html">
       <img src="images/logo1.png" alt="image">
    </a>             
    <div class="right-header">
       <div class="header-info">
         <div class="info-inner">
           <span class="icontop"><i class="fa fa-user"></i></span>
           <span class="iconcont"><a href="index2.php"><?php echo $cname; ?></a></span> 
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
         <li><a href="index2.php">Home</a></li>
         <li><a class="active" data-scroll href="recordVac.php">Record New Vaccines</a></li>
         <li><a data-scroll href="patientInfo.php">View Request</a></li>
      </ul>                     
   </div>
</nav>              
</div>
</div>
</header>      
  

<div class="col-lg-10 col-md-8 col-sm-6 col-xs-12" style="margin-top: 15%; margin-left: 9%;">  
   <div class="appointment-form mt-5" id="record">
    <a href="viewVac.php" class="btn btn-danger" style="margin-bottom: 1%;">
      <i class="fa fa-angle-left"></i> Back</a>
      <h3><span>+</span> Record New Vaccine Batch</h3>
        <div class="form">
          <form action="#" method="post">
            <fieldset>              
              <div class="col-md-4" style="margin-top: 2%;">                
               <label>Vaccine <?php echo $row['vaccineName']; ?> | 
               <?php echo $row['manufacturer']; ?></label>               
             </div>

              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 select-section">                 
                     <div class="form-group col-md-4" style="margin-top: 2%;">
                        <label>Expire Date</label>
                        <input type="date" name="expired" placeholder="Expiry Date" required>
                     </div>

                     <div class="form-group col-md-4" style="margin-top: 2%;">
                        <label>Quantity Available</label>
                        <input type="number" name="available" placeholder="How many available?" value="500">
                     </div>

                    <div class="form-group col-md-4" style="margin-top: 2%;">
                     <label>Quantity Administered</label>
                     <input type="number" name="administered" placeholder="How many administered?" value="275">
                  </div>             

             </div>            

             <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="row">
                  <div class="form-group">
                    <form action=# method='post'>
                     <input type='hidden' name='vid' value=<?php echo $id; ?> >
                     <div class="center">
                      <button type="submit" name="record">Record New Batch</button>
                    </div>
                   </form>                            
                 </div>
              </div>              
           </div>           
      </fieldset>
      </form>

      <?php 
        $cname = $_SESSION['centreName'];                

        if (isset($_POST['record'])) {                                 
           $id = $_POST['vid'];
           $date = $_POST['expired'];
           $available = $_POST['available'];
           $administered = $_POST['administered'];           

           $sql = "INSERT INTO batch VALUES('','$date','$available','$administered','$id','$cname')";
           $insert = mysqli_query($connect,$sql);

           $newVal = $available - $administered;
           
           if ($insert) {
                $updatesql = "UPDATE batch SET quantityAvailable = '$newVal' WHERE vaccineID = '$id'";
                $update = mysqli_query($connect,$updatesql);
                echo "
                  <script type='text/javascript'>
                  window.location.href = 'index2.php';
                  </script>
                ";
                die();
           }      
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