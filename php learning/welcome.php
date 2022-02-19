<?php
    session_start();
    if(isset($_SESSION['uname'])){
        echo $_SESSION['uname']."<br>".$_SESSION['pass'];

    }
    else{
        echo "<script>location.href='login.php'</script>";
    }
    
    if(isset($_REQUEST['logout'])){
        session_unset();
        session_destroy();
        echo "<script>location.href='login.php'</script>";
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .container{
            max-width: 1000px;
            margin: 0px auto;
        }
    </style>
</head>
<body class="container">
    <form action="" method="POST">
        <input type="submit" value="LOG OUT" name="logout">    
    </form>
</body>
</html>