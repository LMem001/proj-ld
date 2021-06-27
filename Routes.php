<?php 
include "classes/Route.php";
include "classes/EntityController.php";

Route::set('create', function() {
    EntityController::CreateView("create.php");
});
?>