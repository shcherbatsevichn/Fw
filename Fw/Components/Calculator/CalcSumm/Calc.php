<?php
namespace Fw\Components\Calculator\CalcSumm;

class Calc{  //логика вычисеней компонента вынесена в отдельный класс

    protected function getLocalTime(){
        return localtime(time(), true);
    }

    public function getSumm($a, $b){
    return $a + $b; 
    }
}