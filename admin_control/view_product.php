<h1 class="text-light">View Products</h1>
<table class="table table-dark table-striped-columns table-hover">
  <thead>
    <tr>
      <th>Product ID</th>
      <th>Product Title</th>
      <th>Product Image</th>
      <th>Product Price</th>
      <th>Total Sold</th>
      <th>Status</th>
      <th>Edit</th>
      <th>Delete</th>
    </tr>
  </thead>
  <tbody>
    <?php
        $product_table ="select * from product_item";
        $result = $conn->query($product_table);
        $num = 0;
        while($row = mysqli_fetch_assoc($result)){
            $item_id = $row['item_id'];
            $item_title = $row['item_title'];
            $item_image1 = $row['item_image1'];
            $item_price = $row['item_price'];
            $status = $row['status'];
            $num++;
            ?>
            
            <tr>
                <td><?php echo $num?></td>
                <td><?php echo $item_title?></td>
                <td><img src='./images/<?php echo $item_image1?>' alt='' class='prod_img'></td>
                <td><?php echo $item_price?></td>
                <td>
                    <?php 
                        $get_sold = "SELECT * FROM `order_panding` where product_id=$item_id";
                        $result_sold = $conn->query($get_sold);
                        $coun_sold = mysqli_num_rows($result_sold);
                        echo $coun_sold;
                    ?>
                </td>
                <td><?php echo $status?></td>
                <td><a href='index.php?edit_product=<?php echo $item_id?>' class='text-light'><button class='btn btn-primary'>Edit</button></a></td>
                <td><a href='index.php?delete_product=<?php echo $item_id?>' class='text-light'><button class='btn btn-danger'>Delete</button></a></td>
            </tr>
          
        <?php
        }
        ?>
    
  </tbody>
</table>