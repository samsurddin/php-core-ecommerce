<?php
    if(isset($_REQUEST['edit_category'])){
        $category_id = $_REQUEST['edit_category'];

        $sql = "select * from categories where cate_id =$category_id";
        $result = $conn->query($sql);
        $row = mysqli_fetch_assoc($result);
        $category = $row['cate_title'];
    }


?>
<h3 class="text-light"><?php echo $category_id?> Edit Category</h3>
<form action="" method="post">
    <div class="form-outline mt-4">
        <input type="text" name="update_cate" class="form-control w-50 m-auto" value="<?php echo $category?>">
    </div>
    <div class="form-outline mt-4">
        <input type="submit" name="update" class="btn btn-danger" value="Update">
    </div>
</form>

<?php
    if(isset($_REQUEST['update'])){
        $category_name  = $_REQUEST['update_cate'];
        
        $catesql = "update categories set cate_title='$category_name' where cate_id=$category_id";
        $cateresult = $conn->query($catesql);

        if($cateresult){
            echo"<script>alert('Your category has updated')</script>";
            echo"<script>window.open('index.php?view_category','_self')</script>";
        }

    }

?>