<?php session_start();
if($_SESSION['Active'] == false){ 
    header("location:login.php");
    exit;
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
    <h3>Status: You are logged in <?php echo $_SESSION['Username'];?> </h3>
    <form action="logout.php" method="post" name="Logout_Form"class="form-signin">
<button name="Submit" value="Logout" class="button"
type="submit">Log out</button>
    
</header>
