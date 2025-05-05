<?php require "templates/header.php"; ?>

<h1 class="trade-heading">Upcoming NBA Fixtures</h1>

// display upcoming NBA games
<table class="fixtures-table">
    <tr>
        <th>Home Team</th>
        <th></th> //VS column
        <th>Away Team</th>
        <th>Date</th>
        <th>Time</th>
        <th>Venue</th>
    </tr>

    <?php
    require_once '../src/DBconnect.php';

    try {
        // get upcoming fixtures, sorted by date and time
        $sql = "SELECT * FROM upcoming_fixtures ORDER BY game_date ASC, game_time ASC";
        $stmt = $connection->prepare($sql); // Prepare SQL query
        $stmt->execute(); // Execute query
        $fixtures = $stmt->fetchAll(PDO::FETCH_ASSOC); // Fetch all results as arrays

        // Predefined team logos based on fixture ID
        $fixtureImages = [
            1 => ["home" => "images/lakerslogo.png", "away" => "images/nuggetslogo.png"],
            2 => ["home" => "images/goldenstatelogo.png", "away" => "images/mavericks.png"],
            3 => ["home" => "images/timberwolveslogo.png", "away" => "images/clippers.png"],
            4 => ["home" => "images/grizzlies.png", "away" => "images/celtics.png"],
            5 => ["home" => "images/okc.png", "away" => "images/atlantahawks.png"],
        ];

        // Check if there are any fixtures
        if ($fixtures && count($fixtures) > 0) {
            foreach ($fixtures as $row) {
                // Extract fixture data
                $id = $row["id"];
                $home = $row["team_home"];
                $away = $row["team_away"];

                // Get team logos based on ID or use default fallback
                $homeLogo = $fixtureImages[$id]["home"] ?? "images/kobe.png";
                $awayLogo = $fixtureImages[$id]["away"] ?? "images/kobe.png";

                // Output each fixture as a table row
                echo "<tr>";
                echo "<td class='team-cell'><img src='$homeLogo' alt='$home Logo'><span>$home</span></td>";
                echo "<td class='vs-cell'>VS</td>";
                echo "<td class='team-cell'><img src='$awayLogo' alt='$away Logo'><span>$away</span></td>";
                echo "<td>" . $row["game_date"] . "</td>";
                echo "<td>" . $row["game_time"] . "</td>";
                echo "<td>" . $row["venue"] . "</td>";
                echo "</tr>";
            }
        } else {
            // Display a message if no fixtures are found
            echo "<tr><td colspan='6' class='no-results'>No Upcoming Fixtures</td></tr>";
        }
    } catch (PDOException $error) {
        // Handle and display database errors
        echo "<tr><td colspan='6' class='error'>Error loading fixtures: " . $error->getMessage() . "</td></tr>";
    }
    ?>
</table>

<?php include "templates/footer.php"; ?>

<link rel="stylesheet" type="text/css" href="../public/css/upcoming.css">
