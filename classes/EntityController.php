<?php
include(dirname(__FILE__) . "/Entity.php");
include(dirname(__FILE__) . "/DB.php");

class EntityController extends DB {
    public static function CreateView($view) {
        require_once("views/$view");
    }
}
?>