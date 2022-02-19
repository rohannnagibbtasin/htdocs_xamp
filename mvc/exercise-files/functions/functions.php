<?php
	include('C:/xampp/htdocs/mvc/exercise-files/functions/mail/mailer.php');


	/****** Helper functions  *****/

	function clean($string){
		return htmlentities($string);
	}

	function redirect($location){
		return header("Location: {$location}");
	}

	function set_msg($message){
		if(!empty($message)){
			$_SESSION['message'] = $message;
		}
		else{
			$message = "";
		}
	}

	function display_msg(){
		if(isset($_SESSION['message'])){
			echo $_SESSION['message'];
			unset($_SESSION['message']);
		}
	}

	function token_generator(){
		$token =$_SESSION['token'] = md5(uniqid(mt_rand(),true));
		return $token;
	}


	function validation_errors($error){
		$error = "
				<div class=\"alert alert-danger alert-dismissible\" role=\"alert\">
	  				<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button><strong>Warning!</strong> $error
				</div>
			";
		return $error;
	}



	function email_exists($email){
		$sql = "select id from users where email = '$email'";
		$result = query($sql);
		if(row_count($result) ==1 || row_count($result)>0){
			return true;
		}
		else{
			return false;
		}
	}

	function user_exists($username){
		$sql = "select id from users where username = '$username'";
		$result = query($sql);
		if(row_count($result) ==1 || row_count($result)>0){
			return true;
		}
		else{
			return false;
		}
	}

	

/************  Validation functions  ****************/


	function validate_user_registration(){

		$errors = [];
		$min = 3;
		$max = 20;

		if($_SERVER['REQUEST_METHOD'] == "POST"){
			$first_name = clean($_POST['first_name']);
			$last_name = clean($_POST['last_name']);
			$username = clean($_POST['username']);
			$email = clean($_POST['email']);
			$password = clean($_POST['password']);
			$confirm_password = clean($_POST['confirm_password']);
		}

		if(isset($first_name)){
			if(strlen($first_name) <$min){
				$errors[] = "Your First name can't be less than {$min}";
			}

		}

		if(isset($first_name)){
			if(strlen($first_name) >$max){
				$errors[] = "Your First name can't be less than {$max}";
			}

		}

		if(isset($last_name)){
			if(strlen($last_name) <$min){
				$errors[] = "Your Last name can't be less than {$min}";
			}
		}

		if(isset($last_name)){
			if(strlen($last_name) >$max){
				$errors[] = "Your Last name can't be less than {$max}";
			}

		}

		 if(isset($username)){
		 	if(strlen($username)<$min){
		 		$errors[] = "Your Username can't be less than {$min}";
		 	}
		 }

		 if(isset($username)){
			if(strlen($username) >$max){
				$errors[] = "Your Username can't be less than {$max}";
			}
		}

		if(isset($username)){
			if(user_exists($username)){
				$errors[] = "Sorry that username is already registered";
			}
		}

		 if(isset($email)){
			if(strlen($email) <$min){
				$errors[] = "Your Email can't be less than {$max}";
			}

		}

		if(isset($password) && isset($confirm_password)){
			if($password !== $confirm_password){
				$errors[] = "Your Passwords don't match";
			}

		}

		if(isset($email)){
			if(email_exists($email)){
				$errors[] = "Sorry that email is already registered";
			}
		}

		if(!empty($errors)){
			foreach ($errors as $error) {
				
				echo validation_errors($error);

			}
		}
		else{
			if(isset($first_name) && isset($last_name) && isset($username) && isset($email) && isset($password)){
				if(register_user($first_name,$last_name,$username,$email,$password)){
					set_msg("<p class=\"bg-success text-center\">Please check your email or spam folder for activation link</p>");
					redirect("index.php");
				}
				else{
					set_msg("<p class=\"bg-danger text-center\">Sorry,We could not register the user</p>");
					redirect("index.php");
				}
			}
		}

	}


/************  Register functions  ****************/

	function register_user($first_name,$last_name,$username,$email,$password){

		$first_name = escape($first_name);
		$last_name = escape($last_name);
		$username = escape($username);
		$email = escape($email);
		$password = escape($password);

		if(email_exists($email)){
			return false;
		}
		else if (user_exists($username)) {
			return false;
		}
		else{
			$password = md5($password);
			$validation_code = md5($username.microtime());
			$sql = "insert into users (first_name,last_name,username,email,password,validation_code,active) "; 
			$sql.=" values ('$first_name','$last_name','$username','$email','$password','$validation_code',0)";
			$result = query($sql);
			confirm($result); 

			$subject = "Activate account";
			$message = "Please click the link below
			http://localhost/mvc/exercise-files/activate.php?email=$email&code=$validation_code";

			$headers = "From: noreply@yourwebsite.com";
			send_mail($email,$subject,$message,$headers);

			return true;
		}
	
		
	}

