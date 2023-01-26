<?php include('partials-front/menu.php') ?>
    <?php 
    // check whether Id is passed or not
    if(isset($_GET['category_id']))
    {
        $category_id = $_GET['category_id'];
        // get the category Title based on category  Id
        $sql = "SELECT title FROM tbl_category WHERE id=$category_id";

        // execute query
        $res = mysqli_query($conn, $sql);

        $row = mysqli_fetch_assoc($res);
        $category_title = $row['title'];
    }else
    {
        header('location:' . SITEURL);
    }
    ?>
    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search text-center">
        <div class="container">
            
            <h2>Foods on <a href="#" class="text-white">"<?php echo $category_title?>"</a></h2>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->
    <!-- fOOD MEnu Section Starts Here -->
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Food Menu</h2>

            <?php 
                // sql query to get food based on selected category
            $sql2 = "SELECT * FROM tbl_food WHERE category_id=$category_id";

            // execute the query
            $res2 = mysqli_query($conn, $sql2);
            $count2 = mysqli_num_rows($res2);
            if($count2>0)
            {
            //    food available
            while($row2=mysqli_fetch_assoc($res2))
            {
                    $id = $row2['id'];
                    $title = $row2['title'];
                    $price = $row2['price'];
                    $description = $row2['description'];
                    $image_name = $row2['image_name'];
                    ?>
                    <div class="food-menu-box">
                        <div class="food-menu-img">
                        <?php 
                    if($image_name=="")
                    {
                        // image not available
                        echo "<div class='error'>Image not available</div>";
                    }
                    else{
                       ?>
                   
                    <img src="<?php echo SITEURL; ?>images/food/<?php echo $image_name?>" alt="image" class="img-responsive img-curve" width="15px" height="100px">
         
                    <?php 
                    }
                     ?>
                        </div>

                        <div class="food-menu-desc">
                            <h4><?php echo $title; ?></h4>
                            <p class="food-price"><?php echo $price; ?></p>
                            <p class="food-detail">
                            <?php echo $description; ?>
                            </p>
                            <br>
                            <!-- <?php echo SITEURL; ?>category-foods.php?category_id=<?php echo $id; ?> -->
                             
                            <a href="<?php echo SITEURL; ?>order.php?food_id=<?php echo $id; ?>" class="btn btn-primary">Order Now</a>
                          
                        </div>
                    </div>

                    <?php
            }
            }
            else
            {
                echo "<div class='error'>Food Not available</div>";
            }

            ?>
            <div class="clearfix"></div>
        </div>

    </section>
    <?php include('partials-front/footer.php') ?>