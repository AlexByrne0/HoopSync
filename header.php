<?php 
// header.php

// Define variables
$siteTitle = "Scores";
$siteName = "HoopSync";
$navLinks = [
    "Home" => "DemoWebsite.php",
    "Favorite Team Scores" => "Score.php",
    "Teams Scores" => "DemoScore.php",
    "Contact" => "contact_us.php",
    "Profile" => "user_profile.php",
    "Trade News" => "trade_news.php",
];

// function to generate navigation menu
function generateNav($links) {
    $navHtml = "";
    foreach ($links as $name => $url) {
        $navHtml .= "<a href='" . $url . "'>" . $name . "</a>\n";
    }
    return $navHtml;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $siteTitle; ?></title>
    <link rel="stylesheet" type="text/css" href="Infostyles.css">
</head>
<body>
    <header>
        <h1><?php echo $siteName; ?></h1>
    </header>
    <nav>
        <?php echo generateNav($navLinks); ?>
    </nav>
