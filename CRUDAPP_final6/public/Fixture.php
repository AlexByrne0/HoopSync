<?php
//properties
class Fixture {
    protected $homeTeam;
    protected $awayTeam;
    protected $gameDate;
    protected $gameTime;
    protected $venue;
// Constructor
    public function __construct($homeTeam, $awayTeam, $gameDate, $gameTime, $venue) {
        $this->homeTeam = $homeTeam;
        $this->awayTeam = $awayTeam;
        $this->gameDate = $gameDate;
        $this->gameTime = $gameTime;
        $this->venue = $venue;
    }
// method to display 
    public function displayBasicInfo() {
        return "{$this->homeTeam} vs {$this->awayTeam} on {$this->gameDate} at {$this->gameTime} in {$this->venue}";
    }
}
?>
