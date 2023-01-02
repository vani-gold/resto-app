<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Add Admin</h1>
<br> <br>
    <?php
        if(isset($_SESSION['add'])) //checking if the session is set or not 
        {
            echo $_SESSION['add'];
            unset($_SESSION['add']); //remove session
        }
    ?>
    <br><br>
        <form action="" method="POST">
        <table>
            <tr>
                <td>Full Name</td>
                <td><input type="text" name="full_name" placeholder="Enter your Name"></td>
            </tr>
            <tr>
                <td>Username</td>
                <td><input type="text" name="username" placeholder="Enter your Username"></td>
            </tr>
            <tr>
                <td>Password</td>
                <td><input type="password" name="password" placeholder="Enter your Password"></td>
            </tr>

            <tr>
                <td colspan="2">
                    <input class="btn-primary" type="submit" name="submit" value="submit">
                </td>
               
            </tr>
        </table>

        </form>
    </div>

</div>

<?php include('partials/footer.php'); ?>

<?php
// process the value from form and save it in Database
// check whether the submit button is click or not

if(isset($_POST['submit']))
{

    //1 get data from form
    $full_name = $_POST['full_name'];
    $username = $_POST['username'];
    $password = md5($_POST['password']);

    //2 sql query to save data in database
    $sql = "INSERT INTO tbl_admin SET
        full_name= '$full_name',
        username= '$username',
        password= '$password'
    ";


// 3 executing quering and saving data into database
    $res = mysqli_query($conn, $sql) or die(mysqli_error()); 

    // 4. check whether the (query is executed )

if($res==TRUE)
{
    // insert data
    // echo Data inserted
    // create a session variable to display message
    $_SESSION['add'] = "Admin added successfully";
    // redirect page to manage Admin
    header("location:" .SITEURL.'admin/manage-admin.php');

}else
{
    // fail to insert data
    // echo fail to insert data
    $_SESSION['add'] = "Failed to Add admin";
    // redirect page to manage Admin
    header("location:" .SITEURL.'admin/add-admin.php');
}
}
?>