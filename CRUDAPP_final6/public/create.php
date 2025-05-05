<?php

if (isset($_POST['submit'])) {
    require "../common.php";
    try {
        require_once '../src/DBconnect.php';
        $new_user = array(
            "firstname" => escape($_POST['firstname']),
            "lastname" => escape($_POST['lastname']),
            "email" => escape($_POST['email']),
            "age" => escape($_POST['age']),
            "location" => escape($_POST['location']),
            "password" => escape($_POST['password'])
        );
        $sql = sprintf(
            "INSERT INTO %s (%s) values (%s)",
            "users",
            implode(", ", array_keys($new_user)),
            ":" . implode(", :", array_keys($new_user))
        );
        $statement = $connection->prepare($sql);
        $statement->execute($new_user);
    } catch(PDOException $error) {
        echo $sql . "<br>" . $error->getMessage();
    }
}
require "templates/header.php";
?>

<div class="main-container">

    <?php
    if (isset($_POST['submit']) && $statement){
        echo "<p style='color:green; font-weight:bold; margin-top:20px;'>" . $new_user['firstname'] . " successfully added!</p>";
    }
    ?>

    <!-- Image Containers outside the form -->
    <div class="image-container-left">
        <img src="images/kobe.png" alt="Image 1" class="form-image">
        <img src="images/jamorantdunk.png" alt="Image 2" class="form-image">
    </div>

    <div class="form-container">
        <h2>Please register an account!</h2>
        <form method="post">
            <label for="firstname">First Name</label>
            <input type="text" name="firstname" id="firstname">

            <label for="lastname">Last Name</label>
            <input type="text" name="lastname" id="lastname">

            <label for="email">Email Address</label>
            <input type="text" name="email" id="email">

            <label for="age">Age</label>
            <input type="text" name="age" id="age">

            <label for="location">Location</label>
            <input type="text" name="location" id="location">

            <label for="password">Password</label>
            <input type="text" name="password" id="password">



            <input type="submit" name="submit" value="Submit">
        </form>
        <a href="index.php">Back to home</a>
    </div>

    <!-- Image Containers outside the form -->
    <div class="image-container-right">
        <img src="images/luka.png" alt="Image 3" class="form-image">
        <img src="images/lebrondunk.png" alt="Image 4" class="form-image">
    </div>

</div>

<?php include "templates/footer.php"; ?>

<link rel="stylesheet" type="text/css" href="../public/css/style.css">
