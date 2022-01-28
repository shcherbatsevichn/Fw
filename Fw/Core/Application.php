<?php
namespace Fw\Core;

class Application{

    private $__components = [];
    public $pager; 
    private $template;
    
    private function __construct()
    {
        $this->pager = Page::getInstance();
        $this->template = Config::get('templates');
    }
    
    use Traits\Singleton; 

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
}
