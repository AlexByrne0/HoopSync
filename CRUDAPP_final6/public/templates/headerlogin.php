<!-- No need for session start breaks the entire website -->

<!DOCTYPE html>
<head>
    
    
    <title>HoopSync - The #1 NBA Scores Website!</title>
</head>
<body>
<header>
    <img src="images/hoopsync.png" alt="HoopSync Logo" id="logo">
    <h1>HoopSync - The #1 NBA Scores Website!</h1>
    <h3>Status: You are logged in <?php echo isset($_SESSION['Username']) ? $_SESSION['Username'] : "Guest"; ?></h3>
    <form action="logout.php" method="post" name="Logout_Form" class="form-signin">
        <button name="Submit" value="Logout" class="button" type="submit">Log out</button>
    </form>
</header>