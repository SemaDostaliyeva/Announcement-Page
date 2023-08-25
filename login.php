<?php
    session_start();
    if(isset($_SESSION['user']) && !empty($_SESSION['user'])){
        header("Location: profile.php");
    }
    if(isset($_POST['email']) && isset($_POST['password']) && !empty($_POST['email']) && !empty($_POST['password'])){
        include 'database.php';

        $email=mysqli_real_escape_string($con, $_POST['email']);
        $password= mysqli_real_escape_string($con, $_POST['password']);
        $password=md5($password);
        $sorgu_login = "SELECT * from `all_user` where user_email='{$email}';";
        $run_login = mysqli_query($con, $sorgu_login);
        $login_sayi = mysqli_num_rows($run_login);
        $login_fetch = mysqli_fetch_assoc($run_login);
		if($login_sayi == 1){
            if($password == ($login_fetch['user_password'])){
                $fullname = $login_fetch['fullname'];
                $_SESSION['user'] = $login_fetch['id'];
                setcookie("email", $email, time()+86400 * 30, "/");
                setcookie("fullname", $fullname, time()+86400 * 30, "/");
                header("Location: index.php");
            }
            else{   
                $_SESSION['warning2']='warning2';
                header("Location: login-pop-up.php");
            }
		}
		else{
            $_SESSION['warning5']='warning5';
            header("Location: login-pop-up.php");
        }		
    }
    else{
        $_SESSION['warning3']='warning3';
        header("Location: login-pop-up.php");
    }
  
?>