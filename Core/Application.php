<?php
namespace Core;

require_once __DIR__."/Traits/Singleton.php";
require_once __DIR__."/Page.php";

class Application{

    private $__components = [];
    public $pager; 
    private $template = null;
    
    private function __construct()
    {
        $this->pager = Page::getInstance();
    }

    use Traits\Singleton; 
    
    public function header(){           // подключаем хедер и стартуем буферизацию 
        $this->startBuffer();            //старт буферизации 
        require_once "templates/defoult_template/header.php";
    }
    public function footer(){           //конец буферизации, замена макросов подмены, вывод буфера
        require_once "templates/defoult_template/footer.php";
        $this->endBuffer();
        $this->restartBuffer(); 
    }
    public function startBuffer(){
        ob_start();
    }

    public function endBuffer(){        // замена макросов на значения 
        $content = ob_get_contents();
        ob_clean();     // чистим буфер 
        foreach($this->pager->getAllReplace() as $kay => $value){  //подменяем макросы значениями
            $content = preg_replace('/'.$kay.'#/i', $value, $content);   
        }
        echo $content;      //отдаем готовый контент
        return $content;
    }
    public function restartBuffer(){     // сброс буфера
        ob_end_flush();     //отправляем и отчищаем
    }
}
