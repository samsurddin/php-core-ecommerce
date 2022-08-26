<?php
    if(isset($_REQUEST['delete_category'])){
        $delete_id = $_REQUEST['delete_category'];
      
       $sql = "delete from categories where cate_id=$delete_id";
       $reult = $conn->query($sql);
       
       if($reult){
            echo"<script>alert('Your category has delete')</script>";
            echo"<script>window.open('index.php?view_category','_self')</script>";
       }

    }


?>