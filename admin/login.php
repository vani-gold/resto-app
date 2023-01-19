<?php
 include('../config/constants.php');


?>

<html>
    <head>
        <title>Login - Food System</title>
        <link rel="stylesheet" href="../css/admin.css">
    </head>
    <body>
        <div class="login">
            <h1 class="text-center">login</h1>
            <br>
            <?php
            // login message
                   if(isset($_SESSION['login']))
                   {
                       echo $_SESSION['login'];
                       unset($_SESSION['login']); //remove session
                   }
                //    no login message
                   if(isset($_SESSION['no-login-message']))
                   {
                       echo $_SESSION['no-login-message'];
                       unset($_SESSION['no-login-message']); //remove session
                   }
            ?>
            <br>
        <!-- login form start -->
            <form action="" method="POST">
                Username:
                <input type="text" name="username" placeholder="Enter User Name">
                <br>
                Password:
                <input type="password" name="password" placeholder="Enter password">
                <br>

                <input type="submit" name="submit" value="submit">
            </form>
         <!-- login form start -->

            <p class="text-center">Created By - <a href="https://portfolio-tan-mu-14.vercel.app/">Esibe vanessa</a></p>
        </div>

    </body>
</html>
<?php
// check if the submit button is clicked or not
if(isset($_POST['submit']))
{
    // $username = $_POST['username'];
   
    $username = mysqli_real_escape_string($conn, $_POST['username']);
     $raw_password = md5($_POST['password']);
    $password = mysqli_real_escape_string($conn, $raw_password);

    // 2 check if user and pwd exist
    $sql = "SELECT * FROM tbl_admin WHERE username='$username' AND password='$password'";

    // execute the query
    $res = mysqli_query($conn, $sql);

    // count rows to check if user exist
    $count = mysqli_num_rows($res);

    if($count==1)
    {
        // user  available
        $_SESSION['login'] = "<div class='success'>Login Successfull</div>";
        $_SESSION['user'] = $username; //check if user is login
        
        header('location:'.SITEURL.'admin/');
    }
    else
    {
        // user not available
        $_SESSION['login'] = "<div class='error'>User name or Password did not match</div>";
        header('location:'.SITEURL.'admin/login.php');
    }





}



?>