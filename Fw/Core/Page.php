<?php
namespace FW\Core;

class Page{

    private $propsarray = []; //массив для хранения
    private $jslinksarray = []; //контейнер для ссылок js
    private $anystring = []; // контейнер для str
    private $csslinksarray = []; // контейнер для ссылок css 
    private $prefix = "#FW_PAGE_"; // приставка всех макросов 

    use Traits\Singleton;  

    public function addJs(string $src){  //добавляет src в массив,сохряняя уникальность
        $jsname = md5($src); //имя ссылки в контейнере 
        $this->jslinksarray[$jsname] = $src;  //кладем в контейнер
    }
    public function addCss(string $link){ // Добавляет link в массив, сохряняя уникальность
        $cssname = md5($link); //имя ссылки в контейнере 
        $this->csslinksarray[$cssname] = $link; //кладем в контейнер 
    }
    public function addString(string $str){ //Добавляет в массив для хранения 
        $strname = md5($str);
        $this->anystring[$strname] = $str;
    }
    public function setProperty(string $id, $value){ // добавляет для хранения значения по ключу
        $this->propsarray[$this->prefix."PROPERTY_".$id."#"] = $value;
    }
    public function getProperty(string $id){  //Получение по ключу
        return $this->propsarray[$this->prefix."PROPERTY_".$id."#"];
    }
    public function showProperty(string $id){   // Выводит макрос для будующей замены #FW_PAGE_PROPERY_{$id}#
        if(isset($this->propsarray[$this->prefix."PROPERTY_".$id."#"])){ 
            echo ($this->prefix."PROPERTY_".$id."#");
        }
    }
    private function getJsTag(){ //собираем ссылки js из контейнера, для последующей замены
        $resultstring = "";
        foreach($this->jslinksarray as $key => $value){ //проходимся по всем ссылкам
            $resultstring .= "<script src=\"$value\"></script>\n";
        }
        return array($this->prefix."JS#" => $resultstring);
    }
    private function getCssTag(){ //собираем ссылки css из контейнера, для последующей замены
        $resultstring = "";
        foreach($this->csslinksarray as $key => $value){
            $resultstring .="<link href=\"$value\" rel=\"stylesheet\">\n";
        }
        return array($this->prefix."CSS#" => $resultstring);
    }
    private function getStringTag(){ //собираем строки из контейнера, для последующей замены
        $resultstring = "";
        foreach($this->anystring as $key => $value){
            $resultstring .= $value."\n";
        }
        return array($this->prefix."STR#" => $resultstring);
    }
    public function getAllReplace(){   // Получаем массив макросов для будующей замены
        return $this->propsarray + $this->getJsTag() + $this->getCssTag() + $this->getStringTag();
    }
    public function showHead(){   // выводит 3 макроса замены  js, css, str
        echo ($this->prefix."JS#\n");
        echo ($this->prefix."CSS#\n");
        echo ($this->prefix."STR#\n");
    }
}