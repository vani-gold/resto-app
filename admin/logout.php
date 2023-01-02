<?php
// include contanst
include('../config/constants.php');
    // destroy the session and redirect to our login page
    session_destroy();

    // redirect to login page
    header('location:'.SITEURL.'admin/login.php');

?>