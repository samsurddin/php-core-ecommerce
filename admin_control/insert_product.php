<?php

if(isset($_REQUEST["Product_submit"])){
    
    $item_title = $_REQUEST['item_title'];
    $item_key = $_REQUEST['item_key'];
    $item_desc = $_REQUEST['item_desc'];
    $item_brand = $_REQUEST['item_brand'];
    $item_cate = $_REQUEST['item_cate'];
    $item_peice = $_REQUEST['item_peice'];
    $item_status = true;
    
    $item_image1 = $_FILES['item_img1']['name'];
    $item_image2 = $_FILES['item_img1']['name'];
    $item_image3 = $_FILES['item_img1']['name'];

    $temp_image1 = $_FILES['item_img1']['tmp_name'];
    $temp_image2 = $_FILES['item_img1']['tmp_name'];
    $temp_image3 = $_FILES['item_img1']['tmp_name'];

    if($item_title =="" or $item_key =="" or 
    $item_desc =="" or $item_brand =="" or $item_cate =="" or $item_peice =="" or $item_image1 =="" or $item_image2 ==""
    or $item_image3 ==""){
        echo "<script>alert('You missed some fild to fillup !!')</script>";
    }else{

        move_uploaded_file($temp_image1,"./images/$item_image1");
        move_uploaded_file($temp_image2,"./images/$item_image2");
        move_uploaded_file($temp_image3,"./images/$item_image3");

        $product_sql = "insert into product_item (item_title,item_desc,item_keyword,cate_id,brand_id,item_image1,item_image2,item_image3,item_price,date,status)
        values('$item_title','$item_desc','$item_key','$item_cate','$item_brand','$item_image1','$item_image2','$item_image3','$item_peice',NOW(),'$item_status')";
        $product_result = $conn->query($product_sql);

        if($product_result){
            echo "<script>alert('Succesfully uploaded your product !!')</script>";
        }
    }

}



?>

<div class="pt-5 text-light ">
    <h3>Insert Products</h3>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="container">
            <div class="row">
                <div class="mb-3 w-50 m-auto">
                    <label for="form-label" class="form-label">Product Title</label>
                    <input type="text" class="form-control" name="item_title">
                </div>
                <div class="mb-3 w-50 m-auto">
                    <label for="form-label" class="form-label">Product Keywords</label>
                    <input type="text" class="form-control" name="item_key">
                </div>
            </div>
            <div class="col-md-12 mb-3">
                    <label for="form-label" class="form-label">Product description</label>
                    <input type="text" class="form-control" name="item_desc">
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3  m-auto">
                        <select name="item_brand" id="" class="form-select">
                            <?php 
                                $sql = "select * from categories";
                                $result = $conn->query($sql);
                                while($row = mysqli_fetch_assoc($result)){
                                    $cateid = $row['cate_id']; 
                                    $catetitle = $row['cate_title']; 
                                    echo "<option value='$cateid'>$catetitle</option>";
                                }
                            
                            ?>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                <div class="mb-3  m-auto">
                        <select name="item_cate" id="" class="form-select">
                        <?php 
                                $sql = "select * from brands";
                                $result = $conn->query($sql);
                                while($row = mysqli_fetch_assoc($result)){
                                    $brandid = $row['brand_id']; 
                                    $brandtitle = $row['brand_title']; 
                                    echo "<option value='$brandid'>$brandtitle</option>";
                                }
                            
                            ?>
                        </select>
                    </div>
                </div>

            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="mb-3  m-auto">
                        <label for="form-label" class="form-label">Product image 1</label>
                        <input type="file" class="form-control" name="item_img1">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="mb-3  m-auto">
                        <label for="form-label" class="form-label">Product image 2</label>
                        <input type="file" class="form-control" name="item_img2">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="mb-3  m-auto">
                        <label for="form-label" class="form-label">Product image 3</label>
                        <input type="file" class="form-control" name="item_img3">
                    </div>
                </div>

            </div>
            <div class="mb-3 w-50 m-auto">
                    <label for="form-label" class="form-label">Price</label>
                    <input type="number" class="form-control" name="item_peice">
                </div>
        </div>
        
  

        <input type="submit" value="Insert Product" class="btn btn-success" name="Product_submit">
    </form>

</div>