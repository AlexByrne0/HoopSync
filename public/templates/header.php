<?php 
// header.php

// Define variables
$siteTitle = "Scores";
$siteName = "HoopSync";
$navLinks = [
    "Home" => "index.php",
    "Favorite Team Scores" => "favorite_team.php",
    "Teams Scores" => "team_score.php",
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
    <link rel="stylesheet" type="text/css" href="public/css/Infostyles.css">
</head>
<body>
    <header>
    <img src="hoopsync.png" alt="HoopSync Logo" style="max-width: 150px; height: auto;">
       
    </header>
    <nav>
        <?php echo generateNav($navLinks); ?>
    </nav>
