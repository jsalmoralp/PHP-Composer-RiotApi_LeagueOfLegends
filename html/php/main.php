<?php
include_once __DIR__ . "/../../vendor/autoload.php";

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . "/../../");
$dotenv->load();

/* $archivoActual = $_SERVER['PHP_SELF'];
header("refresh:5;url=" . $archivoActual); */
