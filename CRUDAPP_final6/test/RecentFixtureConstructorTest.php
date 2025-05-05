<?php

use PHPUnit\Framework\TestCase;
require_once 'recentfixture_child.php';

class RecentFixtureConstructorTest extends TestCase
{
    public function testRecentFixtureConstructor()
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

        $this->assertEquals(110, $this->getPrivateProperty($recentFixture, 'homeScore'));
        $this->assertEquals(105, $this->getPrivateProperty($recentFixture, 'awayScore'));
        $this->assertEquals("images/home.png", $this->getPrivateProperty($recentFixture, 'homeLogo'));
        $this->assertEquals("images/away.png", $this->getPrivateProperty($recentFixture, 'awayLogo'));
    }
// This helper uses reflection 
// which is a way to inspect or manipulate classes, methods, and private at runtime 
// even if they’re  private.
    private function getPrivateProperty($object, $propertyName)
    {
        $reflection = new ReflectionClass($object);
        $property = $reflection->getProperty($propertyName);
        $property->setAccessible(true);
        return $property->getValue($object);
    }
}


?>
