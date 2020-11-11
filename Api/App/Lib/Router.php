<?php


namespace App\Lib;



class Router
{
    public static function get($route, $callback)
    {
        if(strcasecmp($_SERVER['REQUEST_METHOD'], 'GET') !== 0){
            return;
        }
        return self::on($route, $callback);
    }

    public static function post($route, $callback)
    {
        if(strcasecmp($_SERVER['REQUEST_METHOD'], 'POST') !== 0){
            return;
        }
        return self::on($route, $callback);
    }

    public static function delete($route, $callback)
    {
        if(strcasecmp($_SERVER['REQUEST_METHOD'], 'DELETE') !== 0){
            return;
        }
        return self::on($route, $callback);
    }

    public static function put($route, $callback)
    {
        if(strcasecmp($_SERVER['REQUEST_METHOD'], 'PUT') !== 0){
            return;
        }
        return self::on($route, $callback);
    }


    public function on($regex, $cb)
    {
        $url = $_SERVER['REQUEST_URI'];
        $uri = preg_replace('/\?(.*)/', '', $url);
        $regex = str_replace('/', '\/', $regex);
        $is_match = preg_match('/^' . ($regex) . '$/', $uri, $matches, PREG_OFFSET_CAPTURE);
        if($is_match){
            array_shift($matches);
            $params = array_map(function ($param){
                return $param[0];
            }, $matches);
            $parameters = preg_replace('/(.*)\?/', '', $url);
            $cb(new Request($params, $parameters), new Response());
        }
    }
}