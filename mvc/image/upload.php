<?php
    if($_FILES['file']['name'] != ''){
        $file = $_FILES['file']['name'];
        $ex = pathinfo($file,PATHINFO_EXTENSION);
        $valid_ex = array("jpeg","jpg","png","gif");
        if(in_array($ex,$valid_ex)){
            $new_name = rand().".".$ex;
            $path = "images/".$new_name;
            if(move_uploaded_file($_FILES['file']['tmp_name'],$path)){
                echo '<img src="'.$path.'"  ><button data-path ="'.$path.'" id="delete_btn">Delete<button>';
            }
        }
    }else{
        echo '<script>alert("Please select file")</script>';
    }
    