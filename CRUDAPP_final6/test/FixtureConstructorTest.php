<?php

use PHPUnit\Framework\TestCase;
require_once 'Fixture.php';

class FixtureConstructorTest extends TestCase
{
    public function testFixtureConstructor()
    {
        $fixture = new Fixture("Team A", "Team B", "2025-04-27", "19:00", "Stadium");

        $this->assertEquals("Team A", $this->getProtectedProperty($fixture, 'homeTeam'));
        $this->assertEquals("Team B", $this->getProtectedProperty($fixture, 'awayTeam'));
        $this->assertEquals("2025-04-27", $this->getProtectedProperty($fixture, 'gameDate'));
        $this->assertEquals("19:00", $this->getProtectedProperty($fixture, 'gameTime'));
        $this->assertEquals("Stadium", $this->getProtectedProperty($fixture, 'venue'));
    }
// This helper uses reflection 
// which is a way to inspect or manipulate classes, methods, and properties at runtime 
// even if they’re protected or private.
    private function getProtectedProperty($object, $propertyName)
    {
        $reflection = new ReflectionClass($object);
        $property = $reflection->getProperty($propertyName);
        $property->setAccessible(true);
        return $property->getValue($object);
    }
}
?>
