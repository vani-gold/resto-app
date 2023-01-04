<?php include('partials/menu.php'); ?>

<!-- content Section start -->
<div class="main-content">
    <h1 class="text-center">Manage Admin</h1>
    <br><br>
    <?php
    // add message
        if(isset($_SESSION['add']))
        {
            echo $_SESSION['add'];
            unset($_SESSION['add']); //remove session
        }
        // delete message
        if(isset($_SESSION['delete']))
        {
            echo $_SESSION['delete'];
            unset($_SESSION['delete']); //remove session
        }
           // update message
           if(isset($_SESSION['update']))
           {
               echo $_SESSION['update'];
               unset($_SESSION['update']); //remove session
           }
               // change password
               if(isset($_SESSION['user-not-found']))
               {
                   echo $_SESSION['user-not-found'];
                   unset($_SESSION['user-not-found']); //remove session
               }
                 // change password
                 if(isset($_SESSION['pwd-not-match']))
                 {
                     echo $_SESSION['pwd-not-match'];
                     unset($_SESSION['pwd-not-match']); //remove session
                 }
                  // change password
                  if(isset($_SESSION['change-pwd']))
                  {
                      echo $_SESSION['change-pwd'];
                      unset($_SESSION['change-pwd']); //remove session
                  }
    ?>
    <br>
    <p class="btn-primary"><a href="add-admin.php">Add Admin</a></p>
    <div class="wrapper wrapper-main">
        <table>
            <tr>
                <th>S.N</th>
                <th>Full name</th>
                <th>Username</th>
                <th>Action</th>
            </tr>
        <?php
        // query to get all admin
            $sql = "SELECT * FROM tbl_admin";
            // Execute the query
            $res = mysqli_query($conn, $sql);
        
            // checkink if the query is executed
            if($res==TRUE)
            {
                // count Roews to check whether we have data in database
                $count = mysqli_num_rows($res); 
                
                $sn=1;
                
                // check the num of rows
                if($count>0)
                {
                    while($rows=mysqli_fetch_assoc($res))
                    {
                        // while loop to get data
                        $id = $rows['id'];
                        $full_name = $rows['full_name'];
                        $username = $rows['username'];
                       
                        // display values in table
                        ?>
                   <tr>
                        <td><?php echo $sn++; ?></td>
                        <td><?php echo $full_name; ?></td>
                        <td><?php echo $username; ?></td>
                        <td>
                        <a class="update" href="<?php echo SITEURL; ?>admin/update-password.php?id=<?php echo $id; ?>">change password</a>
                            <a class="update" href="<?php echo SITEURL; ?>admin/update-admin.php?id=<?php echo $id; ?>">Update</a>
                            <a href="<?php echo SITEURL; ?>admin/delete-admin.php?id=<?php echo $id; ?>"  class="danger" >delete </a>
                        </td>
                     </tr>


                        <?php
                    }
                }
                else
                {

                }
            }

        ?>

        </table>
    </div>
</div>
<!-- content Section ends -->

<?php include('partials/footer.php'); ?>