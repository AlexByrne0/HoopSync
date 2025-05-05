<?php 
session_start();
if($_SESSION['Active'] == false){ //this ensures that the user is logged in when accesing any site with this header on it
    header("location:login.php");//Redirect location
    exit;
    }

    $cart_count = 0;
    if (isset($_SESSION['cart']) && is_array($_SESSION['cart'])) {  // checks if the cart exists and is an array.
        foreach ($_SESSION['cart'] as $qty) {  //Loops through each item in the cart
            $cart_count +=  (int)$qty; //adds each quantity to $cart_count.//(int)$qty ensures that the value is cast to an integer in case it's stored as a string
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>HoopSync - The #1 NBA Scores Website!</title>

    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/tradenews.css" />
    
</head>
<body>

<header>
    <img src="images/hoopsync.png" alt="HoopSync Logo" id="logo">
    
    <h1>HoopSync - The #1 NBA Scores Website!</h1>
    <h3>Status: You are logged in <?php echo $_SESSION['Usermame'];?> </h3>
 
    <!-- makes sure navbar is under title -->
    <nav>
        <ul>
            <li><a href="contactus.php">Contact Us</a></li>
            <li><a href="tradenews.php">Trade News</a></li>
            <li><a href="create.php">Personal Profile</a></li>
            <li><a href="upcomingfixtures.php">Upcoming Fixtures</a></li>
            <li><a href="recentfixtures.php">Recent Fixtures</a></li>
        </ul>
    </nav>
</header>
