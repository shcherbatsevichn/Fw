<?php
namespace Fw\Core\Traits;

trait Singleton{
    private static $instance = null;

    private function __construct(){  //предотвращаем создание объекта через оператор new
    }
    private function __clone(){ //защита от клонирования
    }
    private function __wakeup(){ // защита от восстановления из строки
    }

    public static function getInstance() { 
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }
}