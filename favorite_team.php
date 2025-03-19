<?php
include 'public/templates/header.php'; // Include the header

// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hoopSync";

// Create the connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check the connection
if (!$conn) {
    die("<p class='error'>Connection failed: " . mysqli_connect_error() . "</p>");
}

echo "<h2>Toronto Raptors Roster</h2>";

//data team
$team_name = "Toronto Raptors";
$location = "Toronto, Canada";
$arena = "Scotiabank Arena";

// team exists
$check_team_sql = "SELECT team_id FROM Teams WHERE name = '$team_name'";
$check_team_result = mysqli_query($conn, $check_team_sql);

if (mysqli_num_rows($check_team_result) == 0) {
    $team_sql = "INSERT INTO Teams (name, location, arena) VALUES ('$team_name', '$location', '$arena')";
    if (mysqli_query($conn, $team_sql)) {
        echo "<p class='success'>New record created successfully in Teams table.</p>";
    }
    $team_id = mysqli_insert_id($conn);
} else {
    $team_row = mysqli_fetch_assoc($check_team_result);
    $team_id = $team_row['team_id'];
}

// Players
$players = [
    ['name' => 'Scottie Barnes', 'position' => 'Forward', 'height_cm' => 203, 'weight_kg' => 100, 'nationality' => 'Canada', 'date_of_birth' => '2001-08-01', 'draft_year' => 2021, 'draft_pick' => 4],
    ['name' => 'Pascal Siakam', 'position' => 'Forward', 'height_cm' => 206, 'weight_kg' => 104, 'nationality' => 'Cameroon', 'date_of_birth' => '1994-04-02', 'draft_year' => 2016, 'draft_pick' => 27],
    ['name' => 'Fred VanVleet', 'position' => 'Guard', 'height_cm' => 183, 'weight_kg' => 90, 'nationality' => 'USA', 'date_of_birth' => '1994-02-25', 'draft_year' => 2016, 'draft_pick' => 0]
];

foreach ($players as $player) {
    $name = $player['name'];
    
    // player
    $check_player_sql = "SELECT player_id FROM Players WHERE name = '$name' AND team_id = '$team_id'";
    $check_player_result = mysqli_query($conn, $check_player_sql);
    
    if (mysqli_num_rows($check_player_result) == 0) {
        $position = $player['position'];
        $height_cm = $player['height_cm'];
        $weight_kg = $player['weight_kg'];
        $nationality = $player['nationality'];
        $date_of_birth = $player['date_of_birth'];
        $draft_year = $player['draft_year'];
        $draft_pick = $player['draft_pick'];
        
        $player_sql = "INSERT INTO Players (name, team_id, position, height_cm, weight_kg, nationality, date_of_birth, draft_year, draft_pick) 
                       VALUES ('$name', '$team_id', '$position', '$height_cm', '$weight_kg', '$nationality', '$date_of_birth', '$draft_year', '$draft_pick')";
        
        if (mysqli_query($conn, $player_sql)) {
            echo "<p class='success'>New record created successfully in Players table for $name.</p>";
        }
    }
}

// Fetch and display the team roster
$roster_sql = "SELECT name, position, height_cm, weight_kg, nationality, date_of_birth, draft_year, draft_pick FROM Players WHERE team_id = '$team_id'";
$roster_result = mysqli_query($conn, $roster_sql);

if (mysqli_num_rows($roster_result) > 0) {
    echo "<table border='1' cellpadding='8' cellspacing='0'>";
    echo "<tr>
            <th>Name</th>
            <th>Position</th>
            <th>Height (cm)</th>
            <th>Weight (kg)</th>
            <th>Nationality</th>
            <th>Date of Birth</th>
            <th>Draft Year</th>
            <th>Draft Pick</th>
          </tr>";

    while ($row = mysqli_fetch_assoc($roster_result)) {
        echo "<tr>
                <td>{$row['name']}</td>
                <td>{$row['position']}</td>
                <td>{$row['height_cm']}</td>
                <td>{$row['weight_kg']}</td>
                <td>{$row['nationality']}</td>
                <td>{$row['date_of_birth']}</td>
                <td>{$row['draft_year']}</td>
                <td>{$row['draft_pick']}</td>
              </tr>";
    }

    echo "</table>";
} else {
    echo "<p>No players found for the Toronto Raptors.</p>";
}

// Close the database connection
mysqli_close($conn);

include 'public/templates/footer.php'; // Include the footer
?>

