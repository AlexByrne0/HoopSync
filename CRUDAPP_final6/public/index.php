<?php require_once('../public/templates/headerindex.php'); ?>
<link rel="stylesheet" href="../css/index.css">

<div class="index-container">
    <div class="left-image">
        <img src="images/luka.png" alt="Left Image">
    </div>

    <div class="content">
        <h1>Welcome back to HoopSync!</h1>

        <!-- "Create" as a big button -->
        <div class="primary-action">
            <a class="main-button" href="create.php">My Account</a>
        </div>

        <!-- "admin" actions actually accesible by all as no sepertae accounts" -->
        <ul class="admin-links">
            <li><a href="read.php"><strong>Read</strong></a> – Find an account (Admin Only)</li>
            <li><a href="update.php"><strong>Update</strong></a> – Edit an account (Admin Only)</li>
            <li><a href="delete.php"><strong>Delete</strong></a> – Delete an account (Admin Only)</li>
            <li><a href="addupcomingfixture.php"><strong>Add Fixture</strong></a> – Schedule a new game (Admin Only)</li>
        </ul>
    </div>

    <div class="right-image">
        <img src="images/kobe.png" alt="Right Image">
    </div>
</div>

<?php include '../public/templates/footer.php'; ?>
<link rel="stylesheet" type="text/css" href="../public/css/index.css">