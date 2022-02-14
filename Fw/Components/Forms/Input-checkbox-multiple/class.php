<?php

use Fw\Core\Application;
use Fw\Core\Component\Base;

class InputCheckboxMultiple extends Base{

    private $config = "Fw\Components\Forms:Input-checkbox";
    private $app;

    public function __construct($id, $templateid, $params)
    {   
        $this->app = Application::getInstance();
        $this->__path = __DIR__;
        $this->params += $params;
        parent::__construct($id, $templateid);
    }
    public function executeComponent()
    {
        ob_start();
        foreach($this->params["list"] as $key => $value){  //рендерим чекбоксы
            $this->params['name'] .= "[$key]";
            $value['name'] = $this->params['name'];
            $this->app->includeComponent($this->config,$this->template->id, $value);
        }
        $this->result["renderedtext"] = ob_get_contents();
        ob_clean();
        $this->template->render();
        ob_end_flush();
    }
}