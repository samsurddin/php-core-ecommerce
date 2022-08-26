<?php 
    include('../connect_func/connect.php');
    @session_start();

    if(isset($_REQUEST['oder_id'])){
        $user_oder_id = $_REQUEST['oder_id'];
        // echo $user_oder_id;

        $sql = "select * from user_oders where oder_id=$user_oder_id";
        $result = $conn->query($sql);
        $row = mysqli_fetch_assoc($result);
        $invoice_num = $row['invoice_number'];
        $amounted_oder = $row['amount_due'];
    }

    if(isset($_REQUEST['confirm_payment'])){
        $invoice = $_REQUEST['invoice_number'];
        $amount = $_REQUEST['amount'];
        $payment_method = $_REQUEST['payment_mood'];

        $sql_insert = "insert into user_payment(oder_id,invoice_number,amount,payment_mode,date)
        values($user_oder_id,$invoice,$amount,'$payment_method',NOW())";
        $result_in = $conn->query($sql_insert);
        
        if($result_in){
            echo "<script>alert('Your payment is completed by user end')</script>";
            echo "<script>window.open('profile.php?myoder','_self')</script>";
        }
        $sql_update = "update user_oders set oder_status='Complete' where oder_id =$user_oder_id";
        $result_up = $conn->query($sql_update);
    }
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
<body class="bg-secondary">
    
    <div class="container my-5">
    <h1 class="text-center text-light">Confrim Payment</h1>
        <form action="" method="post">
            <div class="form-outline my-4 text-center w-50 m-auto">
                <input type="text" class="form-control" name="invoice_number" value="<?php echo $invoice_num?>">
            </div>
            <div class="form-outline my-4 text-center w-50 m-auto">
                <input type="text" class="form-control" name="amount" value="<?php echo $amounted_oder ?>">
            </div>
            <div class="form-outline my-4 text-center w-50 m-auto">
               <select name="payment_mood" id="" class="form-select">
                    <option>Select Payment Mode</option>
                    <option>UPI</option>
                    <option>Netbanking</option>
                    <option>Paypal</option>
                    <option>Cash On Delivery</option>
                    <option>Pay Offline</option>
               </select>
            </div>
            <div class="form-outline my-4 text-center w-50 m-auto">
                <input type="submit" class="btn btn-success" value="Confirm" name="confirm_payment">
            </div>
        </form>
    </div>
</body>
</html>