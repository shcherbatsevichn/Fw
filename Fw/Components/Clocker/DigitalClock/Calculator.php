<?php
namespace Fw\Components\Clocker\DigitalClock;

class Calculator{  //логика вычисеней компонента вынесена в отдельный класс

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