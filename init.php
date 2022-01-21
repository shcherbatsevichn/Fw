<?php
session_start();

use Fw\Core\Application; 
use Fw\Core\Config;
use Fw\Core\Route;

function autoload($class){ //функция автозагрузки
    $root = $_SERVER['DOCUMENT_ROOT'];
    $class = str_replace("\\", '/', $class);
    $file = $root."/{$class}.php";
    if(file_exists($file)){
        require_once $file;
    }
}

spl_autoload_register("autoload"); //автозагрузчик


echo(Config::get("db/login")."<br>"); 
echo(Config::get("db/psw")."<br>"); 