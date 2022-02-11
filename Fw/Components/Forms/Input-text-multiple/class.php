<?php

use Fw\Core\Application;
use Fw\Core\Component\Base;

class InputTextMultiple extends Base{

    private $config = "Fw\Components\Forms:Input-text";
    private $app;
    private $_addlist;

    public function __construct($id, $templateid, $params)
    {   
        $this->app = Application::getInstance();
        $this->__path = __DIR__;
        $this->params += $params;
        $this->__addlist = $params['list'];
        parent::__construct($id, $templateid);
    }
    public function executeComponent()
    {
        //$this->params['name'] .= "[0]";
        ob_start();
        foreach($this->__addlist as $key => $value){

            $this->app->includeComponent($this->config,$this->template->id, $this->params);  
        }
        $this->result["renderedtext"] = ob_get_contents();
        ob_clean();
        $this->template->render();
        ob_end_flush();
    }
}