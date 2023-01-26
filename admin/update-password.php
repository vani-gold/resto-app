<?php include('partials/menu.php')?>

<div class="main-content">
    <div class="wrapper">
        <h2>change password</h2>
        <br><br>
        <?php
        if(isset($_GET['id']))
        {
            $id=$_GET['id'];
        }
        
        ?>
        <form action="" method="POST">
        <table>
            <tr>
                <td>Current password</td>
                <td><input type="password" name="current_password" placeholder="current password" value=""></td>
            </tr>
            <tr>
                <td>New Password</td>
                <td><input type="password" name="new_password" placeholder="newpassword" value=""></td>
            </tr>
            <tr>
                <td>Comfirm password</td>
                <td><input type="password" name="comfirm_password" placeholder="comfirm password" value=""></td>
            </tr>

            <tr>
                <td colspan="2">
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                    <input class="btn-primary" type="submit" name="submit" value="Change Password">
                </td>
               
            </tr>
        </table>

        </form>
    </div>
</div>
<?php
    // checkif button is clicked
        if(isset($_POST['submit']))
        {
            
            // 1 get the data form
            $id=$_POST['id'];
            $raw_password1 = md5($_POST['current_password']);
            // $current_password = mysqli_real_escape_string($conn, $raw_password1);

            // $raw_password2 = md5($_POST['new_password']);
            // $new_password = mysqli_real_escape_string($conn, $raw_password2);

            // $raw_password3 = md5($_POST['comfirm_password']);
            // $comfirm_password = mysqli_real_escape_string($conn, $raw_password3);

            $current_password= md5($_POST['current_password']);
            $new_password = md5($_POST['new_password']);
            $comfirm_password = md5($_POST['comfirm_password']);

            // 2 check whether the user with current id exist
            $sql = "SELECT * FROM tbl_admin WHERE id=$id AND password='$current_password'";

            // 3 execute query 
            $res = mysqli_query($conn, $sql);

            if($res==true)
            {
                // check if data is available
                $count=mysqli_num_rows($res);

                if($count==1)
                {
                    // echo "user found";
                   if($new_password==$comfirm_password)
                   {
                    // update the password
                    // echo "password match";
                        $sql2 = "UPDATE tbl_admin SET 
                            password='$new_password'
                            WHERE id=$id
                            ";
                            // execute the query
                        $res2 = mysqli_query($conn, $sql2);

                        if($res2==true)
                        {
                            // display message
                            $_SESSION['change-pwd'] = "<div class='success'>change password successfully.</div>";
                            header('location:'.SITEURL.'admin/manage-admin.php');
                        }
                        else{
                            // display error
                            $_SESSION['change-pwd'] = "<div class='error'>change password failed.</div>";
                            header('location:'.SITEURL.'admin/manage-admin.php');
                        }

                   }
                   else{
                    // redirect to admin page
                    $_SESSION['pwd-not-match'] = "<div class='error'>password did not match.</div>";
                    header('location:'.SITEURL.'admin/manage-admin.php');
                   }
                }
                else
                {
                 
                    $_SESSION['user-not-found'] = "<div class='error'>user not found.</div>";
                    header('location:'.SITEURL.'admin/manage-admin.php');
                }
            }
            // 4 change the password

        }

?>
<?php include('partials/footer.php')?>