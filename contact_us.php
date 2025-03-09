<?php
// Set page title and form button text
$site_title = "Contact Us";
$button_text = "Send";
$action_url = "contact.php"; // Form submission URL

// Include the header file
include 'header.php';
?>

<!-- Link to external stylesheet -->
<link rel="stylesheet" href="infostyle.css">

<div class="container">
    <!-- Display the page title -->
    <h2><?php echo $site_title; ?></h2>
    
    <!-- Contact form -->
    <form action="<?php echo $action_url; ?>" method="POST">
        <!-- Name input field -->
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>

        <!-- Email input field -->
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>

        <!-- message textarea field -->
        <label for="message">Message:</label>
        <textarea id="message" name="message" rows="4" required></textarea>

        <!-- submit button -->
        <button type="submit"><?php echo $button_text; ?></button>
    </form>
</div>

<?php 
// Include the footer file
include 'footer.php'; 
?>
