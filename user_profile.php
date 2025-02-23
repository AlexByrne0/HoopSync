<?php  
include 'header.php';
session_start();

// User details (replacing with database integration)
$user = [
    'name' => '',
    'email' => '',
    'bio' => '',
    'favorite_sport' => ''
];

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user['name'] = $_POST['name'];
    $user['email'] = $_POST['email'];
    $user['bio'] = $_POST['bio'];
    $user['favorite_sport'] = $_POST['favorite_sport'];
    $_SESSION['user'] = $user;
}

// Retrieve stored user data
if (isset($_SESSION['user'])) {
    $user = $_SESSION['user'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Personal Profile</title>
    <link rel="stylesheet" href="infostyles.css"> <!-- Link to your CSS file -->
</head>
<body>
    <header>
        <h1>Personal Profile</h1>
    </header>

    <div class="content">
        <div class="box">
            <h2>Welcome, <?php echo !empty($user['name']) ? htmlspecialchars($user['name']) : 'Guest'; ?>!</h2>
            <p><strong>Email:</strong> <?php echo !empty($user['email']) ? htmlspecialchars($user['email']) : 'Not provided'; ?></p>
            <p><strong>Bio:</strong> <?php echo !empty($user['bio']) ? nl2br(htmlspecialchars($user['bio'])) : 'No bio added'; ?></p>
            <p><strong>Favorite Sport:</strong> <?php echo !empty($user['favorite_sport']) ? htmlspecialchars($user['favorite_sport']) : 'Not specified'; ?></p>
        </div>
        
        <div class="box">
            <h2>Edit Profile</h2>
            <form method="POST" action="">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" placeholder="Enter your name" required>
                
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" placeholder="Enter your email" required>
                
                <label for="bio">Bio:</label>
                <textarea id="bio" name="bio" placeholder="Tell us about yourself" required></textarea>
                
                <label for="favorite_sport">Favorite Sport:</label>
                <input type="text" id="favorite_sport" name="favorite_sport" placeholder="Your favorite sport" required>
                
                <button type="submit">Update Profile</button>
            </form>
        </div>
    </div>

    <?php include 'footer.php'; ?>
</body>
</html>
