<?php
require "../common.php";
require_once '../src/DBconnect.php';

if (isset($_POST['submit'])) {
    try {
        $new_product = array(                          //
            "name" => escape($_POST['name']),   //Creates an associative array called $new_product using sanitized user input (via the escape() function).
            "price" => escape($_POST['price']) //
        );

        $sql = sprintf(
            "INSERT INTO %s (%s) values (%s)",
            "products",
            implode(", ", array_keys($new_product)),
            ":" . implode(", :", array_keys($new_product))
        );

        $statement = $connection->prepare($sql);
        $statement->execute($new_product);

    } catch(PDOException $error) {
        echo $sql . "<br>" . $error->getMessage();
    }
}

require "templates/header.php";
//Checks if the form was submitted.
if (isset($_POST['submit']) && $statement) {// This ensures the code runs only on form submission.
    echo escape($_POST['name']) . ' successfully added.';
}
?>

<h2>Add a Product</h2>
<form method="post">
    <label for="name">Product Name</label>
    <input type="text" name="name" id="name" required>

    <label for="price">Price</label>
    <input type="text" name="price" id="price" required>

    <input type="submit" name="submit" value="Submit">
</form>

<a href="index.php">Back to home</a>

<?php include "templates/footer.php"; ?>
