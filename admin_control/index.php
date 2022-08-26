<?php  
    include('../connect_func/connect.php');
    include('../connect_func/main.php');
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
    <link rel="stylesheet" href="../css/main.css">
    <title></title>
    <style>
        .navbar{
            height: 100%;
        }
        .prod_img{
            width: 72px;
            border-radius: 44%;
            height: 35px;
            object-fit: contain;
        }
        .edit_prod{
            border-radius: 50%;
            width: 100px;
            height: 56px;
            /* margin-left: 7px; */
            object-fit: contain;
        }
        
    </style>
</head>
<nav class="navbar bg-light">
  <div class="container-fluid">
    <span class="navbar-brand mb-0 h1"><?php echo $_SESSION['username']?></span>
  </div>
</nav>
<div class="">
    <div class="row">
        <div class="col-md-2">
        <div class="card border-0" style="width: 15rem;">
        <nav class="navbar mt-4 ">
            <ul class="navbar-nav mx-auto text-center  p-3 mb-5 bg-body ">
                <li class="nav-item"><a href="index.php?insert_product" class="nav-link text-light btn btn-info mb-2 mt-4">Insert Product</a></li>
                <li class="nav-item"><a href="index.php?view_product" class="nav-link text-light btn btn-info mb-2">View Product</a></li>
                <li class="nav-item"><a href="index.php?insert_category" class="nav-link text-light btn btn-info mb-2">Insert Category</a></li>
                <li class="nav-item"><a href="index.php?view_category" class="nav-link text-light btn btn-info mb-2">View Category</a></li>
                <li class="nav-item"><a href="index.php?insert_brand" class="nav-link text-light btn btn-info mb-2">Insert Brands</a></li>
                <li class="nav-item"><a href="index.php?view_brand" class="nav-link text-light btn btn-info mb-2">View Brands</a></li>
                <li class="nav-item"><a href="index.php?alloder" class="nav-link text-light btn btn-info mb-2">All oders</a></li>
                <li class="nav-item"><a href="index.php?user_payment" class="nav-link text-light btn btn-info mb-2">All Payments</a></li>
                <li class="nav-item"><a href="index.php?user_list" class="nav-link text-light btn btn-info mb-2">All Users</a></li>
                <li class="nav-item"><a href="index.php?admin_logout" class="nav-link text-light btn btn-info mb-2">Logout</a></li>
            </ul>
        </nav>
        </div>
        </div>
        <div class="col-md-10 text-center  ">
            <div class="container bg-dark h-100 shadow-lg ">
            <?php 
            if(isset($_SESSION['username'])){
                if(isset($_REQUEST['insert_category'])){
                    include('insert_category.php');
                }
                if(isset($_REQUEST['view_category'])){
                    include('view_category.php');
                }
                if(isset($_REQUEST['edit_category'])){
                    include('edit_category.php');
                }
                if(isset($_REQUEST['delete_category'])){
                    include('delete_category.php');
                }

                //_________________________________//

                if(isset($_REQUEST['insert_brand'])){
                    include('insert_brand.php');
                }
                if(isset($_REQUEST['view_brand'])){
                    include('view_brand.php');
                }
                if(isset($_REQUEST['edit_brand'])){
                    include('edit_brand.php');
                }
                if(isset($_REQUEST['delete_brand'])){
                    include('delete_brand.php');
                }

                //___________________________________//
                 
                if(isset($_REQUEST['insert_product'])){
                    include('insert_product.php');
                }
                if(isset($_REQUEST['view_product'])){
                    include('view_product.php');
                }
                if(isset($_REQUEST['edit_product'])){
                    include('edit_product.php');
                }
                if(isset($_REQUEST['delete_product'])){
                    include('delete_product.php');
                }
                
                
               
                if(isset($_REQUEST['alloder'])){
                    include('alloder.php');
                }  
                if(isset($_REQUEST['delete_oder'])){
                    include('delete_oder.php');
                } 
                

                
                if(isset($_REQUEST['user_payment'])){
                    include('user_payment.php');
                } 
                if(isset($_REQUEST['delete_payment'])){
                    include('delete_payment.php');
                } 

                if(isset($_REQUEST['user_list'])){
                    include('user_list.php');
                }

                if(isset($_REQUEST['delete_user'])){
                    include('delete_user.php');
                }
                if(isset($_REQUEST['admin_logout'])){
                    include('admin_logout.php');
                }
            }else{
                echo"<script>window.open('../index.php','_self')</script>";
            }
                
            ?>
            </div>
            
        </div>
    </div>
</div>
