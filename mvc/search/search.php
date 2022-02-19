<?php

    include('db.php');
    $val = $_POST['search'];
    $sql = "select * from new_student where name like '%{$val}%' or email like '%{$val}%' or password like '%{$val}%' ";
    $result = $conn->query($sql);
    if($result->num_rows>0){
        $data = array();
        while($row=$result->fetch_assoc()){
            $data[] = $row;
        }
    }

    echo json_encode($data);