<?php
// start session
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

    //3 Excecute Query and save Data into Database
    // define('SITEURL', 'http://localhost/resto_app/');
    // define('LOCALHOST', 'localhost');
    // define('DB_USERNAME', 'root');
    // define('DB_PASSWORD', '');
    // define('DB_NAME', 'food_order');

    define('SITEURL', 'http://localhost/resto_app/');
    define('LOCALHOST', 'localhost');
    define('DB_USERNAME', 'put_your_username_here'); //localhost
    define('DB_PASSWORD', 'put_your_pswd_here');  //root
    define('DB_NAME', 'put_your_db_here');

    $conn = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD) or die(mysqli_error());
    $db_select = mysqli_select_db($conn, DB_NAME) or die(mysqli_error());

?>