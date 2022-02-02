<?php
namespace Fw\Components\Clocker\DigitalClock;

use Fw\Core\Component\Base;
use Fw\Core\Page as Page;

class DigitalClock extends Base{
    private $deltatime; 
    
    public function __construct( $id, $templateid, $params ){
        $this->deltatime = new Calculator;
        $this->__path = __DIR__;
        $this->params = $params;
        parent::__construct($id, $templateid);
    }

    public function executeComponent(){  
       // $pagercomponent = Page::getInstance(); //нет 
        $this->result[0] =  $this->deltatime->getDifferentTime("18.01.2022");
        //$pagercomponent->setProperty("result-cloker", $this->result[0]); //
        $this->template->__component = ["result" => $this->result, "param" => $this->params];
        $this->template->render();
    }   

    
    
}