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
      
            <div class="col-4 text-center">
                <h2>5</h2>
                <p>Category</p>
            </div>
            <div class="col-4 text-center">
                <h2>5</h2>
                <p>Category</p>
            </div>
            <div class="col-4 text-center">
                <h2>5</h2>
                <p>Category</p>
            </div>
            <div class="col-4 text-center">
                <h2>5</h2>
                <p>Category</p>
            </div>
            </div>
        </div>
        <!-- content Section ends -->

<?php include('partials/footer.php');?>
  