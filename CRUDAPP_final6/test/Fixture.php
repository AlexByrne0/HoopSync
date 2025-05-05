<?php
// Fixture.php

class Fixture {
    protected $homeTeam;
    protected $awayTeam;
    protected $gameDate;
    protected $gameTime;
    protected $venue;

    public function __construct($homeTeam, $awayTeam, $gameDate, $gameTime, $venue) {
        $this->homeTeam = $homeTeam;
        $this->awayTeam = $awayTeam;
        $this->gameDate = $gameDate;
        $this->gameTime = $gameTime;
        $this->venue = $venue;
    }

    public function displayBasicInfo() {
        return "{$this->homeTeam} vs {$this->awayTeam} on {$this->gameDate} at {$this->gameTime} in {$this->venue}";
    }
}
?>
