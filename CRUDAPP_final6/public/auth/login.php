<?php
require_once('config.php');
session_start();

if (isset($_POST['Submit'])) {
    if ($_POST['Username'] == $Username && $_POST['Password'] == $Password) {
        $_SESSION['Username'] = $Username;
        $_SESSION['Active'] = true;
        header("location:../public/index.php");
        exit;
    } else {
        $error = "Incorrect Username or Password";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="../css/login.css">
</head>
<body>
<div class="form-container">
    <form method="post" action="">
        <label for="Username">Username:</label>
        <input type="text" name="Username" id="Username">

        <label for="Password">Password:</label>
        <input type="password" name="Password" id="Password">

        <button type="submit" name="Submit">Login</button>
    </form>
    <?php if (isset($error)) echo "<p>$error</p>"; ?>
</div>
</body>
</html>
