<?php
namespace Fw\Components\Calculator\CalcSumm;

use Fw\Core\Component\Base;

class CalcAdd extends Base{
    
    public function __construct( $id, $templateid, $params ){
        $this->__path = __DIR__;
        $this->params = $params;
        parent::__construct($id, $templateid);
    }

    public function executeComponent(){   
        $this->result["summ"] =  $this->getSumm($this->params["a"], $this->params["b"]);
        $this->template->render();
    }   

    public function getSumm($a, $b){
        return $a + $b; 
        }
    
}