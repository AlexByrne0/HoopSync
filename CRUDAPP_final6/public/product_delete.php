<?php
/**
 * Delete a product
 */
require "../common.php";
require_once '../src/DBconnect.php';



if (isset($_GET["id"])) {
    try {
        $id = $_GET["id"];
        $sql = "DELETE FROM products WHERE id = :id";
        $statement = $connection->prepare($sql);
        $statement->bindValue(':id', $id);
        $statement->execute();

        $success = "Product ID " . escape($id) . " successfully deleted.";

    } catch(PDOException $error) {
        echo $sql . "<br>" . $error->getMessage();
    }
}

// Fetch all products
try {
    require_once '../src/DBconnect.php';

    $sql = "SELECT * FROM products";
    $statement = $connection->prepare($sql);
    $statement->execute();
    $result = $statement->fetchAll();

} catch(PDOException $error) {
    echo $sql . "<br>" . $error->getMessage();
}
?>

<?php require "templates/header.php"; ?>

<h2>Delete Products</h2>

<?php if ($success) : ?>
    <p><strong><?php echo $success; ?></strong></p>
<?php endif; ?>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Price</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($result as $row) : ?>
        <tr>
            <td><?php echo escape($row["id"]); ?></td>
            <td><?php echo escape($row["name"]); ?></td>
            <td><?php echo escape($row["price"]); ?></td>
            <td><a href="product_delete.php?id=<?php echo escape($row["id"]); ?>">Delete</a></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>

<a href="product.php">Back to home</a>

<?php require "templates/footer.php"; ?>
