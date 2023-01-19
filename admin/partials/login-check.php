<?php
// authorization or access control
// check if the user is logged in
if(!isset($_SESSION['user'])) //if it is not set
{
    // redirect if user is not login
    $_SESSION['no-login-message'] = "<div class='error'> Please login to access admin panel</div>";
    header('location:'.SITEURL.'admin/login.php');
}

?>