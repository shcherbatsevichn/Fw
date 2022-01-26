<?php
session_start();

define ("CORE_INIT", "true"); 

use Core\Application as Application; 
use Core\Config as Config;
use Core\Route as Route;

function autoload($class){              //функция автозагрузки
    $root =  __DIR__;
    $class = str_replace("\\", '/', $class);
    $file = $root."/{$class}.php";
    if(file_exists($file)){
        require_once $file;
    }
}

spl_autoload_register("autoload"); //автозагрузчик

$app = Application::getInstance(); //Инициализирован объект  Application
