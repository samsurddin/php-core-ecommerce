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
        <title>Login</title>
    </head>
    <body>
        <div class="container-fluid my-3">
            <h2 class="text-center">User Login</h2>
            <div class="row d-flex align-items-center justify-content-center">
                <div class="col-lg-12 col-xl-6">
                    <form action="" method="post" enctype="multipart/form-data">
                        <!-- Name -->
                        <div class="form-outline mb-4">
                            <label for="user_name" class="form-label">User Name</label>
                            <input type="text" class="form-control" name="user_name" placeholder="Enter your username" autocomplete="off" required="required" />
                        </div>
                        <!-- Password -->
                        <div class="form-outline mb-4">
                            <label for="user_password" class="form-label">User password</label>
                            <input type="password" class="form-control" name="user_password" placeholder="Enter your password" autocomplete="off" required="required" />
                        </div>
                        <!-- Button-->
                        <div class="form-outline mb-4">
                            <input type="submit" class="btn btn-primary" value="Login" name="login_btn">
                            <P class="small  mt-2 pt-2 mb-0"><b>Don't have an account ? <a href="user_reg.php" class="text-danger"> Registar</a></b></P>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>

<?php 

   if(isset($_REQUEST['login_btn'])){
        $name = $_REQUEST['user_name'];
        $password = $_REQUEST['user_password'];

        $sql = "select * from users_table where user_name ='$name'";
        $result = $conn->query($sql);

        $get_data = mysqli_fetch_assoc($result);

        $row_count = mysqli_num_rows($result);
        $duserip = getIPAddress();

        $sql1 = "select * from add_to_cart where ip_address='$duserip'";
        $result1 = $conn->query($sql1);
        $row_cart = mysqli_num_rows($result1);
        if($row_count > 0){
            $_SESSION['user_name']=$name;
            if(password_verify($password,$get_data['user_password'])){
                // echo "<script>alert('Login successfully')</script>";
                if($row_count == 1 and $row_cart==0){
                    $_SESSION['user_name']=$name;
                    echo "<script>alert('Login successfully')</script>";
                    echo "<script>window.open('profile.php','_self')</script>";
                }else{
                    $_SESSION['user_name']=$name;
                    echo "<script>alert('Login successfully')</script>";
                    echo "<script>window.open('payment.php','_self')</script>";
                }
            }else{
                echo "<script>alert('Password is worng')</script>";
            }
        }else{
            echo "<script>alert('Password is worng')</script>";
        }
        

   } 

?>