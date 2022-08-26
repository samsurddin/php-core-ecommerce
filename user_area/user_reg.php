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
    <title>Reg</title>
</head>
<body>
    <div class="container-fluid my-3">
        <h2 class="text-center">User Registion Area</h2>
        <div class="row d-flex align-items-center justify-content-center">
            <div class="col-lg-12 col-xl-6">
                <form action="" method="post" enctype="multipart/form-data">
                    <!-- Name -->
                    <div class="form-outline mb-4">
                        <label for="user_name" class="form-label">User Name</label>
                        <input type="text" class="form-control" name="user_name" placeholder="Enter your username" autocomplete="off" required="required" />
                    </div>
                    <!-- Name -->
                    <div class="form-outline mb-4">
                        <label for="user_email" class="form-label">User Email</label>
                        <input type="email" class="form-control" name="user_email" placeholder="Enter your email" autocomplete="off" required="required" />
                    </div>
                    <!-- Image -->
                    <div class="form-outline mb-4">
                        <label for="user_image" class="form-label">User Image</label>
                        <input type="file" class="form-control" name="user_image" autocomplete="off" required="required" />
                    </div>
                    <!-- Password -->
                    <div class="form-outline mb-4">
                        <label for="user_password" class="form-label">User password</label>
                        <input type="password" class="form-control" name="user_password" placeholder="Enter your password" autocomplete="off" required="required" />
                    </div>
                    <!--Confirm Password -->
                    <div class="form-outline mb-4">
                        <label for="user_confirm_password" class="form-label">User confirm password</label>
                        <input type="password" class="form-control" name="user_confirm_password" placeholder="Enter your confirm password" autocomplete="off" required="required" />
                    </div>
                     <!-- Address -->
                     <div class="form-outline mb-4">
                        <label for="user_address" class="form-label">User Address</label>
                        <input type="text" class="form-control" name="user_address" placeholder="Enter your Address" autocomplete="off" required="required" />
                    </div>
                     <!-- Contact -->
                     <div class="form-outline mb-4">
                        <label for="user_contact" class="form-label">User Number</label>
                        <input type="number" class="form-control" name="user_contact" placeholder="Enter your Number" autocomplete="off" required="required" />
                    </div>
                     <!-- Submitting date -->
                     <div class="form-outline mb-4">
                        <input type="submit" class="btn btn-outline-primary" value="Registar" name="register_btn">
                        <P class="small  mt-2 pt-2 mb-0"><b>Already have an account ? <a href="login.php" class="text-danger">Login</a></b></P>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>

<?php

if(isset($_REQUEST['register_btn'])){
    
    $user_name = $_REQUEST['user_name'];
    $user_email = $_REQUEST['user_email'];
    $user_pasw = $_REQUEST['user_password'];
    $hash_pas = password_hash($user_pasw,PASSWORD_DEFAULT);
    $user_cpaws = $_REQUEST['user_confirm_password'];
    $user_address = $_REQUEST['user_address'];
    $user_num = $_REQUEST['user_contact'];

    $user_imgae = $_FILES['user_image']['name'];
    $temp_user_imgae = $_FILES['user_image']['tmp_name'];

    $user_ip = getIPAddress();

    $ssql = "select * from users_table where user_name='$user_name' or user_email='$user_email'";

    $result = $conn->query($ssql);
    $coun_row = mysqli_num_rows($result);

    if($coun_row > 0){

        echo "<script>alert('Username is already execst')</script>";
        
    }else if($user_pasw!=$user_cpaws){

        echo "<script>alert('Password are not match')</script>";

    }else{

        move_uploaded_file($temp_user_imgae,"./userImage/$user_imgae");

        $inset_sql = "insert into users_table (user_name,user_email,user_password,user_iamge,user_ip,user_addres,user_phone)
        values('$user_name','$user_email','$hash_pas','$user_imgae','$user_ip','$user_address','$user_num')";

        $sql_exectute = $conn->query($inset_sql);
        if($sql_exectute){
            echo "<script>alert('Insert success')</script>";
        }
    }


    $select_cart = "select * from add_to_cart where ip_address = '$user_ip'";
    $result_cart = $conn->query($select_cart);
    
    $count_cart = mysqli_num_rows($result_cart);

    if($count_cart > 0 ){
        $_SESSION['user_name']=$user_name;
        echo "<script>alert('You have item in your cart')</script>";
        echo "<script>window.open('checkout.php','_self')</script>";
    }else{
        echo "<script>window.open('../index.php','_self')</script>";
    }
}



?>