<?php
namespace Fw\Components\Clocker\DigitalClock;

use Fw\Core\Component\Base;
use Fw\Core\Page as Page;

class DigitalClock extends Base{
    private $deltatime; 
    
    public function __construct( $id, $templateid, $params ){
        $this->deltatime = new Calculator;
        $this->__path = __DIR__;
        $this->params += $params;
        parent::__construct($id, $templateid);
    }

    public function executeComponent(){  
        $this->result["deltaday"] =  $this->deltatime->getDifferentTime($this->params["date"]);
        $this->template->__component = ["result" => $this->result, "params" => $this->params];
        $this->template->render();
    }   
}