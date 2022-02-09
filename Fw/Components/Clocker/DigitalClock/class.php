<?php
namespace Fw\Components\Clocker\DigitalClock;

use Fw\Core\Component\Base;

class DigitalClock extends Base{
    
    public function __construct( $id, $templateid, $params ){
        $this->__path = __DIR__;
        $this->params += $params;
        parent::__construct($id, $templateid);
    }

    public function executeComponent(){  
        $this->result["deltaday"] =  $this->getDifferentTime($this->params["date"]);
        $this->template->render();
    }   

    protected function getLocalTime(){
        return localtime(time(), true);
    }

    public function getDifferentTime($startTime){
        $nowTime = $this->getLocalTime();
        $startdatearray = explode(".", $startTime);
        $yearscountday = 0;
        for($i = 1; $i < $startdatearray[1]; $i++){
            if($i % 2 != 0 && $i <= 7){ 
                $yearscountday += 31;
            }
            if($i == 2){
                $yearscountday += 28;
            }
            if($i % 2 == 0 && $i < 7 && $i != 2){ 
                $yearscountday += 30;
            }
            if($i % 2 != 0 && $i > 7){ 
                $yearscountday += 30;
            }
            if($i % 2 == 0 && $i > 7){ 
                $yearscountday += 31;
            }
        }
        $yearscountday += $startdatearray[0];
        $result = $nowTime["tm_yday"] + 2 - $yearscountday;
        return $result; 
    }

}