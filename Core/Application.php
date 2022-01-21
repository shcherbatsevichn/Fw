<?php 
namespace Fw\Core;

class Application{

    private $__components = [];
    private $pager = null; 
    private static $instance = null;
    private $template = null;

    private function __construct(){  //предотвращаем создание объекта через оператор new
    }
    private function __clone(){ //защита от клонирования
    }
    private function __wakeup(){ // защита от восстановления из строки
    }

    public static function getInstance(): Application { 
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }
    
}