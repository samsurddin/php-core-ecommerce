<?php 
define('TITLE','Home');
// include('./layout/header.php');
include('../connect_func/connect.php');
// include('../connect_func/main.php');
session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- bootstrap css -->
    <link rel="stylesheet" href="../css/bootstrap.css">
    <!-- Fontawsome css -->
    <link rel="stylesheet" href="../css/all.css">
    <!-- Castome Css -->
    <link rel="stylesheet" href="./css/main.css">
    <title><?php echo TITLE ?></title>
</head>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
  <a class="navbar-brand" href="#">
      <img src="../images/amazon-512.webp" alt="" width="30" height="30" class="d-inline-block align-text-top">
      <!-- <b>mazon</b> -->
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="../index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../cart.php"><i class="fa-solid fa-cart-shopping"></i><sub></sub></a>
        </li>
        
        <li class="nav-item">
        <?php 
          if(isset($_SESSION['user_name'])){
            echo "<a class='nav-link' href='#'><b><i class='fa-solid fa-person'></i>".$_SESSION['user_name']."</b></sub></a>";
          }else{
            echo"<a class='nav-link' href='#'><b><i class='fa-solid fa-person'></i> Guste</b></sub></a>";
          }
        ?>
        </li>
      </ul>

    </div>
  </div>
</nav>

<body>


    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="row">
            <?php 
               if(!isset($_SESSION['user_name'])){
                    include('login.php');
               }else{
                    include('payment.php');
               }
              
            ?>     
            
          </div>
        </div>
 
        
        
      </div>
    </div>
    </body>
    <!-- bootstrap css -->
    <script src="../js/bootstrap.bundle.js"></script>
    <!-- Fontawsome css -->
    <script src="../js/all.js"></script>
</html>