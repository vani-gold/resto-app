<?php 
// include constant file
include('../config/constants.php');

// check if we are passing the id or image?
if(isset($_GET['id']) AND isset($_GET['image_name']))
{
    // delete value
    // echo "get value";
    $id = $_GET['id'];
    $image_name = $_GET['image_name'];

    // remove the physical image
    if($image_name !="")
    {
        // image path is available so remove it
        $path = "../images/category/" . $image_name;
        // remove the image
        $remove = unlink($path);

        // if fail to remove image then add an error message to stop the process
        if($remove==false)
        {
            // set session message ans redirect and stop the process
            $_SESSION['remove'] = "<div class='error'>Fail to remove Category page</div>";
            header('location:' . SITEURL . 'admin/manage-category.php');
            die();
        }
    }
    // delete from db
    $sql = "DELETE FROM tbl_category WHERE id=$id";

    $res = mysqli_query($conn, $sql);

    // check whether data is delete from db or not
    if($res== true)
    {
        // set success message and redirect
        $_SESSION['delete'] = "<div class='success'>Category Deleted successfully</div>";
        header('location:' . SITEURL . 'admin/manage-category.php');
    }
    else
    {
        // set fail message and redirect
        $_SESSION['delete'] = "<div class='error'>Category fail to Delete</div>";
        header('location:' . SITEURL . 'admin/manage-category.php');

    }
}
else
{
    // redirect to manage category page
    header('location:'.SITEURL.'admin/manage-category.php');
}



?>