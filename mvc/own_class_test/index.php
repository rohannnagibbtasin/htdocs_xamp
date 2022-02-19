<?php

    include_once './Database.php';
    $object = new Database;
    $object->start('test');
    $d = $object->show_all_data('user');
    echo "<pre>";
    print_r($d);
    echo "</pre>";
    $object->close();