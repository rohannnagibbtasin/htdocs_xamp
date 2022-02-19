<?php
    function dis_error($error){
        $result = "<div class=\"alert alert-warning alert-dismissible fade show\" role=\"alert\">
                      <strong>Warning!</strong> $error
                      <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\" aria-label=\"Close\"></button>
                    </div>";
        return $result;
    }

?>

<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

    <title>Login</title>
    <link href="./css/first1.css" rel="stylesheet">
</head>
<body>

    <div class="container">
        <form method="post" action="" id="loginform">
            <div class="emni"></div>
            <div>
                <?php

                ?>
            </div>
            <div class="form-group">
                <input type="email" class="form-control" name="email" placeholder="Enter your email here" id="email">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" placeholder="Enter your password here" name="password" id="password">
            </div>
            <a href="forgot.php" class="forgot">Forgot Password</a>
            <input type="submit" class="btn" value="Login" name="login" id="login" disabled>
            <h1 class="not">Not yet registered? <a href="signup.php">Sign Up</a></h1>
        </form>
    </div>
    <script src="js/index.js"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>
</html>