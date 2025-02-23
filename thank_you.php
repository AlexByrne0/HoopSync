<?php
include 'header.php';

// Display message before redirecting
echo "<h2>Thank You!</h2>";
echo "<p>Your feedback has been submitted successfully.</p>";
echo "<p>Redirecting to the homepage...</p>";

// Redirect to homepage after 3 seconds
header("refresh:3;url=DemoWebsite.php");

// Provide a manual option to go back immediately
echo "<a href='DemoWebsite.php'><button type='button'>Go back to home</button></a>";

include 'footer.php';
?>
