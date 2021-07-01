<?php
include(dirname(__FILE__) . "/Entity.php");
include(dirname(__FILE__) . "/DB.php");

class Controller extends DB {
    function __construct($name, $birthday)
    {
        $this->name = $name;
        $this->birthday = $birthday;
    }
    
    public static function CreateView($view) 
    {
        require_once("views/$view");
    }

    public static function redirect($url, $permanent = false)
    {
        header('Location:' . $url, true, $permanent ? 301 : 302);
        
        exit();
    }
}
?>