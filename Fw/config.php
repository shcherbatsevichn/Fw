<?php

$config =
    [ "templates" => "default_template", 
        "inputTypes" => 
            [ "text" => [
                "path" => "Fw/Components/Forms/Input-text/class.php", 
                "classname" => "InputText", 
                "id" => "Input-text", 
                "template" => "default"
            ],
            "password" => [
                "path" => "Fw/Components/Forms/Input-password/class.php", 
                "classname" => "InputPassword", 
                "id" => "Input-password", 
                "template" => "default"
            ],   
            "checkbox" => [
                "path" => "Fw/Components/Forms/Input-checkbox/class.php", 
                "classname" => "InputCheckbox", 
                "id" => "Input-checkbox", 
                "template" => "default"
            ],  
            "select" => [
                "path" => "Fw/Components/Forms/Input-select/class.php", 
                "classname" => "InputSelect", 
                "id" => "Input-select", 
                "template" => "default"
            ], 
            "number" => [
                "path" => "Fw/Components/Forms/Input-number/class.php", 
                "classname" => "InputNumber", 
                "id" => "Input-number", 
                "template" => "default"
            ],  
            "radio" => [
                "path" => "Fw/Components/Forms/Input-radio/class.php", 
                "classname" => "InputRadio", 
                "id" => "Input-radio", 
                "template" => "default"
            ],
            "textarea" => [
                "path" => "Fw/Components/Forms/Input-textarea/class.php", 
                "classname" => "InputTextarea", 
                "id" => "Input-textarea", 
                "template" => "default"
            ]
            
    ]
    ];