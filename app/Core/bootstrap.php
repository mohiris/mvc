<?php
include_once "autoloader.php";

$routes_config_file = include_once dirname(__DIR__).DIRECTORY_SEPARATOR ."config" .DIRECTORY_SEPARATOR."routes.yml";
$routes_config = yaml_parse_file($db_config_file );

$app = new \Core\Application();

$app->useRouter($routes_config);
