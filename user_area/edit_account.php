<?php 
    if(isset($_REQUEST['edit_account'])){
        $StoreSessonName = $_SESSION['user_name'];

        $sql = "select * from users_table where user_name= '$StoreSessonName'";
        $result = $conn->query($sql);
        $row = mysqli_fetch_assoc($result);
        $id = $row['user_id'];
        $name = $row['user_name'];
        $email = $row['user_email'];
        $address = $row['user_addres'];
        $phone = $row['user_phone'];
    }
        if(isset($_REQUEST['userupdate'])){
            $update_name = $_REQUEST['username'];
            $update_email = $_REQUEST['useremail'];
            $update_address = $_REQUEST['useraddres'];
            $update_mobile = $_REQUEST['usermobile'];

            $update_image = $_FILES['userimg']['name'];
            $img_tmp = $_FILES['userimg']['tmp_name'];
            
            move_uploaded_file($img_tmp,"./userImage/$update_image");
            $usql = "update `users_table` set user_name='$update_name',user_email='$update_email',user_addres='$update_address',user_phone='$update_mobile',user_iamge='$update_image' where user_id=$id";
            
            $uresult = $conn->query($usql);

            if($uresult){
                echo "<script>alert('Update Success')</script>";
                echo "<script>window.open('logout.php','_self')</script>";
            }
            
        }
   
    


?>
<h3 class="text-center text-success mb-4 mt-5"> Edit Account </h3>
<form action="" method="post" enctype="multipart/form-data" >
    <div class="form-outline mb-4">
        <input type="text" class="form-control w-50 m-auto" name="username" value="<?php echo $name ?>">
    </div>
    <div class="form-outline mb-4">
        <input type="email" class="form-control w-50 m-auto" name="useremail" value="<?php echo $email ?>">
    </div>
    <div class="form-outline mb-4 d-flex w-50 m-auto">
        <input type="file" class="form-control " name="userimg">
        <img src="./userImage/<?php echo $imgGet ?>" alt="" class="img_edit">
    </div>
    <div class="form-outline mb-4">
        <input type="text" class="form-control w-50 m-auto" name="useraddres" value="<?php echo $address ?>">
    </div>
    <div class="form-outline mb-4">
        <input type="mobile" class="form-control w-50 m-auto" name="usermobile" value="<?php echo $phone ?>">
    </div>
    
        <input type="submit" class="btn btn-info" name="userupdate" value="Update">
    
</form>