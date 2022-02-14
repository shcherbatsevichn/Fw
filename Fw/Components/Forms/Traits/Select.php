<?php
namespace Fw\Components\Forms\Traits;

trait Select{

    private function getOption(){ //получаем теги option 
        $resultoption ='';
        foreach($this->params['list'] as $value){
            if(isset($value['selected']) && $value['selected'] == true){
                $resultoption .= ("<option selected value=\"".$value['value']."\" class = \"".$value['additional_class']."\" id=\"".$value['attr']['data-id']."\">".$value['title']."</option>");
                   
            }else{
                $resultoption .= ("<option value=\"".$value['value']."\" class = \"".$value['additional_class']."\" id=\"".$value['attr']['data-id']."\">".$value['title']."</option>");
            }
       }
       return $resultoption;
    }
    
}