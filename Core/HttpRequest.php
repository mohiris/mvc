<?php


namespace Core;


class HttpRequest
{
    public function getPath(){
        $path = $_SERVER['REQUEST_URI'] ?? '/';
        $pos = stripos($path, '?');

        if($pos == false){
            return $path;
        }

        return substr($path, 0, $pos);
    }

    public function getParams(){

        $uri = $_SERVER['REQUEST_URI'];
        $parsedUri = parse_url($uri);
        $hasParams = parse_str($parsedUri['query'], $params) ?? false;

        if($hasParams == false){
            return [];
        }
        return $params;
    }

}