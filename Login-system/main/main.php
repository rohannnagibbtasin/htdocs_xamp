<?php
    require_once '../classes/Database.php';

    $obj = new Database();
    $obj->start();
    $obj->close();