<?php 
    if(isset($_REQUEST['category_submit'])){
        $cate_name = $_REQUEST['category_name'];

        $sql_se = "select * from categories where cate_title = '$cate_name'";
        $result_se = $conn->query($sql_se);
        $count = mysqli_num_rows($result_se);
        if($count == 1){
        echo "<script>alert('Category already inserted')</script>";
        echo "<script>window.open('index.php','_self')</script>";
        }else{
            $isql = "INSERT INTO categories (cate_title)value('$cate_name')";
            $result = $conn->query($isql);

            if($result){
                echo "<script>alert('Category inserted successfully')</script>";
                echo "<script>window.open('index.php','_self')</script>";
            }
        }

        
    }

?>

<div class="pt-5 text-light">
    <h3>Insert Category</h3>
    <form action="" method="post">
        <div class="mb-3 w-50 m-auto">
            <label for="form-label" class="form-label">Inser your Category</label>
            <input type="text" class="form-control" name="category_name">
        </div>
        <input type="submit" value="Insert" class="btn btn-success" name="category_submit">
    </form>

</div>