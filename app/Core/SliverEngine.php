<?php
namespace Core;

class SliverEngine
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