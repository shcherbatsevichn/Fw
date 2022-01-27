<?php
session_start();

define ("CORE_INIT", "true"); 

use Fw\Core\Application as Application; 
use Fw\Core\Config as Config;
use Fw\Core\Route as Route;
use Fw\Core\Page as Page;

function autoload($class){ //функция автозагрузки
    $root = $_SERVER['DOCUMENT_ROOT'];
    $class = str_replace("\\", '/', $class);
    $file = $root."/{$class}.php";
    if(file_exists($file)){
        require_once $file;
    }
}

spl_autoload_register("autoload"); //автозагрузчик

$app = Application::getInstance(); //Инициализирован объект  Application
