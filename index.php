<?php
include_once "Core/autoloader.php";
include_once "CONSTS.php";

$app = new \Core\Application(dirname(__DIR__));
$app->run();

