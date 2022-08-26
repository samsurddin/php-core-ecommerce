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
<style>
    .product_cart{
        width: 50px;
        height: 50px;
        object-fit: contain;
        border-radius: 50%;
}
</style>
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
          <a class="nav-link" href="#"><i class="fa-solid fa-cart-shopping"></i><sub><?php echo cartItem();?></sub></a>
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

        <!-- <li class="nav-item">
        <a class="nav-link"><b>Price : <?php echo TotatAmunt();?> /=</b></a>
        </li> -->
      </ul>
      <!-- <form class="d-flex" role="search" action="index.php" method="get">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search_date">
        <input type="submit" class="btn btn-danger mx-2" value="Search">
        <input type="submit" class="btn btn-primary mx-2" value="Signup">
        <input type="submit" class="btn btn-success mx-2" value="Login">
      </form> -->
    </div>
  </div>
</nav>
<body>


    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="row">

            <?php carts();?>

            <h3 class="text-center mt-4">Cart details</h3>
                <form action="" method="post">
                    <table class="table table-dark table-hover text-center">
                        
                            <?php

                            $user_ip = getIPAddress();
                            $parItem = 0;

                            $amount_sql = "select * from add_to_cart where ip_address='$user_ip'";
                            $amresult = $conn->query($amount_sql);
                            $coun_cart_itm = mysqli_num_rows($amresult);

                            if($coun_cart_itm > 0){
                                echo "<thead>
                                <tr>
                                    <th scope='col'>Product Title</th>
                                    <th scope='col'>Product Image</th>
                                    <th scope='col'>Quantity</th>
                                    <th scope='col'>Totale Price</th>
                                    <th scope='col'>Remove</th>
                                    <th colspan='2'>Operation</th>
                                </tr>
                            </thead>
                            <tbody>";
                            
                                while($row = mysqli_fetch_array($amresult)){
                                $item_id = $row['item_id'];

                                $selete_sql = "select * from product_item where item_id=$item_id";
                                $reesult = $conn->query($selete_sql);
                                
                                    while($itemPrice = mysqli_fetch_array($reesult)){

                                        $price = array($itemPrice['item_price']);

                                        $priceTable = $itemPrice['item_price'];
                                        $itemTitle =  $itemPrice['item_title'];
                                        $itemImg1 =  $itemPrice['item_image1'];
                                        
                                        $values = array_sum($price);
                                        $parItem+=$values;
                                    ?>
                                    
                                                <tr>
                                                    <td><?php echo $itemTitle ?></td>
                                                    <td><img src="./admin_control/images/<?php echo $itemImg1 ?>" alt="" class="product_cart"></td>
                                                    <td><input type="text" name="cart_quty" class="form-control w-50 m-auto"></td>
                                                    <td><b><?php echo $priceTable ?>/=</b></td>

                                                    <?php 
                                                        $userIp = getIPAddress();
                                                        if(isset($_REQUEST['update_cart'])){
                                                            $cart_quty = $_REQUEST['cart_quty'];

                                                            $sqlu = "update add_to_cart set quantity=$cart_quty where ip_address='$userIp'";
                                                            $uresult = $conn->query($sqlu);
                                                            $parItem = $parItem*$cart_quty;
                                                        }
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    ?>



                                                <td><input type="checkbox" class="form-check-input" name="removeitem[]" value="<?php echo $item_id ?>" id=""></td>
                                                
                                                <td>
                                                    <input type="submit" name="update_cart" class="btn btn-outline-primary" value="Update">
                                                    <input type="submit" name="remove_cart" class="btn btn-outline-danger" value="Remove">
                                                </td>
                                            </tr>
                                <?php
                                    }
                                }
                            }else{
                                echo "<h2 class='text-center text-danger'>Your Cart is emty</h2>";
                            }
                            ?>
                        </tbody>
                    </table>
             
                    <div class="d-flex mb-5">
                        <?php 
                                                    $user_ip = getIPAddress();
                        
                                                    $amount_sql = "select * from add_to_cart where ip_address='$user_ip'";
                                                    $amresult = $conn->query($amount_sql);
                                                    $coun_cart_itm = mysqli_num_rows($amresult);
                        
                                                    if($coun_cart_itm > 0){
                                                        echo " <h3 class='px-3'>Subtotal:<strong>  $parItem /=</strong></h3>
                                                        <input type='submit' name='countin' class='bg-info px-3 py-2 mx-3 border-0 text-light' value='Countinue Shopping'>
                                                      
                                                        <button class='bg-secondary px-3 py-2 border-0 text-light'><a href='./user_area/checkout.php' class='text-light text-decoration-none'>Checkout</a></button>";
                                                    }else{
                                                        echo "<input type='submit' name='countin' class='bg-info px-3 py-2 mx-3 border-0 text-light' value='Countinue Shopping'>";
                                                    }
                        
                                                    if(isset($_REQUEST['countin'])){
                                                        echo "<script>window.open('../index.php','_self')</script>";
                                                    }
                        ?>
                       
                    </div>
                
            </form>
            <?php 
                function remove_cart_item(){
                    global $conn;
                    if(isset($_REQUEST['remove_cart'])){
                        foreach($_REQUEST['removeitem'] as $remove_id){
                            echo $remove_id;
                            $dele = "DELETE FROM `add_to_cart` WHERE `add_to_cart`.`item_id` = $remove_id";
                            $rundel = $conn->query($dele);
                            if($rundel){
                                echo "<script>window.open('cart.php','_self')</script>";
                            }
                        }
                    }

                }
            
            $item_remove = remove_cart_item();
            
            
            ?>
          </div>
        </div>
        
         
        
        
      </div>
    </div>
<?php include('./layout/footer.php') ?>