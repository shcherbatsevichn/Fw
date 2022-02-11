<lable for ="<?= $params['name']?>"><?= $params['title']?></lable>
<select name="<?= $params['name']?>" class="form-select <?= $params['additional_class']?>" id="<?= $params['attr']['data-id']?>">
<?php 
    foreach($params['list'] as $value){
        if(isset($value['selected']) && $value['selected'] == true){
                echo ("<option selected value=\"".$value['value']."\" class = \"".$value['additional_class']."\" id=\"".$value['attr']['data-id']."\">".$value['title']."</option>");
        }else{
            echo ("<option value=\"".$value['value']."\" class = \"".$value['additional_class']."\" id=\"".$value['attr']['data-id']."\">".$value['title']."</option>");
        }
   }
    
?>
</select>
