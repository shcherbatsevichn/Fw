<?php 
namespace Fw\Core;

use Fw\Core\Type\Dictionary as Dictionary;
class Server extends Dictionary{
    
    public $serverinfo;

    public function __construct() {
        $this->serverinfo = $_SERVER;
    }

}