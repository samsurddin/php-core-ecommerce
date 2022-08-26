
    <h3 class="text-danger mb-4">Delete Account</h3>
    <form action="" method="post" class="mt-5">
        <div class="form-outline mb-4 ">
            <input type="submit" class="form-control m-auto w-50" name="delete" value="Delete Account">
        </div>
        <div class="form-outline mb-4 ">
            <input type="submit" class="form-control m-auto w-50" name="dont_delete" value="Don't Delete Account">
        </div>
    </form>

    <?php
        $user_name_session = $_SESSION['user_name'];
        if(isset($_REQUEST['delete'])){
            $sql_delete = "delete from users_table where user_name='$user_name_session'";
            $result = $conn->query($sql_delete);

            if($result){
                session_destroy();
                echo "<script>alert('Your account hasbeen delete')</script>";
                echo "<script>window.open('../index.php','_self')</script>";
            }
        }
    
        if(isset($_REQUEST['dont_delete'])){
            echo "<script>window.open('profile.php','_self')</script>";
        }
    ?>