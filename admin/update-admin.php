<?php include('partials/menu.php')?>
<div class="main-content">
    <div class="wrapper">
        <h1>Add Admin</h1>
<br> <br>
    <?php
     $id=$_GET['id'];
     $sql="SELECT * FROM tbl_admin WHERE id=$id";
     $res=mysqli_query($conn, $sql);

    //  check if query is executed or not
    if($res==true)
    {
        // check if the data is available by counting roles
        $count = mysqli_num_rows($res);
        if($count==1){
            // echo "Admin Available"
            $row=mysqli_fetch_assoc($res);
            $full_name = $row['full_name'];
            $username = $row['username'];
        }
        else
        {
            header('location:'.SITEURL.'admin/manage-admin.php');
        }
    }
?>
    <br><br>
        <form action="" method="POST">
        <table>
            <tr>
                <td>Full Name</td>
                <td><input type="text" name="full_name" placeholder="Enter your Name" value="<?php echo $full_name; ?>"></td>
            </tr>
            <tr>
                <td>Username</td>
                <td><input type="text" name="username" placeholder="Enter your Username" value="<?php echo $username; ?>"></td>
            </tr>
          

            <tr>
                <td colspan="2">
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                    <input class="btn-primary" type="submit" name="submit" value="submit">
                </td>
               
            </tr>
        </table>

        </form>
    </div>

</div>


<?php
// check whether the submit button is clicked or not
if(isset($_POST['submit']))
{
    // echo "Button clicked";
    // get all the valu from form to be updated
    $id = mysqli_real_escape_string($conn, $_POST['id']);
    $full_name = mysqli_real_escape_string($conn, $_POST['full_name']);
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    
    // $_id = $_POST['id'];
    // $full_name= $_POST['full_name'];
    // $username = $_POST['username'];


    // create a sql query to update admin
    $sql = "UPDATE tbl_admin SET
    full_name= '$full_name',
    username= '$username'
    WHERE id='$id'
    ";

    // execute query
    $res = mysqli_query($conn, $sql);

    // check whether query is executed or not
    if($res==true)
    {
        $_SESSION['update'] = "<div class='success'>Admin updated successfully</div>";
        header('location:'.SITEURL.'admin/manage-admin.php');
    }
    else
    {
        $_SESSION['update'] = "<div class='error'>Admin fail to update</div>";
        header('location:'.SITEURL.'admin/manage-admin.php');
    }
}
?>
<?php include('partials/footer.php')?>