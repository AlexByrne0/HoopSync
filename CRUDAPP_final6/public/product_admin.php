<?php require_once('../public/templates/header.php'); ?>


    <div class="content">
        <h1>product management HoopSync!</h1>

        <!-- "Create" as a big button -->
        <div class="primary-action">
            <a class="main-button" href="create.php">My Account</a>
        </div>

        <!-- Admin actions in list format -->
        <ul class="admin-links">
            <li><a href="product_create.php"><strong>create</strong></a> create new product (Admin Only)</li>
            <li><a href="product_delete.php"><strong>Delete</strong></a> Delete product (Admin Only)</li>
            <li><a href="product_update.php"><strong>update</strong></a> update product (Admin Only)</li>
        </ul>
    </div>



<?php include '../public/templates/footer.php'; ?>
