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
      // check if image is selected or not
                // print_r($_FILES['image']);
            if (isset($_FILES['image']['name'])) {
                // upload image
                $image_name = $_FILES['image']['name'];
                // if image is selected or not
                if($image_name !="")
                {
// give a new name to each downloaded image (auto rename)
// 1 get image extension
                $ext = end(explode('.', $image_name));
                // rename image
                $image_name = "food_name_".rand(000, 999).'.'.$ext;
               
                    $source_path = $_FILES['image']['tmp_name'];
                    $destination_path = "../images/food/".$image_name;

                    //   upload image
                    $upload = move_uploaded_file($source_path, $destination_path);
                    //   check if the image is uploaded or not
                    if ($upload == false) {
                        $_SESSION['upload'] = "<div class='error'>Failed to upload image</div>";
                        header('location:'.SITEURL.'admin/add-category.php');
                        //   stop process
                        die();
                    }  
                }
            }     
                else {
                    $image_name = "";
                }