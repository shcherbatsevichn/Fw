<?php 
namespace Fw\Core;

class Config{
    private static $allconfigs = null; 
    
    private static function init(){ // загрузка данных файла config.php 
        require_once $_SERVER['DOCUMENT_ROOT']."/Fw/config.php"; //открываем документ config
        self::$allconfigs = $config; 
    }

    public static function get($path){ 
        if(self::$allconfigs === null){
            self::init();
        }
        $config = self::$allconfigs; //записываем в переменную, чтобы можно было дальше измнять информацию без потери данных
        $patharray = explode("/", $path); //разбиваем строку на массив 
        foreach($patharray as $key){ 
           if(isset($config[$key])){
            $config = $config[$key];
           }
        }
        return $config;
    }
}
