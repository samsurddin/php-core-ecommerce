<?php
    
    if(isset($_REQUEST['brand_submit'])){
        $brand_name = $_REQUEST['brand_name'];

        $bsql = "select * from brands where brand_title = '$brand_name'";
        $bresult = $conn->query($bsql);
        $countb = mysqli_num_rows($bresult);
         if($countb == 1){
            echo "<script>alert('This brand already inserted')</script>";
            echo "<script>window.open('index.php?insert_brand','_self')</script>";
         }else{
            $isqlB = "INSERT INTO brands (brand_title)value('$brand_name')";
            $resultb = $conn->query($isqlB);
    
            if($resultb){
                echo "<script>alert('Brand inserted successfully')</script>";
                echo "<script>window.open('index.php?view_brand','_self')</script>";
            }
         }


        
    }


?>

<div class="pt-5 text-light">
    <h3>Insert brand</h3>
    <form action="" method="post">
        <div class="mb-3 w-50 m-auto">
            <label for="form-label" class="form-label">Inser your brand</label>
            <input type="text" class="form-control" name="brand_name">
        </div>
        <input type="submit" value="Insert" class="btn btn-success" name="brand_submit">
    </form>

</div>