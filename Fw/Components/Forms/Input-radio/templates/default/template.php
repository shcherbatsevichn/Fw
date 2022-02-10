<?php
$opendiv = "<div class=\"form-check\">\n";   
echo ("<p>".$params["title"]."</p>");
foreach($params['list'] as $value){
    echo($opendiv);
    echo("<input type=\"radio\" class=\"form-check-input ".$value["additional_class"]."\" name=\"".$params["name"]."\" id = \"".$value['attr']['data-id']."\">\n");
    echo("<lable for =\"".$params["name"]."\" class=\"form-check-label\">".$value["title"]."</lable>");
    echo("</div>");
}
