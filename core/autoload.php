<?php

function autoload($class_name) {

    //echo "<br>Autoload {$class_name}";
    $class_path_controllers = $_SERVER['DOCUMENT_ROOT'] . "/controller/" . $class_name;
    $class_path_models = $_SERVER['DOCUMENT_ROOT'] . "/model/" . $class_name;
    $class_path_common = $_SERVER['DOCUMENT_ROOT'] . "/common/" . $class_name;
    //echo "<br>Look for {$class_name}";
    if (file_exists($class_path_controllers . ".php")) {
        //echo "<br>File exist";
        include_once($class_path_controllers . ".php");
        //echo "<br>File included";
    } else if (file_exists($class_path_models . ".php")) {
        //echo "<br>File exist";
        include_once($class_path_models . ".php");
        //echo "<br>File included";
    } else if (file_exists($class_path_common . ".php")) {
        //echo "<br>File exist $class_path_common";
        include_once($class_path_common . ".php");
        //echo "<br>File included";
    }
    else {
        //Не найден контроллер
        echo "<br>ERROR, Controller not found {$class_name}";
        App::get('Controller')->error404();
        die();
    }
}

//Прописываем автозагрузку классов по необходимости
spl_autoload_register('autoload');