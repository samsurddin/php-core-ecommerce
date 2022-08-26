<?php
    if(isset($_REQUEST['edit_brand'])){
        $brand_id = $_REQUEST['edit_brand'];

        $sql = "select * from brands where brand_id =$brand_id";
        $result = $conn->query($sql);
        $row = mysqli_fetch_assoc($result);
        $brand = $row['brand_title'];
    }


?>
<h3 class="text-light"><?php echo $brand_id?> Edit Brand</h3>
<form action="" method="post">
    <div class="form-outline mt-4">
        <input type="text" name="update_brand" class="form-control w-50 m-auto" value="<?php echo $brand?>">
    </div>
    <div class="form-outline mt-4">
        <input type="submit" name="update" class="btn btn-danger" value="Update">
    </div>
</form>

<?php
    if(isset($_REQUEST['update'])){
        $brand_name  = $_REQUEST['update_brand'];
        
        $catesql = "update brands set brand_title='$brand_name' where brand_id=$brand_id";
        $cateresult = $conn->query($catesql);

        if($cateresult){
            echo"<script>alert('Your brand has updated')</script>";
            echo"<script>window.open('index.php?view_brand','_self')</script>";
        }

    }

?>