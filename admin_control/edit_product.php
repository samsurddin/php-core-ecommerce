<?php 
    if(isset($_REQUEST['edit_product'])){
        $edit_id = $_REQUEST['edit_product'];
        // echo $name;
 

        $sql = "select * from product_item where item_id=$edit_id";
        $result = $conn->query($sql);
        $row = mysqli_fetch_assoc($result);

        $title = $row['item_title'];
        $item_desc = $row['item_desc'];
        $item_keyword = $row['item_keyword'];
        $cate_id = $row['cate_id'];
        $brand_id = $row['brand_id'];
        $item_image1 = $row['item_image1'];
        $item_image2 = $row['item_image2'];
        $item_image3 = $row['item_image3'];
        $item_price = $row['item_price'];


        $sql2 = "select * from categories where cate_id =$cate_id";
        $result2 = $conn->query($sql2);
        $row2 = mysqli_fetch_assoc($result2);

        $cate_title = $row2['cate_title'];

        $sql5 = "select * from brands where brand_id =$brand_id";
        $result5 = $conn->query($sql5);
        $row5 = mysqli_fetch_assoc($result5);

        $brand_title = $row5['brand_title'];
    }


?>
<h3 class="text-light">Edit Products</h3>
<form action="" method="post" enctype="multipart/form-data">
        <div class="container">
            <div class="row">
                <div class="mb-3 w-50 m-auto">
                    <label for="form-label" class="form-label">Product Title</label>
                    <input type="text" class="form-control" name="item_title" value="<?php echo $title ?>">
                </div>
                <div class="mb-3 w-50 m-auto">
                    <label for="form-label" class="form-label">Product Keywords</label>
                    <input type="text" class="form-control" name="item_key" value="<?php echo $item_keyword ?>">
                </div>
            </div>
            <div class="col-md-12 mb-3">
                    <label for="form-label" class="form-label">Product description</label>
                    <input type="text" class="form-control" name="item_desc" value="<?php echo $item_desc ?>">
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3  m-auto">
                        <select name="item_brand" id="" class="form-select">
                        <option value="<?php echo $brand_title?>"><?php echo $brand_title ?></option>
                            
                            <?php 

                                $sql4 = "select * from brands";
                               $result4 = $conn->query($sql4);
                                while($row4 = mysqli_fetch_assoc($result4)){
                                   $brandid = $row4['brand_id']; 
                                   $brandtitle = $row4['brand_title']; 
                                   echo "<option value='$brandid'>$brandtitle</option>";
                               }
                            
                            ?>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                <div class="mb-3  m-auto">
                        <select name="item_cate" id="" class="form-select">
                        <option value="<?php echo $cate_title?>"><?php echo $cate_title ?></option>
                            <?php 
                               $sql3 = "select * from categories";
                               $result3 = $conn->query($sql3);
                                while($row3 = mysqli_fetch_assoc($result3)){
                                   $cateid = $row3['cate_id']; 
                                   $catetitle = $row3['cate_title']; 
                                   echo "<option value='$cateid'>$catetitle</option>";
                                }
                            
                            ?>
                        </select>
                    </div>
                </div>

            </div>
            <div class="row">
                <div class="col-md-6 ">
                    <div class="mb-3 d-flex">
                        <input type="file" class="form-control m-auto " name="item_img1" >
                        <img src="./images/<?php echo $item_image1 ?>" alt="" class="edit_prod">
                    </div>
                </div>
                <div class="col-md-6 ">
                    <div class="mb-3 d-flex">
                        <input type="file" class="form-control m-auto " name="item_img2">
                        <img src="./images/<?php echo $item_image2 ?>" alt="" class="edit_prod">
                    </div>
                </div>
                <div class="col-md-6 ">
                    <div class="mb-4 d-flex">
                        <input type="file" class="form-control m-auto" name="item_img3">
                        <img src="./images/<?php echo $item_image3 ?>" alt="" class="edit_prod">
                    </div>
                </div>
                <div class="col-md-6 ">
                    <div class="mb-3 d-flex">
                    <label for="form-label" class="form-label">Price</label>
                    <input type="number" class="form-control m-auto" name="item_peice" value="<?php echo $item_price ?>">
                    </div>
                </div>
            </div>
        </div>
        
  

        <input type="submit" value="Update Product" class="btn btn-success" name="update_Product">
    </form>

<?php
    if(isset($_REQUEST['update_Product'])){

        $Update_title = $_REQUEST['item_title'];
        $Update_desc= $_REQUEST['item_desc'];
        $Update_key= $_REQUEST['item_key'];
        $Update_cate= $_REQUEST['item_cate'];
        $Update_brand= $_REQUEST['item_brand'];
        $Update_price= $_REQUEST['item_peice'];

        $Update_item_image1= $_FILES['item_img1']['name'];
        $Update_item_image2= $_FILES['item_img2']['name'];
        $Update_item_image3= $_FILES['item_img3']['name'];

        $temp_item_image1= $_FILES['item_img1']['tmp_name'];
        $temp_item_image2= $_FILES['item_img2']['tmp_name'];
        $temp_item_image3= $_FILES['item_img3']['tmp_name'];

        

        if($Update_title =="" or $Update_desc =="" or $Update_key =="" or $Update_cate =="" or $Update_brand =="" or $Update_item_image1 =="" or $Update_item_image2 =="" or $Update_item_image3 =="" or $Update_price =="" ){
            echo " <script> alert('You missed some input filed !!')</script>";
        }else{
            move_uploaded_file($temp_item_image1,"../images/carousel/$Update_item_image1");
            move_uploaded_file($temp_item_image2,"../images/carousel/$Update_item_image2");
            move_uploaded_file($temp_item_image3,"../images/carousel/$Update_item_image3");

            $update_sql = "UPDATE product_item SET item_title = '$Update_title',item_desc='$Update_desc',item_keyword='$Update_key',cate_id='$Update_cate' ,brand_id='$Update_brand', 
            item_image1='$Update_item_image1',item_image2='$Update_item_image2',item_image3='$Update_item_image3',item_price='$Update_price',date=NOW() WHERE item_id=$edit_id";

            $update_result = $conn->query($update_sql);
            if($update_result){
                echo "<script> alert('You Succes to update !!')</script>";
                echo "<script>window.open('index.php?insert_product','_self')</script>";
            }

        }
    }
?>