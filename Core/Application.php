<?php 
namespace Fw\Core;

class Application{

    private $__components = [];
    private $pager = null; 
    private static $instance = null;
    private $template = null;

    private function __construct() {
    }

    public static function getInstance(): Application { 
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }
    
}