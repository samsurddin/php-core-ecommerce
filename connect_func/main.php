<?php 

function getProducts(){
  global $conn;
  if(!isset($_REQUEST['category'])){
      if(!isset($_REQUEST['brand'])){

        $sql_product = "select * from product_item";
        $result_product = $conn->query($sql_product);

        while($row = mysqli_fetch_assoc($result_product)){
            $item_id = $row['item_id'];
            $item_title = $row['item_title'];
            $item_desc = $row['item_desc'];
            $cate_id = $row['cate_id'];
            $brand_id = $row['brand_id'];
            $item_image1 = $row['item_image1'];
            $item_image2 = $row['item_image2'];
            $item_image3 = $row['item_image3'];
            $item_price = $row['item_price'];
            $status = $row['status'];
            

            echo "<div class='col-md-4 mb-2'>
                <div class='card shadow-lg' style='width: 20rem;'>
                  <img src='./images/carousel/$item_image1' class='card-img-top' alt='...'>
                  <div class='card-body'>
                  <h5 class='card-title'>$item_title</h5>
                  <p class='card-text'>$item_desc</p>
                  <a href='index.php?add_to_cart=$item_id' class='btn btn-warning mr-2'>Add To Cart</a>
                  <a href='product_dtil.php?product=$item_id' class='btn btn-primary'>View More</a>
                </div>
                </div>
              </div>";
          }

      }
  }

}


function getProductsDitails(){
  global $conn;
  if(isset($_REQUEST['product'])){
    if(!isset($_REQUEST['category'])){
      if(!isset($_REQUEST['brand'])){

        $product_id = $_REQUEST['product'];
        $sql_product = "select * from product_item where item_id = $product_id";
        $result_product = $conn->query($sql_product);

        while($row = mysqli_fetch_assoc($result_product)){
            $item_id = $row['item_id'];
            $item_title = $row['item_title'];
            $item_desc = $row['item_desc'];
            $cate_id = $row['cate_id'];
            $brand_id = $row['brand_id'];
            $item_image1 = $row['item_image1'];
            $item_image2 = $row['item_image2'];
            $item_image3 = $row['item_image3'];
            $item_price = $row['item_price'];
            $status = $row['status'];
            

            echo "<div class='col-md-4 mb-2 mt-4'>
            <div class='card'>
                <img src='./images/carousel/$item_image1' class='card-img-top' alt='...'>
                <div class='card-body'>
                    <h5 class='card-title'>$item_title</h5>
                     
                    <a href='index.php' class='btn btn-secondary'>Go home</a>
                </div>
            </div>
            </div>
            
            <div class='col-md-8'>
                <div class='row'>
                    <div class='col-md-12'>
                        <h4 class='text-center mb-5'>Products Detailes</h4>
                    </div>
                    <div class='col-md-6'>
                        <h6 class='mt-4 mb-3'>Price : $item_price/=</h6>
                        <b>$item_desc</b>
                        <div class='mt-4'>
                        <a href='index.php?add_to_cart=$item_id' class='btn btn-warning mr-2'>Add To Cart</a>
                        </div>
                       
                    </div>
                    <div class='col-md-6'>
                      <div class='row'>
                          <div class='col-md-2'>
                            <img src='./images/carousel/$item_image2' class='rounded float-left' alt='...'>
                          </div>
                          <div class='col-md-2'>
                          <img src='./images/carousel/$item_image3' class='rounded float-right' alt='...'>
                          </div>
                      </div>
                    </div>
                </div>
            </div>
                  
                  ";
          }

      }
  }
  }
  

}

// Category displaying

