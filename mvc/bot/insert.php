<?php

    include_once('db.php');
    $data = stripslashes(file_get_contents("php://input"));
    $mydata = json_decode($data,true);
    $id = $mydata['id'];
    $name = $mydata['name'];
    $email = $mydata['email'];
    $password = $mydata['password'];
    if($id===""){
        $id = 'NULL';
    }


    if(!empty($name) && !empty($email) && !empty($password)){
        $sql = "insert into new_student(id,name,email,password) values('$id','$name','$email','$password') on duplicate key update name = '$name' , email = '$email', password= '$password' ";
        if($conn->query($sql)){
            echo "Student added Successfully";
        }else{
            echo "Failed to Add";
        }
    }else{
        echo "Fill the All Section";
    }
    