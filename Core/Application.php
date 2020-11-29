<?php
namespace Core;
use Core\Router;
use Core\HttpRequest;
class Application
{
    public static $ROOT_DIR;

    public function __constructor($rootDir){
        self::$ROOT_DIR = $rootDir;
    }

    public function run(){

        $request = new HttpRequest();
        $path = $request->getPath();

        $router =  new Router();
        $router->resolve($path);
    }
}