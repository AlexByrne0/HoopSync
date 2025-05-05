<?php
require "templates/header.php";
require "../common.php";

require_once '../src/DBconnect.php';


// the cart is not created OR it’s created but has no products, show a message and stop.
if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) { //Determine whether a variable is empty (https://www.php.net/manual/en/function.empty.php)
    echo "<h2>Your cart is empty.</h2>";
    echo '<a href="product.php">Continue Shopping</a>';
    exit;

}

$product_ids = array_keys($_SESSION['cart']);

try {
    // SQL statement to retrieve product details
    $sql = "SELECT * FROM products WHERE id IN (" . implode(',', array_fill(0, count($product_ids), '?')) . ")";
    $statement = $connection->prepare($sql);
    $statement->execute($product_ids);
    $products = $statement->fetchAll();
} catch (PDOException $error) {
    echo "Error fetching cart items: " . $error->getMessage();
    
    exit;
}
?>

<h2>Your Shopping Cart</h2>
<table>
    <thead>
        <tr>
            <th>Product</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Subtotal</th>
            <th>remove</th> <!-- column for removing product  -->
        </tr>
    </thead>
    <tbody>
        <?php
        $total = 0;
        foreach ($products as $product) {
            $id = $product['id'];
            $quantity = $_SESSION['cart'][$id];
            $subtotal = (float)$product['price'] * (int)$quantity;
            $total += $subtotal;
        ?>
            <tr>
                <td><?php echo escape($product['name']); ?></td>
                <td>$<?php echo number_format((float)$product['price'], 2); ?></td>
                <td><?php echo $quantity; ?></td>
                <td>$<?php echo number_format((float)$subtotal, 2); ?></td>
                <td><form method="post" action="cart.php" style="display:inline;">
                    <input type="hidden" name="remove_id" value="<?php echo $id; ?>">
                    <button type="submit" name="remove">Remove</button>
        </form>
    </td>
</tr>


            
        <?php } ?>
    </tbody>
</table>

<h3>Total: $<?php echo number_format($total, 2); ?></h3>
<a href="product.php">Continue Shopping</a> |
<a href="checkout.php">Proceed to Checkout</a>
<link rel="stylesheet" href="css/contact.css" />

<?php include "templates/footer.php"; ?>
 