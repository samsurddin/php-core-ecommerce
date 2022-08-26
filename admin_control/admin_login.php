<?php
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
    <link rel="stylesheet" href="../css/bootstrap.css">
    <!-- Fontawsome css -->
    <link rel="stylesheet" href="../css/all.css">
    <!-- Castome Css -->
    <link rel="stylesheet" href="../css/main.css">
    <title>Admin Login</title>
    <style>
         .admin_area{
                width: 67%;
                margin-left: 16%;
        }
    </style>
</head>
<body>
    <div class="container-fluid m-3">
        <h2 class="text-center mb-5">Admin Login</h2>
        <div class="row d-flex justify-centent-center">
            <div class="col-lg-6">
                <img src="./images/admin.png" alt="Admin Reg" class="admin_area">
            </div>
            <div class="col-lg-6">
                <form action="" method="POST">
                    <div class="form-outline mb-4">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" name="username" placeholder="Enter Your username" class="form-control">
                    </div>
                    <div class="form-outline mb-4">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" name="user_password" placeholder="Enter Your password" class="form-control">
                    </div>
                    <div class="">
                        <input type="submit" class="bg-info py-2 px-3 border-0 text-light" name="admin_login" value="Login">
                        <p class="small fw-bold mt-2 pt-1">Don't you have an account? <a href="admin_reg.php" class="link-danger">Login</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
<?php
    if(isset($_REQUEST['admin_login'])){
        $name_admin = $_REQUEST['username'];
        $password = $_REQUEST['user_password'];

        $sql = "SELECT * FROM `admin` where admin_name ='$name_admin'";
        $result = $conn->query($sql);

        $get_data = mysqli_fetch_assoc($result);

        $row_count = mysqli_num_rows($result);
        
        
        if($row_count > 0){
            $_SESSION['username']=$name_admin;
            if(password_verify($password,$get_data['admin_password'])){
                echo "<script>alert('Login successfully')</script>";
                echo "<script>window.open('./index.php','_self')</script>";
                
            }else{
                echo "<script>alert('Password is worng')</script>";
            }
        }else{
            // echo "<script>alert('Password is worng')</script>";
        }
    }



?>