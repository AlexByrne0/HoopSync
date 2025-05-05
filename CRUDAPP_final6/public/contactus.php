<?php
if (isset($_POST['submit'])) {
    require "../common.php";
    try {
        require_once '../src/DBconnect.php';
// Sanitize user input using the escape()
        $contact_data = array(
            "name" => escape($_POST['name']),
            "email" => escape($_POST['email']),
            "message" => escape($_POST['message'])
        );
// Build the SQL query dynamically using placeholders
        $sql = sprintf(
            "INSERT INTO %s (%s) values (%s)",
            "contacts",
            implode(", ", array_keys($contact_data)),
            ":" . implode(", :", array_keys($contact_data))
        );

        $statement = $connection->prepare($sql);
        $statement->execute($contact_data);

        header("Location: thankyou.php");
        exit;
    } catch (PDOException $error) {
        echo $sql . "<br>" . $error->getMessage();
    }
}
?>

<?php require "templates/header.php"; ?>

<h1 class="trade-heading">Contact Us</h1>

<form method="POST" class="contact-form">
    <label for="name">Full Name</label>
    <input type="text" id="name" name="name" placeholder="Your Name" required>

    <label for="email">Email Address</label>
    <input type="email" id="email" name="email" placeholder="Your Email" required>

    <label for="message">Message</label>
    <textarea id="message" name="message" placeholder="Your Message" required></textarea>

    <button type="submit" name="submit" class="submit-btn">Send Message</button>
</form>

<?php include "templates/footer.php"; ?>

<link rel="stylesheet" href="css/contact.css" />

