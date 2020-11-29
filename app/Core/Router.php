<?php
namespace Core;
use Core\Exception\Exception;
use Core\Request;
use Core\Application;
class Router
{
    /**
     * @var array|mixed
     */
    protected  $routes = [];
    protected $controller = "DefaultController";
    protected $method = "index";
    protected $params = [];

    public function __construct(){

        $routesFile =  dirname(__DIR__) . "/config/routes.yml";
        $this->routes = yaml_parse_file($routesFile);

    }

    public function resolve($path, $params = []){

            $route = $this->getRoute($path);

            $class = "Controller\\" . $route['controller'];
          
            $controller_file = dirname(__DIR__) . DIRECTORY_SEPARATOR ."Controllers" . DIRECTORY_SEPARATOR .$route['controller'] . ".php";
       
            $method = $route['method'];

           
            if(file_exists($controller_file)){
              
                include $controller_file;

                $controller = new $class();

                $controller->$method();die;

                if(method_exists($controller, $method)){
                    $controller->$method();
                }
            }


    }

    public function getRoute($path){

        if(array_key_exists($path, $this->routes)){
            return $this->routes[$path];
        }

        return null;
    }

    public function getPath($controller, $method = ""){

        if(!empty($method)){
            $path = "/" . strtolower(str_replace("Controller", "",$controller)) . "/" . strtolower($method);
        }else{
            $path = "/" . strtolower(str_replace("Controller", "",$controller));
        }

        if($path === "/default" || $path === "/home"){
            $path = "/";
        }

        if(array_key_exists($path, $this->routes)){
            return $path;
        }

    }

}