<?php include ('partials/menu.php')?>

          <!-- content Section start -->
          <div class="main-content">
          <h1 class="text-center">Manage Food</h1>
          <br><br>
          <p class="btn-primary"><a href="<?php echo SITEURL; ?>admin/add-food.php">Add Food</a></p>
          <?php 
          if(isset($_SESSION['add']))
            {
                echo $_SESSION['add'];
                unset ($_SESSION['add']);
            }
        ?>
       
    <div class="wrapper wrapper-main">
        <table>
            <tr>
                <th>S.N</th>
                <th>Title</th>
                <th>Price</th>
                <th>Image</th>
                <th>Feature/th>
                <th>Active</th>
            </tr>
            <?php
            // create  sql query to get all the food
            $sql = "SELECT * FROM tbl_food";
            // execute the query
            $res = mysqli_query($conn, $sql);

            $count = mysqli_num_rows($res);
            $sn = 1;
            if($count>0)
            {
                // we have food added
                while($row=mysqli_fetch_assoc($res))
                {
                    // get value of individual columns
                    $id = $row['id'];
                    $title = $row['title'];
                    $price = $row['price'];
                    $image_name = $row['image_name'];
                    $featured = $row['featured'];
                    $active = $row['active'];
                    ?>
                        <tr>
                            <td><?php echo $sn++; ?></td>
                            <td><?php echo "$title"; ?></td>
                            <td><?php echo "$price"; ?></td>
                            <td>
                            <?php 
                                if($image_name=="")
                                {
                                    // we do not have image displayed
                                echo "<div class='error'>Image not added.</div>";
                                }
                            else
                            {
                                // we have Image , Display Image
                            ?>
                             <img src="<?php echo SITEURL; ?>images/food/<?php echo $image_name; ?>" width="100px">

                            <?php
                     
                            }
                            ?>
                           
                            
                            </td>
                            <td><?php echo "$featured"; ?></td>
                            <td><?php echo "$active"; ?></td>
                            <!-- <td>action</td> -->
                            <td>
                                <a class="update" href="">Update food</a>
                                <a class="danger" href="<?php echo SITEURL; ?>admin/delete-food.php?id<?php echo $id; ?>&<?php echo $image_name; ?>">Delete food</a>
                            </td>
                        </tr>

                    <?php
                }
            }
            else
            {
                // food not added
                echo "<tr colspan='7' class='error'>Food not added yet</tr>";
            }
            ?>
        
  

        </table>
    </div>
        </div>
        <!-- content Section ends -->
<?php include ('partials/footer.php')?>