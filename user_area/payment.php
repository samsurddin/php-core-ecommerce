<?php
include('../connect_func/connect.php');
include('../connect_func/main.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <!-- Fontawsome css -->
    <link rel="stylesheet" href="../css/all.css">
    <title>Document</title>
</head>
<style>
    .payment_img{
        width: 90%;
        margin: auto;
        display: block;
    }
</style>
<body>
    <?php
        $userIps = getIPAddress();

        $user_oder = "select * from `users_table` where user_ip ='$userIps'";
        $result_oder = $conn->query($user_oder);
        $getUser = mysqli_fetch_assoc($result_oder);
        $active_ip = $getUser['user_id'];
    
    
    ?>
   <div class="container">
        <h2 class="text-center text-info">Payment Option</h2>
        <div class="row d-flex justify-content-center align-items-center mt-5">
            <div class="col-md-6">
                <a href="https://www.paypal.com"><img src="../images/carousel/paypal.png" alt="" class="payment_img"></a>
            </div>
            <div class="col-md-6">
                <a href="ordersubmit.php?userId=<?php echo $active_ip?>"><h2 class="text-center">Pay Offline</h2></a>
            </div>
            
        </div>
   </div>
</body>
</html>