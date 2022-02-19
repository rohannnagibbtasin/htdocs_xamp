<?php
    //header("Access-Control-Allow-Origin: http://localhost:3000");
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Methods: *");
    //header("Access-Control-Allow-Methods: GET, POST, PATCH, PUT, DELETE, OPTIONS");
    header("Access-Control-Allow-Headers: Content-Type, Accept, Authorization, X-Requested-With, X-Auth-Token, Origin, Application");
    include_once './Database.php';
    $obj = new Database;
    $obj->start('tasin');
    $data = $obj->show_all_data('student');
    echo json_encode($data);
    $obj->close();