function getUniqeCategories(){
  global $conn;

  if(isset($_REQUEST['category'])){
    $cateUni_id = $_GET['category'];

        $sql_product = "select * from product_item where cate_id=$cateUni_id";
        $result_product = $conn->query($sql_product);

        $count_cate = mysqli_num_rows($result_product);

        if($count_cate == 0){
          echo "<h2 class='text-center' style='padding-top:29%;'>This category is not available on this movement !!</h2>";
        }

          while($row = mysqli_fetch_assoc($result_product)){
            $item_id = $row['item_id'];
            $item_title = $row['item_title'];
            $item_desc = $row['item_desc'];
            $cate_id = $row['cate_id'];
            $brand_id = $row['brand_id'];
            $item_image1 = $row['item_image1'];
            $item_image2 = $row['item_image2'];
            $item_image3 = $row['item_image3'];
            $item_price = $row['item_price'];
            $status = $row['status'];
            

            echo "<div class='col-md-4 mb-2'>
                <div class='card shadow-lg' style='width: 20rem;'>
                  <img src='./images/carousel/$item_image1' class='card-img-top' alt='...'>
                  <div class='card-body'>
                  <h5 class='card-title'>$item_title</h5>
                  <p class='card-text'>$item_desc</p>
                  <a href='index.php?add_to_cart=$item_id' class='btn btn-warning mr-2'>Add To Cart</a>
                  <a href='#' class='btn btn-primary'>View More</a>
                </div>
                </div>
              </div>";
          }
        
      
    }
}

// Brand displaying
function getUniqeBrands(){
  global $conn;
 
  if(isset($_REQUEST['brand'])){
    $bransUni_id = $_REQUEST['brand'];

        $sql_product = "select * from product_item where brand_id=$bransUni_id";
        $result_product = $conn->query($sql_product);

        $count_brand = mysqli_num_rows($result_product);

        if($count_brand == 0){
          echo "<h2 class='text-center' style='padding-top:29%;'>This brand is not available on this movement !!</h2>";
        }

        while($row = mysqli_fetch_assoc($result_product)){
            $item_id = $row['item_id'];
            $item_title = $row['item_title'];
            $item_desc = $row['item_desc'];
            $cate_id = $row['cate_id'];
            $brand_id = $row['brand_id'];
            $item_image1 = $row['item_image1'];
            $item_image2 = $row['item_image2'];
            $item_image3 = $row['item_image3'];
            $item_price = $row['item_price'];
            $status = $row['status'];
            

            echo "<div class='col-md-4 mb-2'>
                <div class='card shadow-lg' style='width: 20rem;'>
                  <img src='./images/carousel/$item_image1' class='card-img-top' alt='...'>
                  <div class='card-body'>
                  <h5 class='card-title'>$item_title</h5>
                  <p class='card-text'>$item_desc</p>
                  <a href='index.php?add_to_cart=$item_id' class='btn btn-warning mr-2'>Add To Cart</a>
                  <a href='#' class='btn btn-primary'>View More</a>
                </div>
                </div>
              </div>";
          }

      
    }
}

    function bRand(){
      global $conn;
      $sql = "select * from brands";
            $result = $conn->query($sql);
            while($row = mysqli_fetch_assoc($result)){
              $brand_id = $row['brand_id'];
              $brand_title = $row['brand_title'];
              echo "<small> <b><a href='index.php?brand=$brand_id' class='nav-link text-dark'>$brand_title </a></b></small>";
        }
      }
    
    function Categories(){
      global $conn;
      $cat_sql = "select * from categories";
      $cate_result = $conn->query($cat_sql);
      while($row = mysqli_fetch_assoc($cate_result)){
        $cate_id = $row['cate_id'];
        $cate_title = $row['cate_title'];
        echo "<small> <b><a href='index.php?category=$cate_id' class='nav-link text-dark'>$cate_title </a></b></small>";
      }
    }

    function search_fun(){
        global $conn;
       
          if(isset($_REQUEST['search_date'])){
            $getSearchValue = $_REQUEST['search_date'];
            $sql_surch = "select * from product_item where item_keyword like '%$getSearchValue%'";
            $result_product = $conn->query($sql_surch);

            while($row = mysqli_fetch_assoc($result_product)){
                $item_id = $row['item_id'];
                $item_title = $row['item_title'];
                $item_desc = $row['item_desc'];
                $cate_id = $row['cate_id'];
                $brand_id = $row['brand_id'];
                $item_image1 = $row['item_image1'];
                $item_image2 = $row['item_image2'];
                $item_image3 = $row['item_image3'];
                $item_price = $row['item_price'];
                $status = $row['status'];
                

                echo "<div class='col-md-4 mb-2'>
                    <div class='card shadow-lg' style='width: 20rem;'>
                      <img src='./images/carousel/$item_image1' class='card-img-top' alt='...'>
                      <div class='card-body'>
                      <h5 class='card-title'>$item_title</h5>
                      <p class='card-text'>$item_desc</p>
                      <a href='index.php?add_to_cart=$item_id' class='btn btn-warning mr-2'>Add To Cart</a>
                      <a href='#' class='btn btn-primary'>View More</a>
                    </div>
                    </div>
                  </div>";
              }


  }
    
}

