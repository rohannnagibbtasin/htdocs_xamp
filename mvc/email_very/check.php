<?php
    $con = mysqli_connect("localhost","root","","test");
    $data = stripcslashes(file_get_contents("php://input"));
    $mydata = json_decode($data,true);
    $username = $mydata['user'];
    $sql = "select * from tasin where user_name = '$username' ";
    $result = mysqli_query($con,$sql);
    if(mysqli_num_rows($result)>0){
        $row = mysqli_fetch_assoc($result);
        echo $row."Available";
    }else{
        echo "Not";
    }