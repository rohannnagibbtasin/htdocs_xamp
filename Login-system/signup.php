
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

    <title>Login</title>
    <link href="./css/signup.css" rel="stylesheet">
</head>
<body>

<div class="container">
    <form method="post" action="" id="signupform">
        <div class="emni"></div>
        <div>
            <?php
                if(isset($_POST['signup'])){
                    echo $_POST['first_name'].$_POST['last_name'];
                }
            ?>
        </div>
        <div class="form-group">
            <label for="fname">First name</label>
            <input type="text" class="form-control" name="first_name" placeholder="" id="fname">
        </div>
        <div class="form-group">
            <label id="lname">Last name</label>
            <input type="text" class="form-control" placeholder="" name="last_name" id="lname">
        </div>
        <div class="form-group">
            <label id="username">Username</label>
            <input type="text" class="form-control" placeholder="" name="username" id="username">
        </div>
        <div class="form-group">
            <label id="email">Email</label>
            <input type="email" class="form-control" placeholder="" name="email" id="email-sign">
        </div>
        <div class="form-group">
            <label id="password">Password</label>
            <input type="password" class="form-control" placeholder="" name="password" id="password-sign">
        </div>
        <div class="form-group">
            <label id="confirm_password">Confirm Password</label>
            <input type="password" class="form-control" placeholder="" name="confirm_password" id="confirm_password">
        </div>
        <input type="submit" class="btn" value="Sign Up" name="signup" id="signup" disabled>
        <h1 class="not">Already registered? <a href="index.php">Login</a></h1>
    </form>
</div>

<script src="js/sign.js"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>
</html>
