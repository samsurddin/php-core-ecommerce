delete_brand
<?php
    if(isset($_REQUEST['delete_brand'])){
        $delete_id = $_REQUEST['delete_brand'];
      
       $sql = "delete from brands where brand_id=$delete_id";
       $reult = $conn->query($sql);
       
       if($reult){
            echo"<script>alert('Your brand has delete')</script>";
            echo"<script>window.open('index.php?view_brand','_self')</script>";
       }

    }


?>