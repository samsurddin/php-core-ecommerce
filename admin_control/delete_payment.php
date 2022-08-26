<?php 
    if(isset($_REQUEST['delete_payment'])){
        $delete_oder = $_REQUEST['delete_payment'];
        $sql = "delete from user_payment where oder_id=$delete_oder";
        $result = $conn->query($sql);
        if($result){
            echo "<script>alert('You have delete the oder')</script>";
            echo"<script>window.open('index.php?user_payment','_self')</script>";
        }
    }


?>
