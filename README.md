# Restaurant Food Order Theme
This is a Restaurant Theme Website Template, designed using html and css. It was developed while teaching "Responsive Web Design Course".

**Access the Course Here** - 
[Responsive Web Design Course 2020](https://www.youtube.com/watch?v=VaV_Ro8jpPY)


## Support Developer
1. Subscribe & Share my YouTube Channel - https://bit.ly/vijay-thapa-online-courses
2. Add a Star 🌟  to this 👆 Repository

## Donate

**[PayPal](https://bit.ly/support-vijay-thapa)**

**[Buy me a Coffee  ☕️](https://www.buymeacoffee.com/vijaythapa)**

**Donate by wire transfer:** ✉️ E-Mail at *donate@vijaythapa.com* for wire transfer details. 

food management
https://www.youtube.com/watch?v=ZBgTzx46B8s&list=PLBLPjjQlnVXXBheMQrkv3UROskC0K1ctW

blood donnor
https://www.youtube.com/watch?v=Q_2iqNqXCUY

nice
https://www.youtube.com/watch?v=nW_E3-pYZqE
## Technologies Used
1. HTML5
2. CSS3


## Pages on this Complete Free Template
1. **index.html** - Home Page (Search Food, Some Categories, Featured Foods, Social Media link)
2. **categories.html** - List all Categories on Single Page
3. **foods.html** - List all foods on a single page
4. **order.html** - Page to Order Selected Food
5. **category_foods.html** - Page to list all the Foods based on Category Selected
6. **food_search.html** - Page to list all the Foods based on Search keyword


## For Sponsor or Project Enquiry
1. Email - hi@vijaythapa.com


## Follow Me on
1. LinkedIn - [vijaythapa](https://www.linkedin.com/in/vijaythapa/ "Vijay Thapa on LinkedIn")
2. Instagram - [@vijaythapa.code](https://www.instagram/vijaythapa.code/ "Vijay Thapa on Instagram")
3. Facebook - [@thevijaythapa](https://www.facebook.com/thevijaythapa/ "Vijay Thapa on Facebook")
5. Twitter - [@thevijaythapa](https://www.twitter.com/thevijaythapa "Vijay Thapa on Twitter")

//////////////////////////////////////////////////
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
    //  upload
    if(isset($_SESSION['upload']))
    {
       echo$_SESSION['upload'];
       unset($_SESSION['upload']);
    }
?>
<form action="#" method="POST" enctype="multipart/form-data">
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
                    // get the value  from form
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
                // print_r($_FILES['image']);
            if (isset($_FILES['image']['name'])) {
                // upload image
                $image_name = $_FILES['image_name']['name'];
                $source_path = $_FILES['image']['tmp_name'];
                $destination_path = "../images/category/".$image_name;

                //   upload image
                $upload = move_uploaded_file($source_path, $destination_path);


                //   check if the image is uploaded or not
                if ($upload == false) {
                    $_SESSION['upload'] = "<div class='success>Failed to upload image</div>";
                    header('location:'.SITEURL.'admin/add-category.php');
                    //   stop process
                    die();
                }      
                } 
                else {
                    $image_name = "";
                }
          
                //2 sql query to insert in to database
                // $sql = "INSERT INTO tbl_category SET 
                //     title='$title',
                //     image_name='$image_name',
                //     featured='$featured',
                //     active='$active'
                // ";
$sql = "INSERT INTO tbl_category(title, image_name, featured, active) VALUES ('$title', '$image_name', '$featured', '$active')";
                //3 execute the query and save in the database
                $res = mysqli_query($conn, $sql);

                //4 check whether the query is executed or not
                if($res==true)
                {
                   
                    // query Executed and category added
                    $_SESSION['add'] = "<div class='success'>Category added successfully</div>";
                    header('location:'.SITEURL.'admin/manage-category.php');
                }
                else
                {
                    // fail to add category
                    $_SESSION['add'] = "<div class='error'>fail to add category</div>";
                    header('location:'.SITEURL.'admin/add-category.php');
                }
               
            }
          
        ?>
    </div>
</div>

<?php include('partials/footer.php');?>

///////////////////////////////////////////////
<?php include('partials/menu.php');?>
<div class="main-content">
<div class="wrapper">
    <h2>Add Category</h2>
<br><br>

<form action="#" enctype="multipart/form-data" method="post">
Select image :
<input type="file" name="file"><br/>
<input type="submit" value="Upload" name="Submit1"> <br/>

<?php
if(isset($_POST['Submit1']))
{ 
    $file = $_FILES['file']['name'];
$filepath = "../images/category/" . $_FILES["file"]["name"];

if(move_uploaded_file($_FILES["file"]["tmp_name"], $filepath)) 
{
echo "<img src=".$filepath." height=200 width=300 />";
} 
else 
{
echo "Error !!";
}
$sql = "INSERT INTO tbl_category(image_name) VALUES ('$file')";
//                 //3 execute the query and save in the database
//  $res = mysqli_query($conn, $sql);
} 
?>

<?php include('partials/footer.php');?>