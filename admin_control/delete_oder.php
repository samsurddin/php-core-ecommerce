<?php 
    if(isset($_REQUEST['delete_oder'])){
        $delete_oder = $_REQUEST['delete_oder'];
        $sql = "delete from user_oders where oder_id=$delete_oder";
        $result = $conn->query($sql);
        if($result){
            echo "<script>alert('You have delete the oder')</script>";
            echo"<script>window.open('index.php?alloder','_self')</script>";
        }
    }


?>
