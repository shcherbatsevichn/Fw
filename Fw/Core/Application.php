<?php
namespace Fw\Core;

class Application{

    private $__components = [];
    public $pager; 
    private $template;
    private $serverinfo;
    private $requestinfo;
    
    private function __construct()
    {
        $this->pager = Page::getInstance();
        $this->template = Config::get('templates');
        $this->serverinfo = new Server;
        $this->requestinfo = new Request;
    }
    
    use Traits\Singleton; 

    public function getServer(){
        return $this->serverinfo; 
    }

    public function getRequest(){
        return $this->requestinfo; 
    }

    public function getPager(){
        return $this->pager; 
    }
    
    public function header(){           // подключаем хедер и стартуем буферизацию 
        $this->startBuffer();            //старт буферизации 
        require_once "Fw/templates/".$this->template."/header.php";
    }
    public function footer(){           //конец буферизации, замена макросов подмены, вывод буфера
        require_once "Fw/templates/".$this->template."/footer.php";
        $this->endBuffer();
        
    }
    private function startBuffer(){
        ob_start();
    }

    private function endBuffer(){        // замена макросов на значения 
        $content = ob_get_contents();
        $content = str_replace(array_keys($this->pager->getAllReplace()), $this->pager->getAllReplace(),  $content);      
        ob_clean(); // чистим буфер
        echo $content;      //отдаем готовый контент
        ob_end_flush(); 
    }

    public function restartBuffer(){     // сброс буфера
        ob_end_clean();     //отчищаем буфер
        ob_start();
    }

    public function includeComponent(string $component, string $template, array $params){ // подключение компонента  
        $componentinformation = explode(":", $component); // парсим 
        $namespace = $componentinformation[0]; //отделяем неймспейс 
        $id = $componentinformation[1]; //отделяем id
        $docpath = $namespace."\\".$id."\\class"; // для упрощения внешнего вида собираем в переменную 
        $file = ($_SERVER['DOCUMENT_ROOT']."/".str_replace("\\", "/", $docpath).".php");
        $componentbefore = get_declared_classes(); //получаем список классов до подключения
        echo "<br>";
        if(file_exists($file)){ 
            include_once ($file);  //если файл существует - подключаем его
        }
        $componentafter = get_declared_classes(); //получаем список классов после подключения
        if(array_diff( $componentafter, $componentbefore) != []){
            $this->__components = array_diff( $componentafter, $componentbefore); //находим различия
        }
        foreach($this->__components as $name){
            if(stripos($name, $id)){  //находим класс, который содержит id компонента 
                $classname = $name;
            }
        }
       
        $component = new $classname($id, $template, $params); //создаем экземпляр этого класса
        $component->executeComponent(); // выполняем компонент 
        $component = 0;
    }
         
}
