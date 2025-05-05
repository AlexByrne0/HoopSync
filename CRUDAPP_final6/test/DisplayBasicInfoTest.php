<?php

use PHPUnit\Framework\TestCase;
require_once 'Fixture.php';

class DisplayBasicInfoTest extends TestCase
{
    public function testDisplayBasicInfo()
    {
        $fixture = new Fixture("Team A", "Team B", "2025-04-27", "19:00", "Stadium");

        $expected = "Team A vs Team B on 2025-04-27 at 19:00 in Stadium";
        $this->assertEquals($expected, $fixture->displayBasicInfo());
    }
}
?>
