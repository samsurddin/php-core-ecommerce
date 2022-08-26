<?php 
define('TITLE','Home');
// include('./layout/header.php');
include('./connect_func/connect.php');
include('./connect_func/main.php');
session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- bootstrap css -->
    <link rel="stylesheet" href="./css/bootstrap.css">
    <!-- Fontawsome css -->
    <link rel="stylesheet" href="./css/all.css">
    <!-- Castome Css -->
    <link rel="stylesheet" href="./css/main.css">
    <title><?php echo TITLE ?></title>
</head>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
  <a class="navbar-brand" href="#">
      <img src="./images/amazon-512.webp" alt="" width="30" height="30" class="d-inline-block align-text-top">
      <!-- <b>mazon</b> -->
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="cart.php"><i class="fa-solid fa-cart-shopping"></i><sub><?php echo cartItem();?></sub></a>
        </li>
        
        <li class="nav-item">
        <?php 
          if(isset($_SESSION['user_name'])){
            echo "<a class='nav-link' href='#'><b><i class='fa-solid fa-person'></i>".$_SESSION['user_name']."</b></a>";
          }else{
            echo"<a class='nav-link' href='#'><b><i class='fa-solid fa-person'></i> Guste</b></sub></a>";
          }
        ?>
          
        </li>
        <li class="nav-item">
           <?php
              if(isset($_SESSION['user_name'])){
                echo "<a class='nav-link' href='./user_area/profile.php'><b>Profile</b></a>";
              }else{
                echo "<a class='nav-link' href='./user_area/user_reg.php'><b>Creat Account</b></a>";
              }
           
           ?>
        </li>
        <li class="nav-item">
        <a class="nav-link"><b>Price : <?php echo TotatAmunt();?> /=</b></a>
        </li>
        
      </ul>
      <form class="d-flex" role="search" action="index.php" method="get">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search_date">
        <input type="submit" class="btn btn-danger mx-2" value="Search">
        <?php 
          if(isset($_SESSION['user_name'])){
            echo "<a href='./user_area/logout.php' class='btn btn-success mx-2'>Logout</a>";
          }else{
            echo"<a href='./user_area/login.php' class='btn btn-success mx-2'>Login</a>
            <a href='./user_area/user_reg.php' class='btn btn-primary mx-2'>Signup</a>";
          }
        ?>
        

      </form>
    </div>
  </div>
</nav>
<?php include('./layout/slidebar.php'); ?>
<body>


    <div class="container">
      <div class="row">
        <div class="col-md-10">
          <div class="row">

            <?php carts();?>

          

            <?php 
               
               search_fun();
               //  This is for suarching 
               getProducts();
              //  This is for suarching categories
               getUniqeCategories();
               //  This is for suarching brands
               getUniqeBrands();
            ?>     
            
          </div>
        </div>
        <div class="col-md-2">
        
          <div class="card border-0" style="width: 20rem;">
          <div class="">
          <ul class="navbar-nav mx-auto text-center shadow-lg p-3 mb-5 bg-body rounded">
            <h4 class="text-dark pt-4 mb-0">Categories</h4>
            <b><hr></b>
              <li class="nav-items">

              <?php       
                  Categories();
                    
                ?>

              </li>
            </ul>
          </div>
           <div class="">
           <ul class="navbar-nav mx-auto text-center shadow-lg p-3 mb-5 bg-body ">
            <h4 class="text-dark ">Brands</h4>
              <b><hr></b>
              <li class="nav-items">

                <?php 
                       bRand();     
                ?>
                  
              </li>
            </ul>
           </div>

          </div> 
          
        </div>
         
        
        
      </div>
    </div>
<?php include('./layout/footer.php') ?>