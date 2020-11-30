<?php
namespace Core;
use Core\Router;
use Core\Request;
use Core\DB;
class Application
{

    public function __construct(){

        $request = new \Core\Request();
        $path = $request->getUrl();
        $params = $request->getParams();

        $router =  new Router();

        if(!empty($params)){
            $router->resolve($path, $params);
        }
        $router->resolve($path);
    }

    public function dbConnect($config){
        $db = new DB();
        $db->connect($config);
     
    }

}