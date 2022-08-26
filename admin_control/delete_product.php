<?php
    if(isset($_REQUEST['delete_product'])){
       $delete_id = $_REQUEST['delete_product'];
    //    echo $delete_id; 

    $sql = "delete from product_item where item_id=$delete_id";
    $result = $conn->query($sql);
    if($result){
        echo "<script> alert('You Succes to Delete item !!')</script>";
        echo "<script>window.open('index.php','_self')</script>";
    }
    }


?>