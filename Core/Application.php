<?php 
namespace Fw\Core;

class Application{

    private $__components = [];
    private $pager = null; 
    private static $instance = null;
    private $template = null;

    protected function __construct(){  //предотвращаем создание объекта через оператор new
    }
    protected function __clone(){ //защита от клонирования
    }
    protected function __wakeup(){ // защита от восстановления из строки
    }

    public static function getInstance(): Application { 
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }
    
}