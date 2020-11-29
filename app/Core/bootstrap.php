<?php
include_once "autoloader.php";

$db_config_file = include_once dirname(__DIR__).DIRECTORY_SEPARATOR ."config" .DIRECTORY_SEPARATOR."database.yml";
$db_config = yaml_parse_file($db_config_file );

$app = new \Core\Application();
$app->connect($db_config);