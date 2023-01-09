<?php
// include constants page
include('../config/constants.php');

// echo "nothing"; 
if(isset($_GET['id']) && isset($_GET['image_name']))

{
    // process to Delete
    // 1 get id and image name
    $id = $_GET['id'];
    $image_name = $_GET['image_name'];

    // 2 remove image if available
    if($image_name != "")
    {
        // path to remove the image from folder
        $path = "../images/food/" . $image_name;

        // function to remove image from folder
        $remove = unlink($path);
        // check whether image was removed or not
        if($remove==false){
            // fail to remove image
            $_SESSION['upload'] = "<div class='error'>Unauthorized Access from image.</div>";
            header('location:' . SITEURL . 'admin/manage-food.php');
            die();
        }

    }

    // 3 delete food from database
    $sql = "DELETE FROM tbl_food WHERE id=$id";

    // execute the query
    $res = mysqli_query($conn, $sql);

    // 4redirect to manage food with system message
    // check if the query is executed or not and then set the session message
    if($res==true)
    {
        $_SESSION['delete'] = "<div class='success'>food delete successfully</div>";
        header('location:' . SITEURL . 'admin/manage-food.php');
    }
    else
    {
        $_SESSION['delete'] = "<div class='error'>fail to delete food</div>";
        header('location:' . SITEURL . 'admin/manage-food.php');
    }

}
else
{
    // redirecting
    // echo"redirect";
    $_SESSION['unauthorize'] = "<div class='error'>Unauthorized Access.........</div>";
    header('location:' . SITEURL . 'admin/manage-food.php');
}

?>