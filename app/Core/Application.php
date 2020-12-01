<?php
namespace Core;
use Core\Router;
use Core\Request;
use Core\Response;
use Core\DB;
class Application
{

    public function __construct(){

        //DATABASE Connection
        $db = new DB();

        //HTTP Handling & Routing
        $request = new \Core\Request();
        $response = new \Core\Response();

        $path = $request->getUrl();
        $params = $request->getParams();

        $router =  new Router();

        if(!empty($params)){
            $router->resolve($path, $params);
        }
        $router->resolve($path);
    }

}