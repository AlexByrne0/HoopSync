<?php
require "templates/header.php";
require "../common.php";
require_once '../src/DBconnect.php';

if (isset($_POST['submit'])) {
    try {
        $firstname = escape($_POST['firstname']);
        $lastname = escape($_POST['lastname']);
        $email = escape($_POST['email']);
        $age = escape($_POST['age']);
        $location = escape($_POST['location']);

        // calculate total amount
        $total_amount = 0;
        $product_ids = array_keys($_SESSION['cart']);

// gets product details from productstable
        $sql = "SELECT * FROM products WHERE id IN (" . implode(',', array_fill(0, count($product_ids), '?')) . ")";
        $statement = $connection->prepare($sql);
        $statement->execute($product_ids);
        $products = $statement->fetchAll();

          // Map by ID
        $product_map = [];
        foreach ($products as $product) {
            $product_map[$product['id']] = $product;//fast and readable way to get the product info by its ID
        }
         //At the end of the loop, $total_amount contains the total price of the entire shopping cart.
        foreach ($_SESSION['cart'] as $productid => $quantity) {
            $price = floatval($product_map[$productid]['price']);
            $subtotal = $price * intval($quantity);
            $total_amount += $subtotal;
        }

        // Inserting order
        $order_sql = "INSERT INTO orders (firstname, lastname, email, age, location, total_amount) 
                      VALUES (:firstname, :lastname, :email, :age, :location, :total_amount)";
        $statement = $connection->prepare($order_sql);
        $statement->execute([
            ':firstname' => $firstname,
            ':lastname' => $lastname,
            ':email' => $email,
            ':age' => $age,
            ':location' => $location,
            ':total_amount' => $total_amount
        ]);

        $order_id = $connection->lastInsertId();

        // Insert order items
        $item_sql = "INSERT INTO order_items (order_id, product_id, product_name, quantity, price, subtotal)
                     VALUES (:order_id, :product_id, :product_name, :quantity, :price, :subtotal)";
        $item_statement = $connection->prepare($item_sql);
        
            //It logs all purchased items individually into the order_items table, associated with a single order_id (from the parent orders table)
        foreach ($_SESSION['cart'] as $productid => $quantity) {
            $product = $product_map[$productid];
            $price = floatval($product['price']);
            $subtotal = $price * intval($quantity);

            $item_statement->execute([
                ':order_id' => $order_id,
                ':product_id' => $productid,
                ':product_name' => $product['name'],
                ':quantity' => $quantity,
                ':price' => $price,
                ':subtotal' => $subtotal
            ]);
        }

        // Clear the cart
        $_SESSION['cart'] = [];

        // Redirect to thank you page
        header("Location: thankyou.php");
        exit;

    } catch (PDOException $error) {
        echo "Checkout error: " . $error->getMessage();
    }
}
?>

<h2>Checkout</h2>
<form method="post">
    <label for="firstname">First Name</label>
    <input type="text" name="firstname" id="firstname" required>
    <label for="lastname">Last Name</label>
    <input type="text" name="lastname" id="lastname" required>
    <label for="email">Email Address</label>
    <input type="email" name="email" id="email" required>
    <label for="age">Age</label>
    <input type="number" name="age" id="age" required>
    <label for="location">Location</label>
    <input type="text" name="location" id="location" required>
    


<h3>Payment Details</h3>

    <label for="card_name">Name on Card</label>
    <input type="text" name="card_name" id="card_name" required>

    <label for="card_number">Card Number</label>
    <input type="text" name="card_number" id="card_number" pattern="\d{16}" required> 

    <label for="expiry">Expiry Date (MM/YY)</label>
    <input type="text" name="expiry" id="expiry" pattern="\d{2}/\d{2}" required>

    <label for="cvv">CVV</label>
    <input type="text" name="cvv" id="cvv" pattern="\d{3}" required>

    <input type="submit" name="submit" value="Checkout">
</form>

<?php require "templates/footer.php"; ?>
