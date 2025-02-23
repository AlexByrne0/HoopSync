<?php
// Include the header
include 'header.php';  

// data for the Toronto Raptors team (future database)
$team_info = [
    'name' => 'Toronto Raptors',
    'description' => 'The Toronto Raptors are a professional basketball team based in Toronto, Canada. They are a member of the NBA\'s Eastern Conference Atlantic Division. The Raptors have a passionate fan base and have achieved significant success, including winning the NBA Championship in 2019.'
];

// load team roster from the JSON file
$team_roster = json_decode(file_get_contents('team_roster.json'), true);

// upcoming Games (future database)
$upcoming_games = [
    [
        'opponent' => 'Miami Heat',
        'date' => 'Feb 22, 2025',
        'odds' => ['Raptors' => 55, 'Miami Heat' => 45],
        'star_player' => 'Scottie Barnes'
    ],
    [
        'opponent' => 'Phoenix Suns',
        'date' => 'Feb 24, 2025',
        'odds' => ['Raptors' => 50, 'Phoenix Suns' => 50],
        'star_player' => 'RJ Barrett'
    ],
    [
        'opponent' => 'Boston Celtics',
        'date' => 'Feb 26, 2025',
        'odds' => ['Raptors' => 45, 'Boston Celtics' => 55],
        'star_player' => 'Gradey Dick'
    ]
];

// Function to display the roster
function displayRoster($roster) {
    if (!empty($roster)) {
        foreach ($roster as $player) {
            echo "<p>{$player['name']} - {$player['position']}</p>";
        }
    } else {
        echo "<p>No players available in the roster.</p>";
    }
}

// Function to display upcoming games
function displayUpcomingGames($games) {
    if (!empty($games)) {
        foreach ($games as $game) {
            echo "<div class='game-box'>
                    <p>Toronto Raptors vs. {$game['opponent']} - {$game['date']}</p>
                    <div class='dropdown'>
                        <p>Details</p>
                        <div class='dropdown-content'>
                            <p>Odds of Winning:</p>
                            <p>Raptors: {$game['odds']['Raptors']}%</p>
                            <p>{$game['opponent']}: {$game['odds'][$game['opponent']]}%</p>
                            <p>Star Player: {$game['star_player']}</p>
                        </div>
                    </div>
                </div>";
        }
    } else {
        echo "<p>No upcoming games available.</p>";
    }
}
?>

<!-- Link to the external CSS file for styling 
 it is red raptors are favourite team   -->
<link rel="stylesheet" type="text/css" href="favteamstyles.css"> 

<div class="content">
    <h2>About the Toronto Raptors</h2>
    <div class="box">
        <p><?php echo $team_info['description']; ?></p>
    </div>

    <h2>Team Roster</h2>
    <div class="box">
        <?php displayRoster($team_roster); ?>
    </div>

    <h2>Upcoming Raptors Games</h2>
    <div class="box">
        <?php displayUpcomingGames($upcoming_games); ?>
    </div>
</div>

<?php
// Include the footer
include 'footer.php';  
?>

