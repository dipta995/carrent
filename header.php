<?php
  include 'db.php';
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Carbook </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">
    
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">

    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/ionicons.min.css">

    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/jquery.timepicker.css">

    
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/icomoon.css">
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>
    
	  <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container">
	      <a class="navbar-brand" href="index.php">Car<span>Book</span></a>
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>
<style>
  .navbar-nav li a{
    color:#01d28e !important;
  }
</style>
	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
	          <li class="nav-item active"><a href="index.php" class="nav-link">Home</a></li>
	          <!-- <li class="nav-item"><a href="services.php" class="nav-link">Services</a></li> -->
	          <li class="nav-item"><a href="orderlist.php" class="nav-link">Order List</a></li>
            <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="car.php" role="button" data-bs-toggle="dropdown" aria-expanded="false">Cars</a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                      <?php
                        $query = "SELECT * FROM categories";
                        $categories = $con->query($query);
                        foreach ($categories as $key => $value) {
                      ?>
                        <li><a class="dropdown-item" href="car.php?<?php echo $value['category_id']?>"><?php echo $value['cat_name']?></a></li>
              <?php } ?>
                    </ul>
                </li>
	          <!-- <li class="nav-item"><a href="car.php" class="nav-link">Cars</a></li> -->
            <?php
            session_start();
if (isset($_GET['logout'])) {
  session_destroy();
  echo "<script>window.location='index.php';</script>";
  }
	          if (isset($_SESSION['flag'])==true) { ?>
                    <li class="nav-item"><a class="nav-link" href="?logout=logout">Logout</a></li>
                    <?php }else{ ?>   
                     <li class="nav-item"><a href="login.php" class="nav-link">Login</a></li>
                <?php } ?>



	          
	          <li class="nav-item"><a href="contact.php" class="nav-link">Contact</a></li>
	        </ul>
	      </div>
	    </div>
	  </nav>
    <!-- END nav -->
    
    