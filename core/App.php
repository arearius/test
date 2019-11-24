<?php

use common\Logger;

//Реестр для сохранения инстансов объектов
class App {
    //Объявление статической переменной доступной только в классе
    protected static $instance = array();//Хранилище классов
    public $logger;

    public function __construct()
    {
        //echo "<br>App constructor";
        $this->logger = new Logger();
    }

    //Функция получения класса
    static function get($name){
        //echo "<br>try get {$name}";
        if(self::$instance[$name]){
            //echo "<br>in if {$name}";
            return self::$instance[$name];
        }else{
            //echo "<br>out if {$name}";
            //Создание и сохранение объекта класса
            return self::add($name, new $name() );
        }
    }

    //Сохранение объекта класса в хранилище
    static function add($name,$val){
        //echo "<br>try add {$name}";
        return self::$instance[$name] = $val;
    }
}