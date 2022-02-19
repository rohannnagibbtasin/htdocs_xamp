<?php

    include('db.php');
    

    $data = stripcslashes(file_get_contents("php://input"));
    $mydata = json_decode($data,true);
    $id = $mydata['id'];
    $name = $mydata['name'];
    $email = $mydata['email'];
    $password = $mydata['password'];
    
    if(!empty($name) && !empty($email) && !empty($password)){
        $sql = "insert into student(id,name,email,password) values('$id','$name','$email','$password') on duplicate key update name = '$name' , email = '$email', password= '$password' ";

        if($conn->query($sql) == TRUE){
            echo "Student Saved Successfully";
        }
        else{
            echo "Unable to  Save Students";
        }
    }else{
        echo "Fill All Fields";
    }




    // if(!empty($name) && !empty($email) && !empty($password)){
    //     $sql = "insert into student(name,email,password) values('$name','$email','$password')";

    //     if($conn->query($sql) == TRUE){
    //         echo "Student Saved Successfully";
    //     }
    //     else{
    //         echo "Unable to  Save Students";
    //     }
    // }else{
    //     echo "Fill All Fields";
    // }
