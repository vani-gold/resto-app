<?php

// include constants
include('../config/constants.php');


// 1 get ID
$id = $_GET['id'];

// 2 create sql query to delete admin
$sql = "DELETE FROM tbl_admin WHERE id=$id";

// Execute the Query
$res = mysqli_query($conn, $sql);

// check if the query is excecuted
if($res==true)
{
    // echo "Admin delete";
    $_SESSION['delete'] = "<div class='success'>Admin Deleted successfully.</div>";
    // redirect the session message
    header('location:'.SITEURL.'admin/manage-admin.php');
}else
{
    // echo "fail to delete admin";
        // echo "Admin delete";
        $_SESSION['delete'] = "<div class='error'>Admin not Deleted.</div>";
        // redirect the session message
        header('location:'.SITEURL.'admin/manage-admin.php');
}

// 3redirect to manage admin


?>