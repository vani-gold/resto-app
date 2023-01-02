<?php include('partials/menu.php') ?>

<!-- content Section start -->
<div class="main-content">
    <h1 class="text-center">Manage Category</h1>
    <br>
    <?php
    if (isset($_SESSION['add'])) {
        echo $_SESSION['add'];
        unset($_SESSION['add']);
    }
    ?>
    <br>
    <p class="btn-primary"><a href="<?php echo SITEURL; ?>admin/add-category.php">Add Category</a></p>
    <div class="wrapper wrapper-main">
        <table>
            <tr>
                <th>S.N</th>
                <th>Full name</th>
                <th>Username</th>
                <th>Action</th>
            </tr>
            <tr>
                <td>1</td>
                <td>Maria Anders</td>
                <td>Germany</td>
                <td>
                    <a class="update" href="">Update</a>
                    <a class="danger" href="">delete</a>
                </td>
            </tr>
            <tr>
                <td>2</td>
                <td>Francisco Chang</td>
                <td>Mexico</td>
                <td> <a class="update" href="">Update</a>
                    <a class="danger" href="">delete</a>
                </td>
            </tr>
            <tr>
                <td>3</td>
                <td>Roland Mendel</td>
                <td>Austria</td>
                <td> <a class="update" href="">Update</a>
                    <a class="danger" href="">delete</a>
                </td>
            </tr>

        </table>
    </div>
</div>
<!-- content Section ends -->
<?php include('partials/footer.php') ?>