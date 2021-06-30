<?php
include(dirname(__FILE__) . "/Entity.php");
include(dirname(__FILE__) . "/DB.php");

class Controller extends DB {
    function __construct($name, $birthday)
    {
        $this->name = $name;
        $this->birthday = $birthday;
    }
    
    public static function CreateView($view) {
        require_once("views/$view");
    }
}
?>