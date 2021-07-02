<?php 
    require_once( 'Routes.php' );

    if($_GET['url'] == 'index.php') {
      Controller::redirect('create', false);
    }
?>
