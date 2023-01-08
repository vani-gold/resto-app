<?php include 'partials/menu.php';?>

<div class="main-content">
    <div class="wrapper">
        <h1>
            Update category
        </h1>
        <br><br>
<?php
        if (isset($_GET['id'])) {
            // get id and other details
            // echo "getting the data";
            $id = $_GET['id'];
            // create sql query to get all the data
            $sql = "SELECT * FROM tbl_category WHERE id=$id";

            // execute the query
            $res = mysqli_query($conn, $sql);
            // count if rows exist
            $count = mysqli_num_rows($res);
            if ($count == 1) {
                // get all data
                $row = mysqli_fetch_assoc($res);
                $title = $row['title'];
                $current_image = $row['image_name'];
                $featured = $row['featured'];
                $active = $row['active'];
            } else {
                // redirect to manage category
                $_SESSION['no-category-found'] = "<div class='error'>category not found</div>";
                header('location:' . SITEURL . 'admin/manage-category.php');
            }
            } else {

                header('location:' . SITEURL . 'admin/manage-category.php');
            }

?>
        <form action="" method="POST" enctype="multipart/form-data">
            <table class="tbl-30">
                <tr>
                    <td>Title:</td>
                    <td>
                        <input type="text" name="title" value="<?php echo $title; ?>">
                    </td>
                </tr>
                <tr>
                    <td>Current image:</td>
                    <td>
                        <!-- image will be here -->
                        <?php
                if ($current_image != "") {
                    // display the image
                    ?>
                <img src="<?php echo SITEURL; ?>images/category/<?php echo $current_image; ?>" width="100px">
                <?php
                } else {
                    // display the message
                    echo "<div class='error'>Image not added.</div>";
                }
                ?>
                    </td>
                </tr>
                <tr>
                    <td>New image:</td>
                    <td>
                        <input type="file" name="image" value="">
                    </td>
                </tr>
                <tr>
                    <td>Featured:</td>
                    <td>
                        <input <?php if ($featured == "Yes") {
                            echo "checked";
                        }?> type="radio" name="featured" value="Yes">Yes
                        <input <?php if ($featured == "No") {
                            echo "checked";
                        }?> type="radio" name="featured" value="No">No
                    </td>
                </tr>

                <tr>
                    <td>Active:</td>
                    <td>
                        <input <?php if ($active == "Yes") {
                            echo "checked";
                        }?> type="radio" name="active" value="Yes">Yes

                                                <input <?php if ($active == "No") {
                            echo "checked";
                        }?> type="radio" name="active" value="No">No
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="hidden" name="current_image" value="<?php echo $current_image; ?>">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <input type="submit" name="submit" value="update Category" class="btn-primary">
                    </td>
                </tr>
            </table>

        </form>
        <?php
    if (isset($_POST['submit'])) {
        // echo "clicked";
        // get all the values from the form
        $id = $_POST['id'];
        $title = $_POST['title'];
        $current_image = $_POST['current_image'];
        $featured = $_POST['featured'];
        $active = $_POST['active'];

        // 2 update the new image
        // check if image is selected or not
        if (isset($_FILES['image']['name'])) {
        // get image details
        if ($image_name != "") {
            // image available
            // upload the ne image and
            // give a new name to each downloaded image (auto rename)
            // 1 get image extension
            $ext = end(explode('.', $image_name));
            // rename image
            $image_name = "food_category_" . rand(000, 999) . '.' . $ext;

            $source_path = $_FILES['image']['tmp_name'];
            $destination_path = "../images/category/" . $image_name;

            //   upload image
            $upload = move_uploaded_file($source_path, $destination_path);

            //   check if the image is uploaded or not
            if ($upload == false) {
                $_SESSION['upload'] = "<div class='success'>Failed to upload image</div>";
                header('location:' . SITEURL . 'admin/manage-category.php');
                //   stop process
                die();
            }
            // B remove the current image if image is available
            if ($current_image!="") {
                $remove_path = "../images/category/" . $current_image;

                $remove = unlink($remove_path);

                //    check if the image is remove or not
                // if fail to remove display message ans stop process
                if ($remove==false) {
                    $_SESSION['failed-remove'] = "<div class='error'>Fail to remove current image</div>";
                    header('location:' . SITEURL . 'admin/manage-category.php');
                    die();
                }
                
            }
        } else {
            $image_name = $current_image;
        }
    } else {
        $image_name = $current_image;
    }

    // 3 update the database
    $sql2 = "UPDATE tbl_category SET
                title = '$title',
                image_name = '$image_name',
                featured = '$featured',
                active ='$active'
                WHERE id=$id
                ";

    // execute query
    $res2 = mysqli_query($conn, $sql2);

    // 4 redirect to manage category with message
    // check id query executed or not
    if ($res == true) {
        $_SESSION['update'] = "<div class='success'>Category updated successfully</div>";
        header('location:' . SITEURL . 'admin/manage-category.php');
    } else {
        $_SESSION['update'] = "<div class='error'>fail to update category</div>";
        header('location:' . SITEURL . 'admin/manage-category.php');
    }
}
?>

    </div>
</div>

<?php include 'partials/footer.php';?>