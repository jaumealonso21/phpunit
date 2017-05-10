<?php

use PHPUnit\Framework\TestCase;

require '../classes/Unicorns.php';

class UnicornsTest extends TestCase {

    public function test_can_steal() {
        // Setup
        $unicorns = new Unicorns;

        // Action
        $unicorns->steal(5);

        // Assert
        $this->assertEquals(3, $unicorns->getCount());
    }

    public function test_cant_steal() {
        // Setup
        $unicorns = new Unicorns;
        
        // Action
        $unicorns->steal(1000);
        
        // Assert
        $this->assertEquals(8, $unicorns->getCount());
    }

}
