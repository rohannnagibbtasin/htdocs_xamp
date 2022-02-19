<?php

    include('db.php');
    

    $data = stripcslashes(file_get_contents("php://input"));
    $mydata = json_decode($data,true);
    $id = $mydata['sid'];
    if(!empty($id)){
        $sql = "delete from student where id= {$id} ";
        if($conn->query($sql) == TRUE){
            echo "Deleted Successfully";
        }else{
            echo "Unable To Delete";
        }
    }else{
        echo "Problem Occured";
    }