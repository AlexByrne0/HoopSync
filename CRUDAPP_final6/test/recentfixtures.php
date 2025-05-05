<?php 
require "templates/header.php"; 
require_once "recentfixture_child.php"; 
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
$conn = mysqli_connect("localhost", "root", "", "Project");

$sql = "SELECT * FROM recent_fixtures ORDER BY game_date DESC, game_time DESC";
$result = $conn->query($sql);

// Manual logo assignments 
$fixtureImages = [
    1 => ["home" => "images/torontoraptors.png", "away" => "images/clippers.png"],
    2 => ["home" => "images/chicagobullslogo.png", "away" => "images/celtics.png"],
    3 => ["home" => "images/brooklynnetslogo.png", "away" => "images/Philadelphia76erslogo.png"],
    4 => ["home" => "images/lakerslogo.png", "away" => "images/timberwolveslogo.png"],
    5 => ["home" => "images/atlantahawks.png", "away" => "images/hornets.png"],
];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $id = $row["id"];
        $homeLogo = isset($fixtureImages[$id]["home"]) ? $fixtureImages[$id]["home"] : "images/kobe.png";
        $awayLogo = isset($fixtureImages[$id]["away"]) ? $fixtureImages[$id]["away"] : "images/kobe.png";

        // Create a RecentFixture object
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
    echo "<tr><td colspan='6' class='no-results'>No Recent Fixtures</td></tr>";
}

$conn->close();
?>
</table>

<?php include "templates/footer.php"; ?>
