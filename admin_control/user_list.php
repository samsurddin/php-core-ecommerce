<h3 class="text-light pt-4">All Users</h3>
<table class="table table-dark">
  <thead>
    <?php
        $sql = "select * from users_table";
        $result = $conn->query($sql);
        $count_oder = mysqli_num_rows($result);
        echo "
            <tr>
                <th>Slno</th>
                <th>Name</th>
                <th>Email</th>
                <th>Images</th>             
                <th>Address</th>               
                <th>Number</th>                              
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
        ";
        if($count_oder == 0){
            echo "<h2 class='bg-danger text-center mt-5'>No orders yet</h2>";
        }else{
            $num=0;
            while($row = mysqli_fetch_assoc($result)){
                $user_id = $row['user_id'];
                $user_name = $row['user_name'];
                $user_email= $row['user_email'];
                $user_iamge = $row['user_iamge'];
               
                $user_ip = $row['user_ip'];
                $user_addres = $row['user_addres'];
                $user_phone = $row['user_phone'];
                
                $num++;

                echo"<tr>
                        <td>$num</td>
                        <td>$user_name</td>
                        <td>$user_email</td>
                        <td><img src='../user_area/userImage/$user_iamge' alt=''  class='prod_img'></td>
                        <td>$user_addres</td>                       
                        <td>$user_phone</td>                       
                        <td><a href='index.php?delete_user=$user_id' class='text-light'><button class='btn btn-danger'>Delete</button></a></td>
                    </tr>";
            }
        }

    ?>

  </tbody>

</table>
