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

            if($res==true)
            {
                $count=mysqli_num_rows($res);

                if($count==1)
                {
                    if($new_password==$comfirm_password)
                    {
                        //update query
                      $sql2 = "UPDATE tbl_admin SET 
                        password='$new_password'
                        WHERE id=$id
                      ";
                        $res2 = mysqli_query($conn, $res2);
                        {
                            // check if query is executed or not
                            if($res2==true)
                            {
                                // Display sucess Message
                                
                                    $_SESSION['change-pwd'] = "<div class='success'>password changed successfully </div>";
                                    header('location:'.SITEURL.'admin/manage-admin.php');
                                
                            }
                            else
                            {
                                // Display error message
                                 $_SESSION['change-pwd'] = "<div class='error'>failed to change password</div>";
                                 header('location:'.SITEURL.'admin/manage-admin.php');
                            }
                        }
                    }
                   else
                    {
                        // redirect
                        $_SESSION['pwd-not-match'] = "<div class='error'>password did not match </div>";
                        header('location:'.SITEURL.'admin/manage-admin.php');
                    }
               
                }
                else
                {
                    $_SESSION['user-not-found'] = "<div class='error'>Userrrrr not found</div>";
                    header('location:'.SITEURL.'admin/manage-admin.php');
                }
            }
