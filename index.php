<!DOCTYPE html>
<html>
<head>
    <title>Sports Scores Website</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        header {
            background-color: #333;
            color: #fff;
            padding: 10px 0;
            text-align: center;
        }
        nav {
            text-align: center;
            margin: 20px 0;
        }
        nav a {
            margin: 0 15px;
            text-decoration: none;
            color: #333;
        }
        .content {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        .search-bar {
            margin-bottom: 20px;
        }
        .search-bar input {
            padding: 8px;
            width: 80%;
            max-width: 400px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        footer {
            text-align: center;
            padding: 10px 0;
            background-color: #333;
            color: #fff;
            position: fixed;
            width: 100%;
            bottom: 0;
        }
    </style>
</head>
<body>
    <header>
        <h1>Sports Scores Website</h1>
    </header>
    <nav>
        <a href="index.php">Home</a>
        <a href="scores.php">Scores</a>
        <a href="#">Teams</a>
        <a href="#">Contact</a>
    </nav>
    <div class="content">
        <h2>Search for a Team</h2>
        <form method="GET" action="">
            <div class="search-bar">
                <input type="text" name="query" placeholder="Search teams..." value="<?php echo isset($_GET['query']) ? htmlspecialchars($_GET['query']) : ''; ?>">
            </div>
            <button type="submit">Search</button>
        </form>
    </div>
    <footer>
        <p>© <?php echo date("Y"); ?> Sports Scores Website. All rights reserved.</p>
    </footer>
</body>
</html>
