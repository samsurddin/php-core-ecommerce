<?php
include('../connect_func/connect.php');
include('../connect_func/main.php');


if(isset($_REQUEST['userId'])){
    $user_id = $_REQUEST['userId'];
}

$get_userIp = getIPAddress();
$total_price = 0;

$cart_to_oder = "select * from add_to_cart where ip_address = '$get_userIp'";

$result = $conn->query($cart_to_oder);
$invoice = mt_rand();
// echo$invoice;
$status = "pending";
$coun_oder = mysqli_num_rows($result);
// dd($coun_oder);
while($row_price = mysqli_fetch_array($result)){
    $product_id = $row_price['item_id'];

    $item_prod = "select * from product_item where item_id = $product_id";
    $result2=$conn->query($item_prod);

    while($row = mysqli_fetch_array($result2)){

        $item_price = array($row['item_price']);
        $item_value = array_sum($item_price);
        $total_price+=$item_value;

    }

}


$cart_about = "select * from add_to_cart";
$run_about = $conn->query($cart_about);

$get_item_quantity = mysqli_fetch_array($run_about);
$quntity = $get_item_quantity['quantity'];

if($quntity ==0){
    $quntity=1;
    $subtotle = $total_price;
}else{
    $quntity= $quntity;
    $subtotle = $total_price*$quntity;
}

$insert_oder = "insert into user_oders(	user_id,amount_due,invoice_number,total_product,oder_date,oder_status)
values($user_id,$subtotle,$invoice,$coun_oder,NOW(),'$status')";
$result3 = $conn->query($insert_oder);
if($result3){
    echo "<script>alert('Orders are submitted succesfully')</script>";
    echo "<script>window.open('profile.php','_self')</script>";
}

$insert_pending_oder = "insert into order_panding(user_id,invoice_number,product_id,quantity,oder_status)
values($user_id,$invoice,$product_id,$coun_oder,'$status')";
$result4 = $conn->query($insert_pending_oder);


$emty_cart = "delete from add_to_cart where ip_address = '$get_userIp'";
$result5 = $conn->query($emty_cart);
?>