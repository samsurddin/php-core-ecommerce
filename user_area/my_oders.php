<?php 
    $session_name = $_SESSION['user_name'];
    $get_user = "select * from users_table where user_name='$session_name'";
    $result = $conn->query($get_user);
    $row = mysqli_fetch_assoc($result);
    $session_user_id = $row['user_id'];
    
    // echo $session_user_id;

?>
<h3 class="text-success">All my oders</h3>
<table class="table table-hover mt-5">
  <thead>
    <tr>
      <th>SLno</th>
      <th>Amount Due</th>
      <th>Total Product</th>
      <th>Invoice number</th>
      <th>Date</th>
      <th>Complete/Incomplete</th>
      <th>Status</th>
    </tr>
  </thead>
  <tbody class="">
    <?php 
        $get_user_oder = "select * from user_oders where user_id='$session_user_id'";
        $result2 = $conn->query($get_user_oder);
        $number = 1;
         while($row_oder = mysqli_fetch_assoc($result2)){
            $oder_id = $row_oder['oder_id'];
            $oder_amount = $row_oder['amount_due'];
            $oder_invoice = $row_oder['invoice_number'];
            $oder_product = $row_oder['total_product'];
            $oder_date = $row_oder['oder_date'];
            $oder_status = $row_oder['oder_status'];

            if($oder_status == "pending"){
                $oder_status = "Incomplete";
            }else{
                $oder_status = "Complete";
            }
            
            echo "
            <tr>
                <td>$number</td>
                <td>$oder_amount</td>
                <td>$oder_product</td>
                <td>$oder_invoice</td>
                <td>$oder_date </td>
                <td>$oder_status</td>";
                ?>
                <?php
                 if($oder_status == "Complete"){
                    echo "<td>Paid</td>";
                 }else{
                    echo "<td><a href='confirm_payment.php?oder_id=$oder_id' class='text-dark'> Confirm</td></tr>";
                 }

            $number++;
         }
         
    ?>
    
   
  </tbody>
</table>