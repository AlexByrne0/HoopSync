<?php
class SportsWebsite {
    private $recentScores;
    private $upcomingGames;

    public function __construct() {
        $this->recentScores = [
            "Utah Jazz 116 - 120 LA Clippers",
            "Dallas Mavericks 118 - 113 Miami Heat",
            "Minnesota Timberwolves 116 - 101 Oklahoma City Thunder"
        ];

        $this->upcomingGames = [
            "Los Angeles Lakers vs. Charlotte Hornets - Feb 20, 2025",
            "Philadelphia 76ers vs. Boston Celtics - Feb 21, 2025",
            "Indiana Pacers vs. Memphis Grizzlies - Feb 21, 2025"
        ];
    }

    public function displayHeader() {
        include 'public/templates/header.php';
    }

    public function displayFooter() {
        include 'public/templates/footer.php';
    }

    public function displayRecentScores() {
        echo "<div class='box'><h3>Recent NBA Scores</h3>";
        foreach ($this->recentScores as $score) {
            echo "<p>{$score}</p>";
        }
        echo "</div>";
    }

    public function displayUpcomingGames() {
        echo "<div class='box'><h3>Upcoming NBA Games</h3>";
        foreach ($this->upcomingGames as $game) {
            echo "<p>{$game}</p>";
        }
        echo "</div>";
    }

    public function displayUserProfileForm() {
        echo "<div class='box'>
                <h3>Your NBA Profile</h3>
                <form action='profile_submit.php' method='post'>
                    <label for='fav_team'>Favorite NBA Team:</label><br>
                    <input type='text' id='fav_team' name='fav_team' placeholder='Enter your favorite team'><br><br>
                    
                    <label for='fav_player'>Favorite NBA Player:</label><br>
                    <input type='text' id='fav_player' name='fav_player' placeholder='Enter your favorite player'><br><br>
                    
                    <label for='fav_moment'>Favorite NBA Moment:</label><br>
                    <textarea id='fav_moment' name='fav_moment' rows='4' cols='50' placeholder='Share your favorite NBA moment'></textarea><br><br>
                    
                    <input type='submit' value='Save Profile'>
                </form>
              </div>";
    }

    public function displayContent() {
        echo "<div class='content'>
                <h2>Welcome to THE Sports Scores Website</h2>
                <p>Stay updated with the latest sports scores and news.</p>";

        $this->displayRecentScores();
        $this->displayUpcomingGames();
        $this->displayUserProfileForm();

        echo "</div>";
    }
}

// Instantiate the class and render the page
$sportsWebsite = new SportsWebsite();
$sportsWebsite->displayHeader();
$sportsWebsite->displayContent();
$sportsWebsite->displayFooter();
?>
