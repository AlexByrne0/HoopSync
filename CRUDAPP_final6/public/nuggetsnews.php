<?php

if (isset($_POST['submit'])) {
    require "../common.php"; // Escape function

    try {
        require_once '../src/DBconnect.php'; // DB connection

        // Create array with escaped form values
        $new_comment = array(
            "username" => escape($_POST['username']),
            "comment" => escape($_POST['comment'])
        );

        // build the SQL INSERT statement
        $sql = sprintf(
            "INSERT INTO %s (%s) values (%s)",
            "nuggets_comments",
            implode(", ", array_keys($new_comment)), // column names
            ":" . implode(", :", array_keys($new_comment)) // placeholders
        );

        // Prepare and execute the insert statement
        $statement = $connection->prepare($sql);
        $statement->execute($new_comment);
    } catch(PDOException $error) {
        // Output error for debugging
        echo $sql . "<br>" . $error->getMessage();
    }
}

require "templates/header.php";
?>


<link rel="stylesheet" type="text/css" href="../public/css/commentsection.css">

<div class="comment-page-container">
    <div class="comment-form-section">

        <div class="center-image">
            <img src="images/mikemalone.png" alt="Mike Malone Coach">
        </div>

        <h2>Post a Comment</h2>

        //Comment form
        <form method="post">
            <label for="username">Your Name</label>
            <input type="text" name="username" id="username" required>

            <label for="comment">Your Comment</label>
            <textarea name="comment" id="comment" rows="5" required></textarea>

            <input type="submit" name="submit" value="Post Comment">
        </form>

        // message after comment submission
        <?php
        if (isset($_POST['submit']) && $statement) {
            echo "<p class='success-msg'>Comment by <strong>" . $new_comment['username'] . "</strong> posted successfully!</p>";
        }
        ?>
    </div>

    <div class="comment-list-section">
        <h2>Comment Section</h2>

        <?php
        try {
            require_once '../src/DBconnect.php';

            // Fetch all comments from the DB latest first
            $sql = "SELECT * FROM nuggets_comments ORDER BY created_at DESC";
            $stmt = $connection->prepare($sql);
            $stmt->execute();
            $comments = $stmt->fetchAll();

            // Display each comment
            if ($comments && count($comments) > 0) {
                foreach ($comments as $row) {
                    echo "<div class='comment-card'>";
                    echo "<p class='comment-user'><strong>" . escape($row["username"]) . "</strong> <span class='comment-time'>" . escape($row["created_at"]) . "</span></p>";
                    echo "<p class='comment-text'>" . escape($row["comment"]) . "</p>";
                    echo "</div>";
                }
            } else {
                // No comments to show
                echo "<p class='no-comments'>No comments yet. Be the first to comment!</p>";
            }
        } catch (PDOException $error) {
            // Handle DB fetch error
            echo "<p class='error'>Error loading comments: " . $error->getMessage() . "</p>";
        }
        ?>
    </div>
</div>

//Link back to Trade News
<div class="back-btn-container">
    <a href="tradenews.php" class="back-btn">← Back to Trade News</a>
</div>

<?php include "templates/footer.php"; ?>
