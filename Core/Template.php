<?php


namespace Core;
use Core\Application;
class Template
{

    public function renderView($view, $data = []){
        ob_start();
        if(!empty($data)){
            extract($data);
        }
        include dirname(__DIR__). "/Views/".$view;
        return ob_get_clean();

    }
}