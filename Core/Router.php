<?php


namespace Core;
use Core\Exception\RouteException;
use Core\HttpRequest;
use Core\Application;
class Router
{
    /**
     * @var array|mixed
     */
    private  $routes = [];
    private $controller;
    private $method;
    private $params = [];

    public function __construct(){
        $routesFile =  dirname(__DIR__) . "/routes.yml";
        $this->routes = yaml_parse_file($routesFile);
    }

    public function resolve($path){
        $route = $this->getRoute($path);

            $class = "Controller\\" . $route['controller'] . "Controller";
            $controller_file = dirname(__DIR__) . "/Controllers/" .$route['controller'] . "Controller.php";
            $method = $route['action'];

            if(file_exists($controller_file)){
                include $controller_file;

                $controller = new $class();

                if(method_exists($controller, $method)){
                    $controller->$method();
                }
            }


    }

    private function getRoute($path){

        if(!array_key_exists($path, $this->routes)){
            throw new RouteException("La route: $path n'existe pas");
        }
        return $this->routes[$path];
    }

    public function setController($controller){
        $this->controller = $controller;
    }

    public function setMethod($method){
        $this->method = $method;
    }

    public function setParams($params){
        $this->params = $params;
    }

    public function getController(){
        return $this->controller;
    }

    public function getMethod(){
        return $this->method;
    }

    public function getParams(){
        return $this->params;
    }

}