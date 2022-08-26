<h3 class="text-light">All Pyaments</h3>
<table class="table table-dark">
  <thead>
    <?php
        $sql = "select * from user_payment";
        $result = $conn->query($sql);
        $count_oder = mysqli_num_rows($result);
        echo "
            <tr>
                <th>Slno</th>
                <th>Amount</th>
                <th>Invoice</th>
                <th>Payment Mode</th>
                <th>Order Date</th>               
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
                $payment_id = $row['payment_id'];
                $oder_id = $row['oder_id'];
                $nvoice_number= $row['invoice_number'];
                $amount_due = $row['amount'];
               
                $payment_mode = $row['payment_mode'];
                $payment_date = $row['date'];
                
                $num++;

                echo"<tr>
                        <td>$num</td>
                        <td>$amount_due</td>
                        <td>$nvoice_number</td>
                        <td>$payment_mode</td>
                        <td> $payment_date</td>                       
                        <td><a href='index.php?delete_payment=$payment_id' class='text-light'><button class='btn btn-danger'>Delete</button></a></td>
                    </tr>";
            }
        }

    ?>

  </tbody>
</table>
