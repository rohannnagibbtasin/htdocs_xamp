<?php
    require_once('config.php');
    require_once('classes/bootsrap.php');

    $bootsrap = new Bootsrap($_GET);
    $controller = $bootsrap->createController();
?>