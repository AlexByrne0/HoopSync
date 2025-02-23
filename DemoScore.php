<?php 
// header file
include 'header.php';

// Array storing recent NBA game scores
$recentScores = [
    "Utah Jazz 116 - 120 LA Clippers",
    "Dallas Mavericks 118 - 113 Miami Heat",
    "Minnesota Timberwolves 116 - 101 Oklahoma City Thunder"
];

// Array storing details of upcoming NBA games
$upcomingGames = [
    ["teams" => "Los Angeles Lakers vs. Charlotte Hornets", "date" => "Feb 20, 2025", "odds" => ["Lakers" => "60%", "Hornets" => "40%"], "star" => "LeBron James"],
    ["teams" => "Philadelphia 76ers vs. Boston Celtics", "date" => "Feb 21, 2025", "odds" => ["76ers" => "55%", "Celtics" => "45%"], "star" => "Joel Embiid"],
    ["teams" => "Indiana Pacers vs. Memphis Grizzlies", "date" => "Feb 21, 2025", "odds" => ["Pacers" => "50%", "Grizzlies" => "50%"], "star" => "Ja Morant"]
];
?>
    
<div class="content">
    <!-- section for displaying recent NBA scores -->
    <h2>Recent NBA Scores</h2>
    <div class="box">
        <?php 
        // fooreach loop through the recent scores array and display each score
        foreach ($recentScores as $score) { 
            echo "<p>$score</p>"; 
        } 
        ?>
    </div>
    
    <!-- Section for displaying upcoming NBA games -->
    <h2>Upcoming NBA Games</h2>
    <div class="box">
        <?php 
        // Loop through the upcoming games array and display game details
        foreach ($upcomingGames as $game) { ?>
            <div class="game-box">
                <p><?php echo $game["teams"] . " - " . $game["date"]; ?></p>
                <div class="dropdown">
                    <p>Details</p>
                    <div class="dropdown-content">
                        <p>Odds of Winning:</p>
                        <!-- Display the odds of each team winning -->
                        <p><?php echo key($game["odds"]) . ": " . current($game["odds"]); ?></p>
                        <p><?php echo key(array_slice($game["odds"], 1, 1, true)) . ": " . end($game["odds"]); ?></p>
                        <p>Star Player: <?php echo $game["star"]; ?></p>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>

<?php 
// Include the footer file
include 'footer.php';
?>

