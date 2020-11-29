<?php

namespace Core;
use Core\SliverEngine;
class Controller
{

    public function render($view, $data = []){

        $template = new SliverEngine();
        echo $template->renderView($view, $data);
    }

}