<?php 
require "templates/header.php"; 
require_once "recentfixture_child.php"; 
require_once '../src/DBconnect.php'; // Contains your PDO connection
?>

<h1 class="trade-heading">Recent NBA Fixtures</h1>

<table class="fixtures-table">
    <tr>
        <th>Home Team</th>
        <th></th>
        <th>Away Team</th>
        <th>Date</th>
        <th>Time</th>
        <th>Venue</th>
    </tr>

<?php
try {// Query to fetch upcoming fixtures ordered by date and time
    $sql = "SELECT * FROM recent_fixtures ORDER BY game_date DESC, game_time DESC";
    $statement = $connection->prepare($sql);
    $statement->execute();
    $fixtures = $statement->fetchAll(PDO::FETCH_ASSOC);

    // using fixture IDs to get home/away team logos 
    $fixtureImages = [
        1 => ["home" => "images/atlantahawks.png", "away" => "images/hornets.png"],
        2 => ["home" => "images/lakerslogo.png", "away" => "images/timberwolveslogo.png"],
        3 => ["home" => "images/brooklynnetslogo.png", "away" => "images/Philadelphia76erslogo.png"],
        4 => ["home" => "images/chicagobullslogo.png", "away" => "images/celtics.png"],
        5 => ["home" => "images/torontoraptors.png", "away" => "images/clippers.png"],
    ];
// Check if fixtures were returned
    if (count($fixtures) > 0) {
        foreach ($fixtures as $row) {
            $id = $row["id"];
            // Assign logos or fallback to default image
            $homeLogo = isset($fixtureImages[$id]["home"]) ? $fixtureImages[$id]["home"] : "images/kobe.png";
            $awayLogo = isset($fixtureImages[$id]["away"]) ? $fixtureImages[$id]["away"] : "images/kobe.png";

            // Create RecentFixture object
            $fixture = new RecentFixture(
                $row["team_home"],
                $row["team_away"],
                $row["game_date"],
                $row["game_time"],
                $row["venue"],
                $row["home_score"],
                $row["away_score"],
                $homeLogo,
                $awayLogo
            );

            $fixtureData = $fixture->displayFullFixture();

            echo "<tr>";
            echo "<td class='team-cell'><img src='{$fixtureData['homeLogo']}' alt='{$fixtureData['homeTeam']} Logo'><span>{$fixtureData['homeTeam']} <strong>{$fixtureData['homeScore']}</strong></span></td>";
            echo "<td class='vs-cell'>-</td>";
            echo "<td class='team-cell'><img src='{$fixtureData['awayLogo']}' alt='{$fixtureData['awayTeam']} Logo'><span><strong>{$fixtureData['awayScore']}</strong> {$fixtureData['awayTeam']}</span></td>";
            echo "<td>{$fixtureData['gameDate']}</td>";
            echo "<td>{$fixtureData['gameTime']}</td>";
            echo "<td>{$fixtureData['venue']}</td>";
            echo "</tr>";
        }
    } else {
        // Display message if no fixtures are available
        echo "<tr><td colspan='6' class='no-results'>No Recent Fixtures</td></tr>";
    }

} catch (PDOException $e) {
    // Display error message if database query fails
    echo "<tr><td colspan='6' class='error'>Error: " . $e->getMessage() . "</td></tr>";
}
?>
</table>

<?php include "templates/footer.php"; ?>
