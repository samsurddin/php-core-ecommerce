<h3 class="text-light">All Categories</h3>
<table class="table table-dark">
  <thead>
    <tr>
      <th>Slno</th>
      <th>Category Title</th>
      <th>Edit</th>
      <th>Delete</th>
    </tr>
  </thead>
  <tbody>
    <?php
        $sql = "select * from categories";
        $result = $conn->query($sql);
        $num = 0;
        while($row = mysqli_fetch_assoc($result)){
            $cate_id = $row['cate_id'];
            $cate_title = $row['cate_title'];
            $num++;
       
    
    ?>
    <tr>
      <th scope="row"><?php echo $num ?></th>
      <td><?php echo $cate_title ?></td>
      <td><a href='index.php?edit_category=<?php echo $cate_id?>' class='text-light'><button class='btn btn-primary'>Edit</button></a></td>
      <td><a href='index.php?delete_category=<?php echo $cate_id?>' class='text-light'><button class='btn btn-danger'>Delete</button></a></td>
    </tr>
    <?php
     }
    ?>
  </tbody>
</table>