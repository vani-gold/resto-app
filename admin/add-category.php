<?php include('partials/menu.php');?>
<div class="main-content">
<div class="wrapper">
    <h2>Add Category</h2>
<br><br>
<?php
     if(isset($_SESSION['add']))
     {
        echo$_SESSION['add'];
        unset($_SESSION['add']);
     }
?>
<form action="" method="POST" enctype="multipart/form-data">
        <table>
            <tr>
                <td>Title</td>
                <td><input type="text" name="title" placeholder="Enter Category title"></td>
            </tr>
            <tr>
                <td>select Image</td>
                <td>
                    <input type="file" name="image">
                </td>
            </tr>
            <tr>
                <td>featured</td>
                <td><input value="yes" type="radio" name="featured" placeholder="Add features">yes</td>
                <td><input value="no" type="radio" name="featured" placeholder="Add features">no</td>
            </tr>
            <tr>
            <tr>
                <td>Active</td>
                <td><input value="yes" type="radio" name="active">yes</td>
                <td><input value="no" type="radio" name="active">no</td>
            </tr>
            </tr>

            <tr>
                <td colspan="2">
                    <input class="btn-primary" type="submit" name="submit" value="add category">
                </td>
               
            </tr>
        </table>

        </form>

        <?php
            if(isset($_POST['submit']))
            {
                // echo clicked
                // get values from the category form
                $title = $_POST['title'];
           
                // for radio if an option is selected

                if(isset($_POST['featured']))
                {
                    // get the valu from form
                    $featured = $_POST['featured'];
                }
                else
                {
                    // set the default value
                    $featured = 'No';
                }

                if(isset($_POST['active']))
                {
                    $active = $_POST['active'];
                }
                else
                {
                    $active = 'No';
                }
                // check if image is selected or not
                print_r($_FILES['image']);

                //2 sql querry to insert in to database
                $sql = "INSERT INTO tbl_category SET 
                    title='$title',
                    featured='$featured',
                    active='$active'
                ";

                //3 execute the query and save in the database
                $res = mysqli_query($conn, $sql);

                //4 check whether the query is executed or not
                if($res==true)
                {
                   
                    // query Executed and category added
                    $_SESSION['add'] = "<div class='success'>Category added successfully</div>";
                    header('location:'.SITEURL.'add/manage-category.php');
                }
                else
                {
                    // fail to add category
                    $_SESSION['add'] = "<div class='error'>fail to add category</div>";
                    header('location:'.SITEURL.'add/add-category.php');
                }

            }
            else
            {

            }
        ?>
</div>
</div>

<?php include('partials/footer.php');?>