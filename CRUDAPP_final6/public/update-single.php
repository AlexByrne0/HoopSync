<?php

// Include common helper functions (e.g., escape())
require "../common.php";

// Handle form submission
if (isset($_POST['submit'])) {
    try {
        // Connect to the database
        require_once '../src/DBconnect.php';

        // Collect and sanitize submitted form data
        $user =[
            "id" => escape($_POST['id']),
            "firstname" => escape($_POST['firstname']),
            "lastname" => escape($_POST['lastname']),
            "email" => escape($_POST['email']),
            "age" => escape($_POST['age']),
            "location" => escape($_POST['location']),
            "date" => escape($_POST['date']) // This value is collected but not used in the SQL query
        ];

        // Prepare SQL statement to update user information
        $sql = "UPDATE users
SET id = :id,
firstname = :firstname,
lastname = :lastname,
email = :email,
age = :age,
location = :location
WHERE id = :id";

        // Execute the update
        $statement = $connection->prepare($sql);
        $statement->execute($user);

    } catch(PDOException $error) {
        // Show error message if query fails
        echo $sql . "<br>" . $error->getMessage();
    }
}

// Handle loading the user data to pre-fill the form for editing
if (isset($_GET['id'])) {
    try {
        require_once '../src/DBconnect.php';

        // Get user ID from URL
        $id = $_GET['id'];

        // Prepare and execute a SELECT query to fetch user data
        $sql = "SELECT * FROM users WHERE id = :id";
        $statement = $connection->prepare($sql);
        $statement->bindValue(':id', $id);
        $statement->execute();

        // Store result in $user array
        $user = $statement->fetch(PDO::FETCH_ASSOC);

    } catch(PDOException $error) {
        // Show error if something goes wrong with the SELECT query
        echo $sql . "<br>" . $error->getMessage();
    }
} else {
    // Exit if no ID is provided in the URL
    echo "Something went wrong!";
    exit;
}
?>

<?php require "templates/header.php"; ?>

<!-- Display confirmation message if the form was submitted and query executed -->
<?php if (isset($_POST['submit']) && $statement) : ?>
    <?php echo escape($_POST['firstname']); ?> successfully updated.
<?php endif; ?>

<!-- Title of the form -->
<h2>Edit a user</h2>

<!-- Begin user edit form -->
<form method="post">
    <?php foreach ($user as $key => $value) : ?>
        <label for="<?php echo $key; ?>"><?php echo ucfirst($key); ?></label>
        <input
                type="text"
                name="<?php echo $key; ?>"
                id="<?php echo $key; ?>"
                value="<?php echo escape($value); ?>"
            <?php echo ($key === 'id' ? 'readonly' : null); ?>> <!-- Make 'id' field read-only -->
    <?php endforeach; ?>
    <input type="submit" name="submit" value="Submit">
</form>

<!-- Navigation link -->
<a href="index.php">Back to home</a>

<?php require "templates/footer.php"; ?>
