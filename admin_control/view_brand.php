<h3 class="text-light">All Brands</h3>
<table class="table table-dark">
  <thead>
    <tr>
      <th>Slno</th>
      <th>Brand Title</th>
      <th>Edit</th>
      <th>Delete</th>
    </tr>
  </thead>
  <tbody>
    <?php
        $sql = "select * from brands";
        $result = $conn->query($sql);
        $num = 0;
        while($row = mysqli_fetch_assoc($result)){
            $brand_id = $row['brand_id'];
            $brand_title = $row['brand_title'];
            $num++;
       
    
    ?>
    <tr>
      <th scope="row"><?php echo $num ?></th>
      <td><?php echo $brand_title ?></td>
      <td><a href='index.php?edit_brand=<?php echo $brand_id?>' class='text-light'><button class='btn btn-primary'>Edit</button></a></td>
      <td><a href='index.php?delete_brand=<?php echo $brand_id?>' class='text-light'><button class='btn btn-danger'>Delete</button></a></td>
    </tr>
    <?php
     }
    ?>
  </tbody>
</table>