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
       // $pagercomponent = Page::getInstance(); //нет 
        $this->result[0] =  $this->deltatime->getSumm($this->params[0], $this->params[1]);
        //$pagercomponent->setProperty("result-cloker", $this->result[0]); //
        $this->template->__component = ["result" => $this->result, "param" => $this->params];
        $this->template->render();
    }   

    
    
}