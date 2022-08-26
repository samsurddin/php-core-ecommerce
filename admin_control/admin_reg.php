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
    <link rel="stylesheet" href="../css/bootstrap.css">
    <!-- Fontawsome css -->
    <link rel="stylesheet" href="../css/all.css">
    <!-- Castome Css -->
    <link rel="stylesheet" href="../css/main.css">
    <title>Admin Registration</title>
    <style>
         .admin_area{
    width: 67%;
    margin-left: 16%;
}
    </style>
</head>
<body>
    <div class="container-fluid m-3">
        <h2 class="text-center mb-5">Admin Registration</h2>
        <div class="row d-flex justify-centent-center">
            <div class="col-lg-6">
                <img src="./images/admin.png" alt="Admin Reg" class="admin_area">
            </div>
            <div class="col-lg-6">
                <form action="" method="post">
                    <div class="form-outline mb-4">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" name="username" placeholder="Enter Your username" class="form-control">
                    </div>
                    <div class="form-outline mb-4">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" name="email" placeholder="Enter Your email" class="form-control">
                    </div>
                    <div class="form-outline mb-4">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" name="password" placeholder="Enter Your password" class="form-control">
                    </div>
                    <div class="form-outline mb-4">
                        <label for="cpassword" class="form-label">Confirm Password</label>
                        <input type="password" name="cpassword" placeholder="Enter Your confirm password" class="form-control">
                    </div>
                    <div class="">
                        <input type="submit" class="bg-info py-2 px-3 border-0 text-light" name="admin_registration" value="Register">
                        <p class="small fw-bold mt-2 pt-1">Do you already have an account? <a href="admin_login.php" class="link-danger">Login</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
<?php
    if(isset($_REQUEST['admin_registration'])){
       $name = $_REQUEST['username'];
       $email = $_REQUEST['email'];
       $password = $_REQUEST['password'];
       $cpassword = $_REQUEST['cpassword'];
       
       $sqr_pass = password_hash($password,PASSWORD_DEFAULT);

       $sql = "select * from admin where admin_name = '$name' or admin_email='$email'";
       $result = $conn->query($sql);
       $count_admin = mysqli_num_rows($result);
       if($count_admin == 1){
            echo "<script>alert('Username is already execst')</script>";    
       }elseif($password!=$cpassword){
            echo "<script>alert('Password is not match each other')</script>";
       }else{
            $admin_sql = "insert into admin(admin_name,admin_email,admin_password)values('$name','$email','$sqr_pass')";
            $admin_result = $conn->query($admin_sql);
            if($admin_result){
                echo "<script>alert('you have succesfully create account')</script>";    
                echo "<script>window.open('index.php','_self')</script>";    
            }
       }
    }

?>