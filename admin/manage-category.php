<?php include('partials/menu.php');?>

<!-- content Section start -->
<div class="main-content">
    <h1 class="text-center">Manage Category</h1>
    <br>
    <?php
    if (isset($_SESSION['add'])) {
        echo $_SESSION['add'];
        unset($_SESSION['add']);
    }
    // remove
    if (isset($_SESSION['remove'])) {
        echo $_SESSION['remove'];
        unset($_SESSION['remove']);
    }
     // delete
     if (isset($_SESSION['delete'])) {
        echo $_SESSION['delete'];
        unset($_SESSION['delete']);
    }
    
     // no-category-found
     if (isset($_SESSION['no-category-found'])) {
        echo $_SESSION['no-category-found'];
        unset($_SESSION['no-category-found']);
    }
      // update
      if (isset($_SESSION['update'])) {
        echo $_SESSION['update'];
        unset($_SESSION['update']);
    }
       // upload
       if (isset($_SESSION['upload'])) {
        echo $_SESSION['upload'];
        unset($_SESSION['upload']);
    }
       // fail-remove
       if (isset($_SESSION['failed-remove'])) {
        echo $_SESSION['failed-remove'];
        unset($_SESSION['failed-remove']);
    }
    ?>
    <br>
    <p class="btn-primary">
        <a href="<?php echo SITEURL; ?>admin/add-category.php">Add Category</a>
    </p>
    <div class="wrapper wrapper-main">
        <table>
            <tr>
                <th>S.N</th>
                <th>Title</th>
                <th>Image</th>
                <th>Featured</th>
                <th>active</th>
                <th>Action</th>
            </tr>
            <?php
            // query
            $sql = "SELECT * FROM tbl_category";
             // execute query
            $res = mysqli_query($conn, $sql);

            $count = mysqli_num_rows($res);
            $sn=1;
            // count or check id data is in the database
            if($count>0)
            {
                // we have data in database
                // get the data and display
                while($row=mysqli_fetch_assoc($res))
                {
                    $id = $row['id'];
                    $title = $row['title'];
                    $image_name = $row['image_name'];
                    $featured = $row['featured'];
                    $active = $row['active'];
            ?>

                <tr>
                    <td><?php echo $sn++; ?></td>
                    <td><?php echo $title; ?></td>
                    <td>
                      
                        <?php
                        if($image_name!="")
                        {
                            // display the image
                            ?>
                            
                            <img src="<?php echo SITEURL; ?>images/category/<?php echo $image_name; ?>" width = "100px">

                            <?php
                        }
                        else
                        {
                            // display the message
                            echo "<div class='error'>Image not added</div>";
                        }
                        
                        ?>
                    </td>
                    <td><?php echo $featured; ?></td>
                    <td><?php echo $active; ?></td>
                    <td>
                        <a class="update" href="<?php echo SITEURL; ?>admin/update-category.php?id=<?php echo $id; ?>">Update Category</a>
                        <a class="danger" href="<?php echo SITEURL; ?>admin/delete-category.php?id=<?php echo $id; ?>&image_name=<?php echo $image_name; ?>">Delete Category</a>
                    </td>
                </tr>

             <?php
                    
                }
            }
            else
            {
                // we do not have data in database
                // we will display the message inside table
                ?>
                    <tr>
                        <td colspan="6"><div class="error">No category added</div></td>
                    </tr>

                <?php
            }
            
            ?>
        </table>
    </div>
</div>
<!-- content Section ends -->
<?php include('partials/footer.php');?>