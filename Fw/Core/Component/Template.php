<?php

namespace Fw\Core\Component;

use Fw\Core\Page as Page;


class Template {

    public $__component;
    public $__path; //путь к файловой структуре шаблона 
    public $__relativePath; // url к файловой структуре шаблона 
    public $id; // строковый id компонента 
    public $idtemplate; // id шаблона 

    public function __construct($id, $idtemplate, $pathcomponent){
        $this->idtemplate = $idtemplate;
        $this->id = $id;
        $this->__path = $pathcomponent."/templates/".$idtemplate."/";
        $this->__relativePath = $this->getURL();
        //$this->__component
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

    public function render(string $page = "template"){
        var_dump($this->__component);
        $pagercomponent = Page::getInstance();
        if(file_exists($this->__path."result_modifier.php")){
            require_once $this->__path."result_modifier.php";
        }
        require_once $this->__path."template.php";

        if(file_exists($this->__path."component_epilog.php")){
            require_once $this->__path."component_epilog.php";
        }
        if(file_exists($this->__path."script.js")){
            $pagercomponent->addJs($this->__relativePath."script.js");
        }
        if(file_exists($this->__path."style.css")){
            $pagercomponent->addCss($this->__relativePath."style.css");
        }
    }
}