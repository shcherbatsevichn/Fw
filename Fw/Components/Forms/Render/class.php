<?php

use Fw\Core\Application;
use Fw\Core\Component\Base;

include "map.php";

class RenderForm extends Base{

    private $__includeElements;
    private $configs;
    private $app;

    public function __construct($id, $templateid, $params)
    {
        $this->__path = __DIR__;
        $this->__includeElements = $params['elements'];
        $this->params = $params;
        $this->configs = $this->readMap();
        $this->app = Application::getInstance();
        parent::__construct($id, $templateid);
        
    }

    private function readMap(){
        include "map.php";
        return $componentsmap;
    }
    public function executeComponent()
    {
       ob_start();
        foreach($this->__includeElements as $key =>$value){
            $includeElement = $value["type"];
            $this->app->includeComponent($this->configs[$includeElement],$this->template->id, $this->__includeElements[$key]);
        }
        $this->result["renderedinputs"] = ob_get_contents();
        ob_clean();
        $this->template->render();
        ob_end_flush();
    }
}