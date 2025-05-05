<?php

use PHPUnit\Framework\TestCase;
require_once 'recentfixture_child.php';

class DisplayFullFixtureTest extends TestCase
{
    public function testDisplayFullFixture()
    {
        $recentFixture = new RecentFixture(
            "Team A",
            "Team B",
            "2025-04-27",
            "19:00",
            "Stadium",
            110,
            105,
            "images/home.png",
            "images/away.png"
        );

        $fixtureData = $recentFixture->displayFullFixture();

        $this->assertEquals("Team A", $fixtureData["homeTeam"]);
        $this->assertEquals("Team B", $fixtureData["awayTeam"]);
        $this->assertEquals(110, $fixtureData["homeScore"]);
        $this->assertEquals(105, $fixtureData["awayScore"]);
        $this->assertEquals("images/home.png", $fixtureData["homeLogo"]);
        $this->assertEquals("images/away.png", $fixtureData["awayLogo"]);
        $this->assertEquals("2025-04-27", $fixtureData["gameDate"]);
        $this->assertEquals("19:00", $fixtureData["gameTime"]);
        $this->assertEquals("Stadium", $fixtureData["venue"]);
    }
}
?>
