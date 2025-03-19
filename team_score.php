<?php 
// Include the database connection file
require_once 'src/DBconnect.php';  // Ensure correct path

// Fetch recent games from the database
try {
    $recentGamesQuery = "
        SELECT 
            CONCAT(t1.location, ' vs ', t2.location) AS teams, 
            g.home_score, g.away_score, g.game_date 
        FROM Games g
        JOIN Teams t1 ON g.home_team_id = t1.team_id
        JOIN Teams t2 ON g.away_team_id = t2.team_id
        ORDER BY g.game_date DESC 
        LIMIT 3
    ";
    $recentGamesStatement = $connection->prepare($recentGamesQuery);
    $recentGamesStatement->execute();
    $recentScores = $recentGamesStatement->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Error fetching recent games: " . $e->getMessage());
}

// Fetch upcoming games from the database
try {
    $upcomingGamesQuery = "
        SELECT 
            CONCAT(t1.location, ' vs ', t2.location) AS teams, 
            g.game_date 
        FROM Games g
        JOIN Teams t1 ON g.home_team_id = t1.team_id
        JOIN Teams t2 ON g.away_team_id = t2.team_id
        WHERE g.game_date >= CURDATE()
        ORDER BY g.game_date ASC 
        LIMIT 3
    ";
    $upcomingGamesStatement = $connection->prepare($upcomingGamesQuery);
    $upcomingGamesStatement->execute();
    $upcomingGames = $upcomingGamesStatement->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Error fetching upcoming games: " . $e->getMessage());
}

// Include the header template
include('public/templates/header.php');
?>

<!-- Main Content -->
<div class="content">
    <!-- Display recent NBA scores -->
    <h2>Recent NBA Scores</h2>
    <div class="box">
        <?php foreach ($recentScores as $score) { ?>
            <p><?php echo $score['teams'] . " - " . $score['home_score'] . " : " . $score['away_score'] . " on " . $score['game_date']; ?></p>
        <?php } ?>
    </div>

    <!-- Display upcoming NBA games -->
    <h2>Upcoming NBA Games</h2>
    <div class="box">
        <?php foreach ($upcomingGames as $game) { ?>
            <p><?php echo $game['teams'] . " on " . $game['game_date']; ?></p>
        <?php } ?>
    </div>
</div>

<?php
// Include the footer template
include('public/templates/footer.php');
?>
