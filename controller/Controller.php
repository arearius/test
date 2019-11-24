<?php
/**
 * Created by PhpStorm.
 * User: Rearius
 * Date: 05.10.2018
 * Time: 23:03
 */

class Controller
{
    private static $title = '';
    private static $request = null;

    protected function view($name, $args = null, $isBase = 0)
    {
        //echo "<br>view on Controller";
        ob_start();
        if ($isBase) {
            $tpl = $_SERVER['DOCUMENT_ROOT'] . "/views/base/{$name}.php";
        } else {
            //Название вызывающего класса

            $class = mb_substr( get_class($this), 0, -10);
            echo "<br> Look for " . $_SERVER['DOCUMENT_ROOT'] . "/views/{$class}/{$name}.php";
            $tpl = $_SERVER['DOCUMENT_ROOT'] . "/views/{$class}/{$name}.php";
        }
        if (file_exists($tpl)) {
            echo "<br> Template found";
            if ($args) {
                //Распаковка переданных в шаблонизатор переменных, в область видимости шаблона
                extract($args);
            }
            //echo "<br>tpl: $tpl <br>";
            //print_r ($args);
            include $tpl;
        } else {
            echo "<br>not found tpl {$class}/{$name}";
        }
        return ob_get_clean();
    }


    protected function getTitle(){
        if(!self::$title){
            //В конфиге прописан базовый
            return title;
        }
        return self::$title;
    }
    protected function setTitle($title){
        self::$title = $title;
    }

    //Сохранение исходного вида запроса к приложению
    public function setRequest($param){
        //echo "<br>start of set request";
        self::$request = $param;
        //echo "<br>End of set request";
    }
    
    public function getRequest(){
        return self::$request;
    }
}