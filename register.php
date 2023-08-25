<?php
	session_start();
    if(isset($_SESSION['user'])){
        header("Location: profile.php");
    }
	function valid($data){
		if (isset($_POST[$data]) && !empty($_POST[$data])) {
			return $_POST[$data];
		}
		else
			return false;
	}

	function send_email($email){
		return file_get_contents("http://products.agarmen.com/mailapi?email=$email&apikey=753951");
	}

	include "database.php";

	$email = valid('email');
	$password = valid('password');
	$password_confirm =valid('password-confirm');
	$fullname = valid('fullname');
	if($password != $password_confirm || empty($password) ||  empty($password_confirm)){
		header("Location:register-pop-up.php");
	}else{
		$password = md5($password);
	}

	if($email && $password && $password_confirm){

		$email_exist = "SELECT * FROM `all_user` WHERE user_email='{$email}';";
		$email_exist_run = mysqli_query($con, $email_exist);
		$email_exist_num_row = mysqli_num_rows($email_exist_run);

		$email = mysqli_real_escape_string($con, htmlspecialchars(trim($email)));
		$password = mysqli_real_escape_string($con, htmlspecialchars($password));
		$password_confirm = mysqli_real_escape_string($con, htmlspecialchars($password_confirm));

		
		if($email_exist_num_row == 0){
			$query_email_register_exist = "INSERT INTO `ex_register_code` (email, register_code) SELECT user_email, random_code FROM `register_user` WHERE user_email = '{$email}';"; 
			$query_email_register_exist2 = "DELETE FROM `register_user` where user_email = '{$email}';";
			mysqli_query($con, $query_email_register_exist);
			mysqli_query($con, $query_email_register_exist2);
			$code = send_email($email);
			
			if($code && is_numeric($code) && strlen($code) == 6){
				$code = mysqli_real_escape_string($con, htmlspecialchars($code));
				$query_register_code = "INSERT INTO `register_user` (user_email, fullname,  user_password, random_code) VALUES ('{$email}', '{$fullname}', '{$password}', '{$code}');";
				$run_register_code = mysqli_query($con, $query_register_code);
				$select_run_rows = "SELECT * FROM `register_user` where user_email = '{$email}';";
				$select_run = mysqli_query($con, $select_run_rows);
				$register_code_num_row = mysqli_num_rows($select_run);
				
				if($register_code_num_row == 1){
					$_SESSION['register-email'] = $email;
					header("Location: register-code.php");
				}
				else{
					header("Location: register-pop-up.php");
				}
			}
		}
		else{
			$_SESSION['warning1']='warning1';
			header("Location:login-pop-up.php");
		}
    }
    else{
        header("Location: register-pop-up.php");
    }
?>