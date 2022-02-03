<?php
namespace Fw\Components\Calculator\CalcSumm;

use Fw\Core\Component\Base;

class CalcAdd extends Base{
    private $deltatime; 
    
    public function __construct( $id, $templateid, $params ){
        $this->deltatime = new Calc;
        $this->__path = __DIR__;
        $this->params = $params;
        parent::__construct($id, $templateid);
    }

    public function executeComponent(){   
        $this->result["summ"] =  $this->deltatime->getSumm($this->params["a"], $this->params["b"]);
        $this->template->__component = ["result" => $this->result, "param" => $this->params];
        $this->template->render();
    }   

    
    
}