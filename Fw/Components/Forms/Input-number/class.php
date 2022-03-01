<?php

use Fw\Core\Component\Base;

class InputNumber extends Base{
    public function __construct($id, $templateid, $params)
    {
        $this->__path = __DIR__;
        $this->params += $params;
        parent::__construct($id, $templateid);
    }
    public function executeComponent()
    {
        $this->template->render();
    }
}