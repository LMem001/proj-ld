<?php 
include "classes/Route.php";
include "classes/Controller.php";

Route::set('create', function() {
    Controller::CreateView("create.php");
});

Route::set('show', function() {
    Controller::CreateView("show.php");
});
?>