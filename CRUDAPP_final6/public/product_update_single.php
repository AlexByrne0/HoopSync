<?php

require "../common.php";
require_once '../src/DBconnect.php';

if (isset($_POST['submit'])) {
    try {
        $product = [
            "id" => escape($_POST['id']),
            "name" => escape($_POST['name']),
            "price" => escape($_POST['price'])
        ];

        $sql = "UPDATE products
                SET name = :name,
                    price = :price
                WHERE id = :id";

        $statement = $connection->prepare($sql);
        $statement->execute($product);

    } catch (PDOException $error) {
        echo $sql . "<br>" . $error->getMessage();
    }
}

if (isset($_GET['id'])) {
    try {
        $id = $_GET['id'];
        $sql = "SELECT * FROM products WHERE id = :id";
        $statement = $connection->prepare($sql);
        $statement->bindValue(':id', $id);
        $statement->execute();

        $product = $statement->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $error) {
        echo $sql . "<br>" . $error->getMessage();
    }
} else {
    echo "Something went wrong!";
    exit;
}
?>

<?php require "templates/header.php"; ?>

<?php if (isset($_POST['submit']) && $statement) : ?>
    <?php echo escape($_POST['name']); ?> successfully updated.
<?php endif; ?>

<h2>Edit a Product</h2>

<form method="post">
    <?php foreach ($product as $key => $value) : ?>
        <label for="<?php echo $key; ?>"><?php echo ucfirst($key); ?></label>
        <input type="text" name="<?php echo $key; ?>" id="<?php echo $key; ?>"
               value="<?php echo escape($value); ?>" <?php echo ($key === 'id' ? 'readonly' : null); ?>>
    <?php endforeach; ?>
    <input type="submit" name="submit" value="Submit">
</form>

<a href="product_update.php">Back to products</a>

<?php require "templates/footer.php"; ?>
