<?php require "templates/header.php"; ?>

<h1 class="trade-heading">Recent Trade News</h1>

 //display trade news articles in a table
<table>
    <tr>
        <th></th>
        <th>Title</th>
        <th>Article</th>
        <th>Published Date</th>
        <th></th>
    </tr>

    <?php
    require "../common.php";
    require_once "../src/DBconnect.php"; // Connect to the database

    // Array of images
    $images = [
        "images/lukatrade.png",
        "images/lugentez.png",
        "images/mikemalone.png",
        "images/pacers.png"
    ];

    // discussion pages for each article
    $discussionPages = [
        "lakersnews.php",
        "lugenteznews.php",
        "nuggetsnews.php",
        "pacersnews.php"
    ];

    try {
        // Fetch all trade news records from the database
        $sql = "SELECT * FROM tradenews";
        $statement = $connection->prepare($sql); // Prepare the SQL query
        $statement->execute(); // Execute the query
        $result = $statement->fetchAll(); // Fetch all resulting rows

        // If there are results, display them in the table
        if ($result && count($result) > 0) {
            $index = 0;

            foreach ($result as $row) {
                // Cycle through the image array
                $imagePath = $images[$index % count($images)];
                //get the discussion page or fallback to "#"
                $discussionPage = $discussionPages[$index] ?? "#";

                echo "<tr>";
                echo "<td><img src='$imagePath' alt='Trade News Image'></td>";
                echo "<td>" . escape($row["title"]) . "</td>";
                echo "<td>" . escape($row["content"]) . "</td>";
                echo "<td>" . escape($row["published_date"]) . "</td>";
                echo "<td><a class='discuss-btn' href='$discussionPage'>Join the Discussion</a></td>";
                echo "</tr>";

                $index++; // Increment for next article
            }
        } else {
            // No results found in the tradenews table
            echo "<tr><td colspan='5' class='no-results'>No Results</td></tr>";
        }
    } catch (PDOException $error) {
        // Handle database errors
        echo "<tr><td colspan='5' class='error'>Error: " . $error->getMessage() . "</td></tr>";
    }
    ?>
</table>

<?php include "templates/footer.php"; ?>
