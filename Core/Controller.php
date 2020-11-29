<?php

namespace Core;
use Core\Router;
use Core\Template;
class Controller
{
    private $model;
    private $controller;

    public function render($view, $data = []){

        $template = new Template();
        echo $template->renderView($view, $data);
    }


    public function model($model){

    }


}