function getIPAddress() {  
  //whether ip is from the share internet  
   if(!empty($_SERVER['HTTP_CLIENT_IP'])) {  
              $ip = $_SERVER['HTTP_CLIENT_IP'];  
              }  
          //whether ip is from the proxy  
          elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  
                      $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];  
          }  
      //whether ip is from the remote address  
          else{  
                  $ip = $_SERVER['REMOTE_ADDR'];  
          }  
          return $ip;  
      }  
    

function carts(){
  if(isset($_REQUEST['add_to_cart'])){

    global $conn;
    $user_ip = getIPAddress();
    $getItemId = $_REQUEST['add_to_cart'];

      $sipsql = "select * from add_to_cart where item_id=$getItemId and ip_address='$user_ip'";
      $sresult = $conn->query($sipsql);
      $num_count = mysqli_num_rows($sresult);

      if($num_count > 0){

        echo"<script>alert('you have already added card !!')</script>";

      }else{
        
        $ipsql = "insert into add_to_cart (item_id,ip_address,quantity)values($getItemId,'$user_ip',0)";
        $ipreault = $conn->query($ipsql);
    
        if($ipreault){
          echo"<script>alert('you have added card succesfully !!')</script>";
        }
      }

    // echo $num_count;

  }

}

function cartItem(){
  if(isset($_REQUEST['add_to_cart'])){

      global $conn;
      $user_ip = getIPAddress();

      $carTipsql = "select * from add_to_cart where ip_address='$user_ip'";
      $carTresult = $conn->query($carTipsql);
      $num_count_cart = mysqli_num_rows($carTresult);
    }
      else{
        global $conn;
        $user_ip = getIPAddress();

        $carTipsql = "select * from add_to_cart where ip_address='$user_ip'";
        $carTresult = $conn->query($carTipsql);
        $num_count_cart = mysqli_num_rows($carTresult);
      }
      echo $num_count_cart;
  
}

function TotatAmunt(){
  global $conn;
  $user_ip = getIPAddress();
  $parItem = 0;

  $amount_sql = "select * from add_to_cart where ip_address='$user_ip'";
  $amresult = $conn->query($amount_sql);

  while($row = mysqli_fetch_array($amresult)){
    $item_id = $row['item_id'];

    $selete_sql = "select * from product_item where item_id=$item_id";
    $reesult = $conn->query($selete_sql);
    
    while($itemPrice = mysqli_fetch_array($reesult)){

        $price = array($itemPrice['item_price']);
        $values = array_sum($price);
        $parItem+=$values;

    }

  }
  echo $parItem;
}

    

function OderDetails(){
  global $conn;
  $username = $_SESSION['user_name'];
  $getDetails = "select * from users_table where user_name='$username'";
  $getSql = $conn->query($getDetails);

  while($row_d = mysqli_fetch_array($getSql)){
      $user_id = $row_d['user_id'];
      if(!isset($_REQUEST['edit_account'])){
        if(!isset($_REQUEST['myoder'])){
          if(!isset($_REQUEST['delete_account'])){
            $get_oder = "select * from user_oders where user_id=$user_id and oder_status='pending'";

            $getOderDetails = $conn->query($get_oder);
            $cunt_oder = mysqli_num_rows($getOderDetails);

            if($cunt_oder>0){
              echo "<h3 class='text-center mt-5 text-success'>You have <span class='text-danger'>$cunt_oder </span>pending oders !!</h3>
              <h6 class='text-center mt-4'><a href='profile.php?oder_detailes' class='text-dark' >Oder Detailes</a></h6>";
            }else{
              echo "<h3 class='text-center mt-5 text-success'>You have <span class='text-danger'>Zero </span>pending oders !!</h3>
              <h6 class='text-center mt-4'><a href='../index.php' class='text-dark' >Explore Product</a></h6>";
            }
          }
        }
      }
  }
}
?>