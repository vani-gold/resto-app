<?php include ('partials/menu.php')?>

          <!-- content Section start -->
          <div class="main-content">
          <h1 class="text-center">Manage Order</h1>
          <br>
          <?php
            if(isset($_SESSION['update']))
            {
              echo $_SESSION['update'];
              unset($_SESSION['update']);
            }
          ?>
          <br>
          <p class="btn-primary"><a href="">Add Order</a></p>
    <div class="wrapper wrapper-main">
        <table>
            <tr>
                <th>S.N</th>
                <th>Food</th>
                <th>Price</th>
                <th>Qty</th>
                <th>Total</th>
                <th>Order Date</th>
                <th>Status</th>
                <th>Customer Name</th>
                <th>Contact</th>
                <th>Email</th>
                <th>Address</th>
                <th>Action </th>
            </tr>
            <?php
            $sql = "SELECT * FROM tbl_order ORDER BY id DESC";

            $res = mysqli_query($conn, $sql);

            $count = mysqli_num_rows($res);
            $sn =1;
            if($count>0)
            {
                // oder available
                while($row=mysqli_fetch_assoc($res))
                {
                    // get all the oder details
                    $id = $row['id'];
                    $food = $row['food'];
                    $id = $row['id'];
                    $price = $row['price'];
                    $qty = $row['qty'];
                    $total = $row['total'];
                    $order_date = $row['order_date'];
                    $status = $row['status'];
                    $customer_name = $row['customer_name'];
                    $customer_contact = $row['customer_contact'];
                    $customer_email = $row['customer_email'];
                    $customer_address = $row['customer_address'];
                    ?>
                    <tr>
                        <td><?php echo $sn++; ?></td>
                        <td><?php echo $food; ?></td>
                        <td><?php echo $price; ?></td>
                        <td><?php echo $qty; ?></td>
                        <td><?php echo $total; ?></td>
                        <td><?php echo $order_date; ?></td>

                        <td>
                            <?php 
                            // ordered, 
                                if($status=="Ordered")
                                {
                                    echo "<label>$status</label>";
                                }
                                elseif($status=="On Delivery")
                                {
                                    echo "<label style='color: orange;'>$status</label>";
                                }
                                elseif($status=="Delivered")
                                {
                                    echo "<label style='color: green;'>$status</label>";
                                }
                                elseif($status=="Cancelled")
                                {
                                    echo "<label style='color: red;'>$status</label>";
                                }
                            ?>
                        
                        </td>

                        <td><?php echo $customer_name; ?></td>
                        <td><?php echo $customer_contact; ?></td>
                        <td><?php echo $customer_email; ?></td>
                        <td><?php echo $customer_address; ?></td>
                    <td>
                    <a class="update" href="<?php echo SITEURL; ?>admin/update-order.php?id=<?php echo $id?>">Update Order</a>
                    <a class="danger" href="">delete Order</a>
                </td>
            </tr>
                    <?php 
                }
            }
            else
            {
                // ORDER NOT AVAILABLE
                echo "<tr><td colspan='12' class='error'>Orders not available</td></tr>";
            }
            ?>

        </table>
    </div>
        </div>
        <!-- content Section ends -->
<?php include ('partials/footer.php')?>