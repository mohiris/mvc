<?php

namespace Core;
use Core\SliverEngine;
class Controller
{

    public function render($view, $data = []){

        $template = new SliverEngine();
        echo $template->renderView($view, $data);
    }

    public function model($model){

        include_once dirname(__DIR__).DIRECTORY_SEPARATOR."Models".DIRECTORY_SEPARATOR.$model.".php";
        
        return new $model();
    }

}