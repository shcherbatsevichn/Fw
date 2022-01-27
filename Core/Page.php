<?php
namespace FW\Core;

class Page{

    public $propsarray = []; //массив для хранения
    public $jslinksarray = [];
    public $csslinksarray = [];

    use Traits\Singleton;  

    public function addJs(string $src){  //добавляет src в массив,сохряняя уникальность
        $jsname = '#FW_JS_LINK_'.md5($src); // за ключ (id) берем хеш str
        $this->jslinksarray[$jsname] = $src;  //записываемв массив
    }
    public function addCss(string $link){ // Добавляет link в массив, сохряняя уникальность
        $cssname = "#FW_CSS_LINK_".md5($link);
        $this->csslinksarray[$cssname] = $link;
    }
    public function addString(string $str){ //Добавляет в массив для хранения 
        $this->propsarray["#FW_PAGE_PROPERTY_anytag#"] = $str;
    }
    public function setProperty(string $id, $value){ // добавляет для хранения значения по ключу
        $this->propsarray["#FW_PAGE_PROPERTY_".$id."#"] = $value;
    }
    public function getProperty(string $id){  //Получение по ключу
        return $this->propsarray["#FW_PAGE_PROPERTY_".$id."#"];
    }
    public function showProperty(string $id){   // Выводит макрос для будующей замены #FW_PAGE_PROPERY_{$id}#
        if(isset($this->propsarray["#FW_PAGE_PROPERTY_".$id."#"])){ 
            echo ("#FW_PAGE_PROPERTY_".$id."#");
        }
    }
    public function getAllReplace(){   // Получаем массив макросов для будующей замены
        return array_keys($this->propsarray) + array_keys($this->jslinksarray) + array_keys($this->csslinksarray);
    }
    public function showHead(){   // выводит 3 макроса замены  js, css, str
        foreach($this->jslinksarray as $key => $value){
            echo "<script src =".$key."></script>\n";
        }
        foreach($this->csslinksarray as $key => $value){
            echo "<script src =".$key."></script>\n";
        }
        foreach($this->jslinksarray as $key => $value){
            echo "<link rel=\"stylesheet\" href =".$key.">\n";
        }
        if(isset($this->propsarray["#FW_PAGE_PROPERTY_anytag"])){
            echo "#FW_PAGE_PROPERTY_anytag\n";
        }
    }
}