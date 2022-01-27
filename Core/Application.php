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
    
    public function header(){           // подключаем хедер и стартуем буферизацию 
        $this->startBuffer();            //старт буферизации 
        require_once "templates/".$this->template."/header.php";
    }
    public function footer(){           //конец буферизации, замена макросов подмены, вывод буфера
        require_once "templates/".$this->template."/footer.php";
        $this->endBuffer();
        
    }
    private function startBuffer(){
        ob_start();
    }

    private function endBuffer(){        // замена макросов на значения 
        $content = ob_get_contents();
        $valuetoreplace = $this->pager->propsarray + $this->pager->jslinksarray + $this->pager->csslinksarray;
        $content = str_replace($this->pager->getAllReplace(), $this->pager->propsarray,  $content);      
        $this->restartBuffer(); // чистим буфер
        echo $content;      //отдаем готовый контент
        ob_end_flush(); 
    }
    private function restartBuffer(){     // сброс буфера
        ob_end_clean();     //отчищаем буфер
        ob_start();
    }
}
