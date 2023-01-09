<?php include('partials/menu.php')?>
<div class="main-contain">
    <div class="wrapper">
        <h1>Add Food</h1>
        <br> <br>
        <?php
    if(isset($_SESSION['upload']))
        {
            echo $_SESSION['upload'];
            unset ($_SESSION['upload']);
        }


        ?>
        <form action="" method="POST" enctype="multipart/form-data">
            <table class="tbl-30">
                <tr>
                    <td>Title:</td>
                    <td><input type="text" name="title" placeholder="Title of the food"></td>
                </tr>
                <tr>
                    <td>Description</td>
                    <td>
                        <textarea name="description" id="" cols="30" rows="5" placeholder="Description of the food"></textarea>
                    </td>
                </tr>
                <tr>
                    <td>Price:</td>
                    <td><input type="number" name="price" placeholder="Pice of the food"></td>
                </tr>
                <tr>
                    <td>Select Image:</td>
                    <td><input type="file" name="image"></td>
                </tr>
                <tr>
                    <td>Category:</td>
                    <td><select name="category" id="">
                    <?php
                    // create code to display category from database
                    $sql = "SELECT * FROM tbl_category WHERE active='Yes'";

                    $res = mysqli_query($conn, $sql);

                    // count rows
                    $count = mysqli_num_rows($res);
                    if($count>0)
                    {
                        // we have category
                        while($row=mysqli_fetch_assoc($res))
                        {
                            // get the details of category
                            $id = $row['id'];
                            $title = $row['title'];

                            ?>

                             <option value="1"><?php echo $id; ?><?php echo $title; ?></option>

                            <?php
                        }
                    }
                    else
                    {
                        // we do not have categories
                        ?>
                         <option value="0">No Category found</option>

                        <?php
                    }

                    ?>

                        <!-- <option value="1">Food</option>
                        <option value="2">Food</option> -->
                   
                    </select>
                </td>
                </tr>
                <tr>
                    <td>Featured:</td>
                    <td><input type="radio" value="Yes" name="featured">Yes</td>
                    <td><input type="radio" value="No" name="featured">No</td>
                </tr>
                <tr>
                    <td>Active:</td>
                    <td><input type="radio" value="Yes" name="active">Yes</td>
                    <td><input type="radio" value="No" name="active">No</td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add food">
                    </td>
                </tr>
            </table>
        </form>
    <?php
    if(isset($_POST['submit']))
    {
          // echo "clicked food";
        // 1 get the data from form
        $title = $_POST['title'];
        $description = $_POST['description'];
        $price = $_POST['price'];
        $category = $_POST['category'];
       
    //   check if radio botton for featured is checked or not
        if (isset($_POST['featured'])) 
        {
            $featured = $_POST['featured']; 
        }
        else
        {
            $featured = "No";
        }

        //   check if radio botton for active is checked or not
        if (isset($_POST['active'])) 
        {
            $active = $_POST['active']; 
        }
        else
        {
            $active = "No";
        }
        
        // 2 upload the image if selected
        // check if the selected image is clicked or not and upload only if its selected
        if(isset($_FILES['image']['name']))
        {
            // get details of the selected image
            $image_name = $_FILES['image']['name'];
            // check if image button is click or not
            if($image_name !="")
            {
                // image is selected
                $ext = end(explode('.', $image_name));

                // create new name for image
                $image_name = "Food-Name-".rand(0000,9999).".".$ext; #new image name
                // upload image
                // get source path and destination path
                $src = $_FILES['image']['tmp_name'];
                // Destination path for the image to be uploaded
                $dst = "../images/food/".$image_name;

                // finally upload folder from source to destination path
                $upload = move_uploaded_file($src, $dst);
                // check if image uploaded
                if($upload==false)
                {
                    // if fail, redirect and stop the process
                    $_SESSION['upload'] = "<div class='error'> Failed to upload Image </div>";
                    header('location:'.SITEURL.'admin/add-food.php');
                    die();
                }
            }
        }
        else
        {
            // set default value ass blank
            $image_name = "";
        }
        // 3 insert into database
// create sql query
        $sql2 = "INSERT INTO tbl_food SET
            title = '$title',
            description= '$description',
            price = $price,
            image_name = '$image_name',
            category_id = '$category',
            featured = '$featured',
            active = '$active'";
// execute query

    $res2 = mysqli_query($conn, $sql2);
    // 4 redirect with message
    if($res2 == true)
    {
        // data inserted susccefully
        $_SESSION['add'] = "<div class='success'> Food added successfully</div>";
        header('location:'.SITEURL.'admin/manage-food.php');
    }else
    {
        // fail to insert data
        $_SESSION['add'] = "<div class='error'> fail to add food</div>";
        header('location:'.SITEURL.'admin/manage-food.php');
    }

    }

    ?>

    </div>
</div>

<?php include('partials/footer.php')?>