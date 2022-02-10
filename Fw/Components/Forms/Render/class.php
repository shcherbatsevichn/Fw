<?php

use Fw\Core\Component\Base;

class RenderForm extends Base{

    private $__includeElements;
    private $configs;

    public function __construct($id, $templateid, $params)
    {
        $this->__path = __DIR__;
        $this->__includeElements = $params['elements'];
        $this->params = $params;
        $this->configs = Fw\Core\Config::get('inputTypes');
        parent::__construct($id, $templateid);
    }
    public function executeComponent()
    {
        ob_start();
        foreach($this->__includeElements as $key =>$value){
            $includeElement = $value["type"];
            include_once ($this->configs[$includeElement]['path']);
            $inputcompomemt = new $this->configs[$includeElement]['classname']($this->configs[$includeElement]['id'], $this->configs[$includeElement]['template'], $this->__includeElements[$key]);
            $inputcompomemt->executeComponent();
        }
        $this->result["renderedinputs"] = ob_get_contents();
        $this->template->render();
        ob_end_flush();
    }
}