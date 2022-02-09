<?php

namespace Fw\Core\Component;

use Fw\Core\Page as Page;


class Template {

    public $__component; //параметры компонента 
    public $__path; //путь к файловой структуре шаблона 
    public $__relativePath; // url к файловой структуре шаблона 
    public $id; // строковый id шаблона 
    

    public function __construct( $idtemplate, $componentobj){
        $this->__component = $componentobj;
        $this->id = $idtemplate;
        $this->__path = $this->__component->__path."/templates/".$idtemplate."/";
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
        $params = $this->__component->params;
        $result = $this->__component->result;

        $pagercomponent = Page::getInstance();

        if(file_exists($this->__path."result_modifier.php")){
            include $this->__path."result_modifier.php";
        }

        if(file_exists($this->__path.$page.".php")){
            include $this->__path.$page.".php";
        }

        if(file_exists($this->__path."component_epilog.php")){
            include $this->__path."component_epilog.php";
        }

        if(file_exists($this->__path."script.js")){
            $pagercomponent->addJs($this->__relativePath."script.js");
        }

        if(file_exists($this->__path."style.css")){
            $pagercomponent->addCss($this->__relativePath."style.css");
        }
    }
}