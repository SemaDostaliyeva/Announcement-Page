<?php
    session_start();
    if(isset($_SESSION['user'])){
        header("Location: profile.php");
    }
    function send_email($email){
        return file_get_contents("http://products.agarmen.com/mailapi?email=$email&apikey=753951");
    }

    if (isset($_POST['email']) && !empty($_POST['email'])){
        
        include "database.php";
        $email = mysqli_real_escape_string($con, htmlspecialchars(trim($_POST['email'])));

        $email_exist = "SELECT * FROM `all_user` WHERE user_email='{$email}';";
		$email_exist_run = mysqli_query($con, $email_exist);
		$email_exist_num_row = mysqli_num_rows($email_exist_run);

        if($email_exist_num_row != 0){

            $query_email_exist = "SELECT user_password FROM `all_user` where user_email = '{$email}';";
            $email_exist_run = mysqli_query($con, $query_email_exist);
            $email_exist_run_fetch = mysqli_fetch_assoc($email_exist_run);

            $query_email_exist2 = "SELECT email, forget_code FROM `forget_password` where email = '{$email}';";
            $email_exist_run2 = mysqli_query($con, $query_email_exist2);

            while( $email_exist_run_fetch2 = mysqli_fetch_assoc($email_exist_run2)){
                $query_email_exist3 = "INSERT INTO `changed_passwords`(email, forget_code , ex_password) VALUES ('{$email_exist_run_fetch2['email']}', '{$email_exist_run_fetch2['forget_code']}', '{$email_exist_run_fetch['user_password']}');";
                $query_email_exist_run3 = mysqli_query($con, $query_email_exist3);
            }

			$query_email_exist4 = "DELETE FROM `forget_password` where email = '{$email}';";
			$email_exist_run4 = mysqli_query($con, $query_email_exist4);
            
            $code = send_email($email);
            if($code && is_numeric($code) && strlen($code) == 6){
                $code = mysqli_real_escape_string($con, htmlspecialchars($code));
                $query_forget_code = "INSERT INTO `forget_password` (forget_code , email) VALUES ('{$code}', '{$email}');";
				$run_forget_code = mysqli_query($con, $query_forget_code);
                $query_select = "SELECT * FROM `forget_password` WHERE email='{$email}';";
                $run_query_select = mysqli_query($con, $query_select);
                $forget_num_row = mysqli_num_rows($run_query_select);
                if($forget_num_row == 1){
                    $_SESSION['email'] = $email;
                    header("Location: forget-password-code.php");
                }
            }
            else{
                if(isset($_SESSION['email']))
                header("Location: forget-password.php");
            }
        }
        else{
            $_SESSION['warning5'] = 'warning5';
            header("Location: forget-password.php");
        }
    }
    else{
        $_SESSION['warning6'] = 'warning6';
        header("Location: forget-password.php");
    }

?>