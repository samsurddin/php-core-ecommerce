<h3 class="text-light">All Orders</h3>
<table class="table table-dark">
  <thead>
    <?php
        $sql = "select * from user_oders";
        $result = $conn->query($sql);
        $count_oder = mysqli_num_rows($result);
        echo "
            <tr>
                <th>Slno</th>
                <th>Due Amount</th>
                <th>Invoice</th>
                <th>Total Product</th>
                <th>Order Date</th>
                <th>Status</th>
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
                $oder_id = $row['oder_id'];
                $user_id = $row['user_id'];
                $amount_due = $row['amount_due'];
                $nvoice_number= $row['invoice_number'];
                $total_product = $row['total_product'];
                $oder_date = $row['oder_date'];
                $oder_status = $row['oder_status'];
                $num++;

                echo"<tr>
                        <td>$num</td>
                        <td>$amount_due</td>
                        <td>$nvoice_number</td>
                        <td>$total_product</td>
                        <td> $oder_date</td>
                        <td> $oder_status</td>
                        
                        <td><a href='index.php?delete_oder=$oder_id' class='text-light'><button class='btn btn-danger'>Delete</button></a></td>
                    </tr>";
            }
        }

    ?>

  </tbody>
</table>