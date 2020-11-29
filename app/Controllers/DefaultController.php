<?php
namespace Controller;
use Core\Controller;

class DefaultController extends Controller {

	public function index(){
		$this->render('home.php');
	}

}