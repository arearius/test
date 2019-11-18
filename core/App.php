<?php

namespace core;

use \controllers;

class App 
{

    public static function start()
    {
        echo 'start done';

        if ($_SERVER['REQUEST_URI'] == '/') {
            echo ' showing default page ' ;
            $view = new View();
            $view->show('defaultView');  
        } else {
            echo '<pre>';
            $params = explode('/', $_SERVER['REQUEST_URI']);
            print_r($params);
            $controller = $params[1] . "Controller";
            $action = $params[2];
            
            echo $controller;

            $controller = "\controllers\defaut";

            $controller::$action();
            
            echo '</pre>';
        }

    }

}