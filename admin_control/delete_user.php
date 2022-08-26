<?php 
    if(isset($_REQUEST['delete_user'])){
        $delete_oder = $_REQUEST['delete_user'];
        $sql = "delete from users_table where oder_id=$delete_oder";
        $result = $conn->query($sql);
        if($result){
            echo "<script>alert('You have delete the oder')</script>";
            echo"<script>window.open('index.php?user_list','_self')</script>";
        }
    }


?>
