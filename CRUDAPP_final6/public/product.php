<?php
require "templates/header.php"; 

if (isset($_POST["add_to_cart"])) {
    // get the product ID and quantity from the form
    $product_id = $_POST["product_id"];
    $product_quantity = $_POST["product_quantity"];

    // Initialize the cart session variable if it doesn't exist
    if (!isset($_SESSION["cart"])) {
        $_SESSION["cart"] = [];
        header("Location: cart.php");
        exit;
    }

    // Adding the product and quantity to the cart
    $_SESSION["cart"][$product_id] = $product_quantity;
    header("Location: cart.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" href="css/product.css" />
<body>
    <header>
        <h1>Welcome! Get your game data</h1>
    </header>

    <main>
        <section>
            <h2>Products</h2>
            <ul>
                <!-- Product 1 -->
                <li>
                    <h3>Chicago Bulls Statistics 2024</h3>
                    <img src="images/chicagobullslogo.png" alt="Chicago Bulls Logo">
                    <p>With all player and game statistics</p>
                    <p><span>$10</span></p>

                    <!-- Add to Cart Form -->
                    <form method="post" action="product.php">
                        <input type="hidden" name="product_id" value="1">
                        <label for="product1_quantity">Quantity:</label>
                        <input type="number" id="product1_quantity" name="product_quantity" value="" min="0" max="10">
                        <button type="submit" name="add_to_cart">Add to Cart</button>
                    </form>
                </li>

                <!-- Product 2 -->
                <li>
                    <h3>Celtics Statistics 2024</h3>
                    <img src="images/celtics.png" alt="Celtics Logo">
                    <p>With all player and game statistics</p>
                    <p><span>$10</span></p>

                    <!-- Add to Cart Form -->
                    <form method="post" action="product.php">
                        <input type="hidden" name="product_id" value="2">
                        <label for="product2_quantity">Quantity:</label>
                        <input type="number" id="product2_quantity" name="product_quantity" value="" min="0" max="10">
                        <button type="submit" name="add_to_cart">Add to Cart</button>
                    </form>
                </li>
                <!-- Product 3 -->
                <li>
                    <h3>Lakers Statistics 2024</h3>
                    <img src="images/lakerslogo.png" alt="lakers Logo">
                    <p>With all player and game statistics</p>
                    <p><span>$10</span></p>

                    <!-- Add to Cart Form -->
                    <form method="post" action="product.php">
                        <input type="hidden" name="product_id" value="3">
                        <label for="product3_quantity">Quantity:</label>
                        <input type="number" id="product3_quantity" name="product_quantity" value="" min="0" max="10">
                        <button type="submit" name="add_to_cart">Add to Cart</button>
                    </form>
                </li>

                <!-- Product 4 -->
                <li>
                    <h3>Hornets Statistics 2024</h3>
                    <img src="images/hornets.png" alt="hornets Logo">
                    <p>With all player and game statistics</p>
                    <p><span>$10</span></p>

                    <!-- Add to Cart Form -->
                    <form method="post" action="product.php">
                        <input type="hidden" name="product_id" value="5">
                        <label for="product4_quantity">Quantity:</label>
                        <input type="number" id="product4_quantity" name="product_quantity" value="" min="0" max="10">
                        <button type="submit" name="add_to_cart">Add to Cart</button>
                    </form>
                </li>
          
            </ul>
        </section>
    </main>
</body>
</html>

<?php require "templates/footer.php"; ?>
