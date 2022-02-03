<?php 
namespace Fw\Core;

use Fw\Core\Type\Dictionary as Dictionary;
class Request extends Dictionary{
    public $requestinfo;

    public function __construct() {
        $this->requestinfo = $_REQUEST;
    }
}