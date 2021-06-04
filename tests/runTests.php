<?php
include_once __DIR__ . "/../vendor/autoload.php";

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . "/../../");
$dotenv->load();

use jsalmoralp\RiotAPI\Tests\AllTests;

$allTests = new AllTests();

if ($allTests->run()) {
    echo "Todo va bien!!";
} else {
    echo $allTests->runDebug();
}
