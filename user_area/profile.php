<?php 
// define('TITLE','Profile');
include('../connect_func/connect.php');
include('../connect_func/main.php');
@session_start();

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
    <link rel="stylesheet" href="../css/main.css">
    <title><?php echo $_SESSION['user_name'] ?></title>
</head>
<style>
  .profile_img{
    width: 100%;
    height: 100%;
    margin: auto;
    display: block;

    object-fit: contain;
    
  }
  .img_edit{
    width: 100px;
    height: 100px;
    object-fit: contain;
  }
</style>
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
          <a class="nav-link" href="../cart.php"><i class="fa-solid fa-cart-shopping"></i><sub><?php echo cartItem();?></sub></a>
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

        <li class="nav-item">
        <a class="nav-link"><b>Price : <?php echo TotatAmunt();?> /=</b></a>
        </li>
      </ul>
      <form class="d-flex" role="search" action="index.php" method="get">
        
        
        <?php 
          if(isset($_SESSION['user_name'])){
            echo "<a href='../user_area/logout.php' class='btn btn-success mx-2'>Logout</a>";
          }else{
            echo"<a href='../user_area/login.php' class='btn btn-success mx-2'>Login</a>
            <a href='../user_area/user_reg.php' class='btn btn-primary mx-2'>Signup</a>";
          }
        ?>
        

      </form>
    </div>
  </div>
</nav>

<body>


    <div class="container-fluid">
      <div class="row">
        <div class="col-md-2 p-0 shadow-lg mt-2">

          
          <ul class="navbar-nav navbar-light bg-light text-center" style="height: 90vh;">
              <li class="nav-items text-light">
                  <a href="" class="nav-link text-dark"><h4>Profile</h4></a>
              </li>
              <?php 
               $username = $_SESSION['user_name'];
               $userImg = "select * from users_table where user_name='$username'";
               $userImgresult = $conn->query($userImg);
               $row = mysqli_fetch_array($userImgresult);
               $imgGet = $row['user_iamge'];
              
              ?>
              <li class="nav-items text-light">
                  <img src="./userImage/<?php echo $imgGet?>" alt="" class="profile_img my-4">
              </li>
              <li class="nav-items text-light">
                  <a href="profile.php" class="nav-link text-dark"><b>Pending Order</b> </a>
              </li>
              <li class="nav-items text-light">
                  <a href="profile.php?edit_account" class="nav-link text-dark"><b> Edit Account</b></a>
              </li>
              <li class="nav-items text-light">
                  <a href="profile.php?myoder" class="nav-link text-dark"><b>My Order</b></a>
              </li>
              <li class="nav-items text-light">
                  <a href="profile.php?delete_account" class="nav-link text-dark"><b>Delete Account</b></a>
              </li>
              <li class="nav-items text-light">
                  <a href="logout.php" class="nav-link text-dark"><b>logout</b></a>
              </li>
            </ul>
          
          
        </div>
        <div class="col-md-10 text-center">
            <?php 
             if(isset($_SESSION['user_name'])){

                OderDetails();

                if(isset($_REQUEST['edit_account'])){
                    include('edit_account.php');
                }
                if(isset($_REQUEST['myoder'])){
                  include('my_oders.php');
                }
                if(isset($_REQUEST['delete_account'])){
                  include('delete_account.php');
                }
            }else{
              echo"<script>window.open('../index.php','_self')</script>";
            }
          
            ?>
            
        </div>
      </div>
    </div>
    <!-- bootstrap css -->
    <script src="../js/bootstrap.bundle.js"></script>
    <!-- Fontawsome css -->
    <script src="../js/all.js"></script>
</html>