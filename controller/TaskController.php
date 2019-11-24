<?php

class TaskController extends Controller
{

    private $logger;

    function __construct(){
        $this->logger = new Logger();
        //echo "<br>APP Controller constructor";
        $this->model = App::get('Task');
        $this->logger->log('TaskController construct done');
    }

    function page($controller,$action,$param){
        //echo "<br>Task Controller page method start";
        //По умолчанию главный контроллер (индексная страница)
        if(!$controller){
            $controller = 'Task';
        }
        // И метод default (по умолчанию)
        if(!$action){
            $action = 'default';
        }

        $method_name = $action . "Action" ;
        $controller_name = $controller . "Controller";
        //echo "<br>Task Controller page method";
        if(method_exists(App::get($controller_name), $method_name)){
            //echo "<br> Method from url exist";
            //Создаётся центральная часть
            ob_start();
            //echo "<br> get method from url";
            App::get($controller_name)->{$method_name}($param);
            $html = ob_get_clean();
            //echo "<br>html:";
            echo $html;
            /*//Выводится вся страница
            echo $this->view('default',array(
                'html' => $html,
                'title' => $this->getTitle()
            ), 0);*/

        }else{
            //Перебрасываем пользователя на страницу 404
            //echo "<br>Look for {$controller_name} controller and {$method_name} method failed";
            $this->error404();
        }

    }

    function widget_menu(){

        //echo "<br>menu<br>";
        //return;
        //Достаём запрос, чтобы определит, где в меню мы находимся
        $request = $this->getRequest();

        echo "<br>showing menu<br>";
        //print_r($request);

        //Из модели получаем структуру меню, с отмеченными пунктами, где мы
        //$menu = $this->model->getMenu($request['controller'],$request['action']);
        //Строим меню и возвращаем
        /*return $this->view('menu',[
            'list'=>$menu
        ]);*/
    }

    function defaultAction($param){
        $this->setTitle("Title for default action default controller");
        //echo '<br>default action';
        echo $this->view('main',array(
            'html' => $html,
            'title' => $this->getTitle()
        ), 0);
    }

    function error404(){
        echo "Error 404";
    }

}