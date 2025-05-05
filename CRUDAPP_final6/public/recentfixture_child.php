<?php
// RecentFixture.php
require_once 'Fixture.php';

class RecentFixture extends Fixture {
    private $homeScore;
    private $awayScore;
    private $homeLogo;
    private $awayLogo;

    public function __construct($homeTeam, $awayTeam, $gameDate, $gameTime, $venue, $homeScore, $awayScore, $homeLogo, $awayLogo) {
        parent::__construct($homeTeam, $awayTeam, $gameDate, $gameTime, $venue);
        $this->homeScore = $homeScore;
        $this->awayScore = $awayScore;
        $this->homeLogo = $homeLogo;
        $this->awayLogo = $awayLogo;
    }

    public function displayFullFixture() {
        return [
            "homeTeam" => $this->homeTeam,
            "awayTeam" => $this->awayTeam,
            "homeScore" => $this->homeScore,
            "awayScore" => $this->awayScore,
            "homeLogo" => $this->homeLogo,
            "awayLogo" => $this->awayLogo,
            "gameDate" => $this->gameDate,
            "gameTime" => $this->gameTime,
            "venue" => $this->venue,
        ];
    }
}
?>
