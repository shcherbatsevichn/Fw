<?php 
namespace Fw\Core;

class Config{

    public static function get($path){ 
        $patharray = explode("/", $path); //разбиваем строку на массив 
        require_once $_SERVER['DOCUMENT_ROOT']."/Fw/config.php"; //открываем документ config
        foreach($patharray as $kayv){      
            $errorflag = 1;     //комментарии к этому флагу внизу
            foreach($config as $kay => $value){
                if($kayv == $kay){  //ищем совподения ключей
                    if(is_array($config[$kay])){
                        $config = $config[$kay]; 
                        $errorflag = 0; 
                    }else{
                        $config = $config[$kay];
                        $errorflag = 0;
                    }
                }
            }
        }
        if($errorflag  == 1 ){
            return false;
        }
        if(!$config){
            return false;
        }else{
            return $config;
        }
    }
}



//флаг errorflag служит для защиты от неверно введенного пути. 
//Если $config = ["db" => ["login" =>... ], "login" => ...], то при использовании пути "dd/login"
//нам выдаст ошибку, вместо значения login ($config["login"]);