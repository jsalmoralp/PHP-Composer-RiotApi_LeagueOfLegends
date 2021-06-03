<?php
namespace jsalmoralp\RiotAPI\Tests;

use jsalmoralp\RiotAPI\Tests\RiotAPI\Classes\ClassesTest;
use jsalmoralp\RiotAPI\Tests\RiotAPI\RiotAPITest;

class AllTests {
    public function run() : Bool {
        $classesTest = new ClassesTest();

        if (
            $classesTest->run()
        ) {
            return true;
        } else {
            return false;
        }
    }

    public function runDebug() : String {
        $response = "";
        $classesTest = new ClassesTest();

        $response .= $classesTest->runDebug();

        return $response;
    }
}