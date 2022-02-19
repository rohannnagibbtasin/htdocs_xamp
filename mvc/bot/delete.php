<?php

    include('db.php');
    

    $data = stripcslashes(file_get_contents("php://input"));
    $mydata = json_decode($data,true);
    $id = $mydata['sid'];
    if(!empty($id)){
        $sql = "delete from new_student where id= '$id' ";
        if($conn->query($sql) == TRUE){
            echo 1;
        }else{
            echo 0;
        }
    }else{
        echo "Problem Occured";
    }