/************  Activation functions  ****************/

	function activate_user(){

		if($_SERVER['REQUEST_METHOD']=="GET"){
			if(isset($_GET['email'])){
				$email = clean($_GET['email']);
				$validation_code = clean($_GET['code']);
				$sql = "select id from users where email = '".escape($_GET['email'])."' and validation_code = '".escape($_GET['code'])."' ";

				$result = query($sql);
				confirm($result);
				if(row_count($result)==1){
					$sql2 = "update users set active = 1 , validation_code = 0 where email ='".escape($email)."' and validation_code = '".escape($validation_code)."' ";
					$result2 = query($sql2);
					confirm($result2);
					//set_msg("<p class='bg-success'>Your account has been activated . Please log in.</p>");
					set_msg("
					<div class=\"alert alert-success alert-dismissible\" role=\"alert\">
						<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button><strong>Success!</strong>Your account has been activated . Please log in.
					</div>
				");

					redirect("login.php");
				}
				else{
					//set_msg("<p  class='bg-danger'>Sorry Your account could not be acctivated</p>");
					set_msg("
					<div class=\"alert alert-danger alert-dismissible\" role=\"alert\">
						<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button><strong>Warning!</strong>Sorry Your account could not be acctivated
					</div>
				");

					redirect("login.php");
				}
			}
		}

	}


/************  Activation functions  ****************/

	function validate_user_login(){

			$errors = []; 

			if($_SERVER['REQUEST_METHOD'] == "POST"){
				$email = clean($_POST['email']);
				$password = clean($_POST['password']);
				$remember = isset($_POST['remember']);



				if(empty($email)){
					$errors[] = "Email field can not be empty";
				}

				if(empty($password)){
					$errors[] = "Password field can not be empty";
				}

				if(!empty($errors)){
					foreach ($errors as $error) {
						
						echo validation_errors($error);

					}
				}
				else{
					if(login_user($email,$password,$remember)){
						redirect("admin.php");
					}
					else{
						echo validation_errors("Your credentials are not correct");
					}
				}
			}

	}


/**********************User login functions    *****************/

	function login_user($email,$password,$remember){

		$sql = "select password , id from users where email = '".escape($email)."' and active = 1";
		$result = query($sql);
		if(row_count($result)==1){
			$row = fetch_array($result);
			$db_password = $row['password'];
			if(md5($password) === $db_password){

				if($remember=="on"){
					setcookie('email',$email,time()+432000);
				}

				$_SESSION['email'] = $email;

				return true;
			}
			else{
				return false;
			}

			return true;
		}
		else{
			return false;
		}

	}


/************** logged in function *************/

	function logged_in(){
		if(isset($_SESSION['email']) || isset($_COOKIE['email'])){
			return true;
		}
		else{
			return false; 
		}
	}

/*************** Recover Password function*************/
	function recover_password(){
		if($_SERVER['REQUEST_METHOD'] == "POST"){
			if(isset($_SESSION['token']) && $_POST['token']===$_SESSION['token']){
				$email = clean(escape($_POST['email']));
				if(email_exists($email)){
					$validation_code = md5($email.microtime());

					setcookie('temp_access_code',$validation_code,time()+60*60);
					$sql = "update users set validation_code = '".escape($validation_code)."' where email = '".escape($email)."' ";
					$result = query($sql);
					confirm($result);

					$subject = "Please reset your password";
					$message = "Here is your password reset code {$validation_code}
					Click here to reset your password  http://localhost/mvc/exercise-files/code.php?email=$email&code=$validation_code	
					";
					$headers = "From: noreply@yourwebsite.com";
					if(!send_mail($email,$subject,$message,$headers)){
						echo validation_errors("Email could not be sent");
					}
					set_msg("<p class='bg-success text-center'>Please check your email or spam folder for a password reset code</p>");
					redirect("code.php");
				}
				else{
					echo validation_errors("This email does not exist");
				}
			}
		}
		// else{
		// 	redirect("index.php");
		// }
		if(isset($_POST['cancel-submit'])){
			redirect("login.php");
		}
	}

	/********* Code Validation*********/
	function validate_code(){
		if(isset($_COOKIE['temp_access_code'])){
				if(!isset($_GET['email']) && !isset($_GET['code'])){
					redirect("index.php");
				}
				else if(empty($_GET['email']) || empty($_GET['code'])){
					redirect("index.php");
				}
				else{
					if(isset($_POST['code'])){

						$email = clean($_GET['email']);
						$validation_code = clean($_POST['code']);
						$sql = "select id from users where validation_code='".escape($validation_code)."' and email='".escape($email)."' ";

						$result = query($sql);

						if(row_count($result)==1){
							setcookie('temp_access_code',$validation_code,time()+300);
							redirect("reset.php?email=$email&code=$validation_code");
						}
						else{
							echo validation_errors("Sorry wrong validation code");
						}


					}
				}
		}
		else{
			set_msg("<p class='bg-danger text-center'>Sorry your validation code expired</p>");
			redirect("index.php");
		}
	}

	/****** Recover Password function******/

	function password_reset(){

		if(isset($_COOKIE['temp_access_code'])){
			if(isset($_GET['email']) && isset($_GET['code'])){
				if(isset($_SESSION['token']) && isset($_POST['token'])){
					if($_POST['token']===$_SESSION['token']){
						if($_POST['password'] === $_POST['confirm_password']){
							$updated_password = md5($_POST['password']);
							$sql = "update users set password ='".escape($updated_password)."' , validation_code = 0 where email='".escape($_GET['email'])."'   ";
							$result = query($sql);
							if($result){
								set_msg("<p class='bg-success text-center'>Your password has been changed</p>");
								redirect("login.php");
							}
						}
						else{
							echo validation_errors("Your password does not match");
						}
					}
				}
			}
		}
		else{
			set_msg("<p class='bg-danger text-center'>Sorry your time has  expired</p>");
			redirect("recover.php");
		}
	}

?>