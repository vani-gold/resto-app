<?php include('partials-front/menu.php') ?>

    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search text-center">
        <div class="container">
            
            <form action="<?php echo SITEURL; ?>food-search.php" method="POST">
                <input type="search" name="search" placeholder="Search for Food.." required>
                <input type="submit" name="submit" value="Search" class="btn btn-primary">
            </form>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->



    <!-- fOOD MEnu Section Starts Here -->
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Food Menu</h2>
        <?php
        $sql = "SELECT * FROM tbl_food WHERE  active='Yes'";
        // execute query 
        $res = mysqli_query($conn, $sql);

        $count = mysqli_num_rows($res);
        // check if food is available
        if($count>0)
        {
            while($row=mysqli_fetch_assoc($res))
            {
                $id = $row['id'];
                $title = $row['title'];
                $description = $row['description'];
                $price = $row['price'];
                $image_name = $row['image_name'];
                ?>

        <div class="food-menu-box">
                <div class="food-menu-img">
                    <?php 
                    if($image_name=="")
                    {
                        // image not available
                        echo "<div class='error'>image not available</div>";
                    }else
                    {
                        // image  available
                        ?>

                            <img src="<?php echo SITEURL; ?>images/food/<?php echo $image_name; ?>" alt="Chicke" class="img-responsive img-curve" width="150px" height="100px">
                        <?php
                    }
                    ?>
                   
                </div>

                <div class="food-menu-desc">
                    <h4><?php echo $title ?></h4>
                    <p class="food-price"><?php echo $price ?></p>
                    <p class="food-detail">
                    <?php echo $description ?>
                    </p>
                    <br>

                    <a href="<?php echo SITEURL; ?>category-foods.php?category_id=<?php echo $id; ?>" class="btn btn-primary">Order Now</a>
                </div>
            </div>
                <?php


            }
        }
        else
        {
            echo "no food to be displayed";
        }


        ?>


          
            <div class="clearfix"></div>

            

        </div>

    </section>
  
 
    <!-- social Section Ends Here -->
    <?php include('partials-front/footer.php') ?>