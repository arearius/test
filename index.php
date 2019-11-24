<?php
header('Content-Type: text/html; charset=utf-8');
ini_set('error_log', __DIR__ . '/php_errors_' . date("Ymd", time()) . '.log');
ini_set('log_errors', 1);
session_start();

include __DIR__ . '\init.php';


$data = explode('/' ,$_REQUEST['uri']);
$_REQUEST['controller'] = $data[1];
$_REQUEST['action'] = $data[2];


App::get('AppController')->setRequest($_REQUEST);
App::get('AppController')->page($_REQUEST['controller'], $_REQUEST['action'],$_REQUEST);


