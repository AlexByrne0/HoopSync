<?php
$dsn = 'mysql:host=localhost;dbname=Project';  
$username = 'root';  
$password = '';  
$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false,
];

try {
    // Database Connection
    $connection = new PDO($dsn, $username, $password, $options);
    echo 'DB connected';  //Mainly for testing will show up if db is connected but wont redirect
} catch (PDOException $e) {
    // Again for testing will display if db connection failed
    echo 'Database connection failed: ' . $e->getMessage();
}
?>
