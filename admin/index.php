<?php include('partials/menu.php');?>

          <!-- content Section start -->
          <div class="main-content">
          <h1 class="text-center">Dashboard</h1>
          <br>
          <?php
                   if(isset($_SESSION['login']))
                   {
                       echo $_SESSION['login'];
                       unset($_SESSION['login']); //remove session
                   }
            ?>
            <br>
          <div class="wrapper wrapper-main">
            <?php
            $sql = "SELECT * FROM tbl_category";

            // execute querry 
            $res = mysqli_query($conn, $sql);

            // count
            $count = mysqli_num_rows($res)


            ?>
            <div class="col-4 text-center">
                <h2><?php echo $count; ?></h2>
                <p>Category</p>
            </div>
            <div class="col-4 text-center">
            <?php
            $sql2 = "SELECT * FROM tbl_food";

            // execute query 
            $res2 = mysqli_query($conn, $sql2);

            // count
            $count2 = mysqli_num_rows($res2)
            ?>
                <h2><?php echo $count2; ?></h2>
                <p>Foods</p>
            </div>
            <div class="col-4 text-center">
            <?php
            $sql3 = "SELECT * FROM tbl_order";

            // execute query 
            $res3 = mysqli_query($conn, $sql3);

            // count
            $count3 = mysqli_num_rows($res3)
            ?>
                <h2><?php echo $count3; ?></h2>
                <p>Orders</p>
            </div>
            <div class="col-4 text-center">
            <?php 
            // create sql query to get total revenue generated
            // aggregrate function in sql
            $sql4 = "SELECT SUM(total) AS Total FROM tbl_order WHERE status='Delivered'";

            // execute the query
            $res4 = mysqli_query($conn, $sql4);

            // get the value
            $row4 = mysqli_fetch_assoc($res4);

            // get the total revenue
            $total_revenue = $row4['Total'];
            ?>

                <h2><?php echo $total_revenue; ?></h2>
                <p>Revenue Generated</p>
            </div>
            </div>
        </div>
        <!-- content Section ends -->

<?php include('partials/footer.php');?>
  