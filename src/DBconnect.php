<?php
$host = "localhost";  // Change if using a different host
$dbname = "SportsDB";
$username = "root";  // Change based on your MySQL credentials
$password = "";  // Change if needed

try {
    $connection = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}
?>
