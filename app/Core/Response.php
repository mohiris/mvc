<?php
namespace Core;

class Response {

    private $code;

    public function __constructor(){

    }

    public function setStatusCode(int $code){
        \http_response_code($code);
        $this->code = $code;
    }

    public function getStatusCode(){
        return $this->code;
    }
}