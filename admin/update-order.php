<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Update order</h1><br><br>
    <?php 
        if(isset($_GET['id']))
        {
            // get the order Details
             $id = $_GET['id'];

            //  sql query to get order details
        $sql = "SELECT * FROM tbl_order WHERE id=$id";
        // execute query
        $res = mysqli_query($conn, $sql);
        $count = mysqli_num_rows($res);

            if($count==1)
            {
                // Details available
                $row = mysqli_fetch_assoc($res);

                $food = $row['food'];
                $price = $row['price'];
                $qty = $row['qty'];
                $status = $row['status'];
                $customer_name = $row['customer_name'];
                $customer_contact = $row['customer_contact'];
                $customer_email = $row['customer_email'];
                $customer_address = $row['customer_address'];

          


            }else
            {
                 // Redirect to manage order page
                header('location:' . SITEURL . 'admin/manage-order.php');
            }
        }
    else
    {
        // Redirect to manage order page
        header('location:' . SITEURL . 'admin/manage-order.php');
    }
    
    
    ?>

        <form action="" method="POST">
            <table class="tbl-30">
                
                  <tr>
                    <td>Food</td>
                    <td><b><?php echo $food; ?></b></td>
                </tr>

                <tr>
                    <td>Price</td>
                    <td><b><?php echo $price; ?></b></td>
                </tr>

                <tr>
                    <td>Quantity</td>
                    <td><input type="number" value="<?php echo $qty; ?>" name="qty"></td>
                </tr>
                <tr>
                    <td>Status</td>
                    <td>
                        <select name="status" id="">
                            <option <?php if($status=="Ordered"){echo "selected"; } ?> value="Ordered">Ordered</option>
                            <option <?php if($status=="On Delivery"){echo "selected"; } ?> value="On Delivery">On Delivery</option>
                            <option <?php if($status=="Delivered"){echo "selected"; } ?> value="Delivered">Delivered</option>
                            <option <?php if($status=="Cancelled"){echo "selected"; } ?> value="Cancelled">Cancelled</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>customer Name</td>
                    <td><input type="text" name="customer_name" value="<?php echo $customer_name; ?>"></td>
                </tr>
                <tr>
                    <td>customer Contact</td>

                    <td><input type="text" name="customer_contact" value="<?php echo $customer_contact; ?>"></td>
                </tr>
                <tr>
                    <td>customer Email</td >
                    <td><input type="text" name="customer_email" value="<?php echo $customer_email; ?>"></td>
                </tr>
                <tr>
                    <td>customer Address</td>
                    <td> <textarea type="text" name="customer_address" value="" id="" cols="30" rows="10"><?php echo $customer_address; ?></textarea>
                        </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <input type="hidden" name="price" value="<?php echo $price; ?>">
                        <input type="submit" value="Update Order" name="submit" class="btn-primary">
                    </td>
                        </tr>
            </table>

        </form>

        <?php 
        if(isset($_POST['submit']))
            {
            // echo "clicked";
                // get all the value from form
                $id = $_POST['id'];
                $price = $_POST['price'];
                $qty = $_POST['qty'];

                $total = $price * $qty;

                $status = $_POST['status'];

                $customer_name = $_POST['customer_name'];
                $customer_contact = $_POST['customer_contact'];
                $customer_email = $_POST['customer_email'];
                $customer_address = $_POST['customer_address'];

                // update the value
            $sql2 = "UPDATE tbl_order SET
                    qty=$qty,
                    total=$total,
                    status='$status',
                    customer_name = '$customer_name',
                    customer_contact = '$customer_contact',
                    customer_email = '$customer_email',
                    customer_address = '$customer_address'
                    WHERE id=$id
                    ";
                     // execute the query
                    $res2 = mysqli_query($conn, $sql2);
                    // check if updated or not

                    if($res2==true)
                    {
                        // updated
                        $_SESSION['update'] = "<div class='success'>Order Updated Successfully</div>";
                        header('location:'.SITEURL.'admin/manage-order.php');
                    }else
                    {
                        // failed to update
                        $_SESSION['update'] = "<div class='error'>Fail to Updated order</div>";
                        header('location:'.SITEURL.'admin/manage-order.php');
                    }


            }        
        ?>
        
    </div>
</div>

<?php include('partials/footer.php'); ?>
