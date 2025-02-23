<?php
// Calls from header.php
include 'header.php';

// Dynamic content for recent scores and upcoming games
$recent_scores = [
    "Utah Jazz 116 - 120 LA Clippers",
    "Dallas Mavericks 118 - 113 Miami Heat",
    "Minnesota Timberwolves 116 - 101 Oklahoma City Thunder"
];

$upcoming_games = [
    "Los Angeles Lakers vs. Charlotte Hornets - Feb 20, 2025",
    "Philadelphia 76ers vs. Boston Celtics - Feb 21, 2025",
    "Indiana Pacers vs. Memphis Grizzlies - Feb 21, 2025"
];
?>

<div class="content">
    <h2>Welcome to THE Sports Scores Website</h2>
    <p>Stay updated with the latest sports scores and news.</p>
    
    <!-- displaying recent NBA scores -->
    <div class="box">
        <h3>Recent NBA Scores</h3>
        <?php foreach ($recent_scores as $score): ?>
            <p><?php echo $score; ?></p>
        <?php endforeach; ?>
    </div>

    <!-- displaying upcoming NBA games -->
    <div class="box">
        <h3>Upcoming NBA Games</h3>
        <?php foreach ($upcoming_games as $game): ?>
            <p><?php echo $game; ?></p>
        <?php endforeach; ?>
    </div>

    <!-- user profile section -->
    <div class="box">
        <h3>Your NBA Profile</h3>
        <form action="profile_submit.php" method="post">
            <label for="fav_team">Favorite NBA Team:</label><br>
            <input type="text" id="fav_team" name="fav_team" placeholder="Enter your favorite team"><br><br>

            <label for="fav_player">Favorite NBA Player:</label><br>
            <input type="text" id="fav_player" name="fav_player" placeholder="Enter your favorite player"><br><br>

            <label for="fav_moment">Favorite NBA Moment:</label><br>
            <textarea id="fav_moment" name="fav_moment" rows="4" cols="50" placeholder="Share favourite NBA moment for you"></textarea><br><br>

            <input type="submit" value="Save Profile">
            
        </form>
    </div>
</div>

<?php
// Include the footer.php file
include 'footer.php';
?>
