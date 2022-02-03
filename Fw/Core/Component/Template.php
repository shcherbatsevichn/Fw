<?php

namespace Fw\Core\Component;

use Fw\Core\Page as Page;


class Template {

    public $__component; //параметры компонента 
    public $__path; //путь к файловой структуре шаблона 
    public $__relativePath; // url к файловой структуре шаблона 
    public $id; // строковый id шаблона 
    

    public function __construct( $idtemplate, $pathcomponent){
        $this->id = $idtemplate;
        $this->__path = $pathcomponent."/templates/".$idtemplate."/";
        $this->__relativePath = $this->getURL();
    }

    private function getURL(){
        $position = stripos($this->__path, "Fw");
        $patharray = str_split($this->__path);
        $url = "";
        foreach($patharray as $key => $value){
            if($key >= $position){
                $url .= $value;
            }
        }
        return $url;
    }

    public function render($page = "template"){
        $pagercomponent = Page::getInstance();

        if(file_exists($this->__path."result_modifier.php")){
            require $this->__path."result_modifier.php";
        }

        require $this->__path.$page.".php"; //подключаем нужную страницу

        if(file_exists($this->__path."component_epilog.php")){
            require $this->__path."component_epilog.php";
        }

        if(file_exists($this->__path."script.js")){
            $pagercomponent->addJs($this->__relativePath."script.js");
        }

        if(file_exists($this->__path."style.css")){
            $pagercomponent->addCss($this->__relativePath."style.css");
        }
    }
}