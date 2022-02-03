<?php
namespace Fw\Core\Component;

use Fw\Core\Component\Template as Template;


abstract class Base {

    public $result = []; // массив с результатом работы компонента 
    public $id; //строковый id компонента 
    public $params = []; // входящие параметры компонента 
    public $template; // экземпляр класса шаблона компонента 
    public $__path; //путь к файловой структуре компонента 
    
    abstract public function executeComponent();   // обязательно для переопределения дочерним классом

    public function __construct($id, $templateid){  // заполнение свойств. Объявление шаблона
        $this->id = $id;
        $this->template = new Template($templateid, $this );
    } 
}