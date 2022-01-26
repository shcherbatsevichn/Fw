<?php
namespace Core;

require_once __DIR__."/Traits/Singleton.php";

class Page{

    private $propsarray = []; //массив для хранения
    private $jslinksarray = [];
    private $csslinksarray = [];

    use Traits\Singleton; 

    public function addJs(string $src){  //добавляет src в массив,сохряняя уникальность
        $splitsrcarray = explode('/', $src); // разделяем строку по слешу
        $jsname = '#FW_JS_LINK_'.$splitsrcarray[count($splitsrcarray)-3]."_".$splitsrcarray[count($splitsrcarray)-1]; // за ключ (id) берем название шаблона и имя файла (последняя строка)
        $this->jslinksarray[$jsname] = $src;  //записываемв массив
        return  $this->jslinksarray;
    }
    public function addCss(string $link){ // Добавляет link в массив, сохряняя уникальность
        $splitsrcarray = explode('/', $link);
        $cssname = "#FW_CSS_LINK_".$splitsrcarray[count($splitsrcarray)-3]."_".$splitsrcarray[count($splitsrcarray)-1];
        $this->csslinksarray[$cssname] = $link;
        return  $this->csslinksarray;
    }
    public function addString(string $str){ //Добавляет в массив для хранения 
        $this->propsarray["#FW_PAGE_PROPERTY_byaddString"] = $str;
        return $this->propsarray;
    }
    public function setProperty(string $id, $value){ // добавляет для хранения значения по ключу
        $this->propsarray["#FW_PAGE_PROPERTY_".$id] = $value;
        return $this->propsarray;
    }
    public function getProperty(string $id){  //Получение по ключу
        return $this->propsarray[$id];
    }
    public function showProperty(string $id){   // Выводит макрос для будующей замены #FW_PAGE_PROPERY_{$id}#
        if(isset($this->propsarray["#FW_PAGE_PROPERTY_".$id])){ 
            return $this->propsarray["#FW_PAGE_PROPERTY_".$id];
        }
    }
    public function getAllReplace(){   // Получаем массив макросов для будующей замены
        return $this->propsarray + $this->jslinksarray + $this->csslinksarray;
    }
    public function showHead(){   // выводит 3 макроса замены  js, css, str
        return $this->jslinksarray + $this->csslinksarray + $this->propsarray["#FW_PAGE_PROPERTY_byaddString"];
    }
}