<?php

namespace Controller;
use Core\Controller;

class HomeController extends Controller
{
    public function index(){
        $this->render('home.php');
    }

    public function list(){
        $eleve = [
            'Antoine',
            'Calvine',
            'Christian',
            'Kelig',
            'Antoine'
        ];
        $this->render('list.php', ['eleves' => $eleve]);
    }
}