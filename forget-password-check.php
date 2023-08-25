<?php
    session_start();
    if(isset($_SESSION['user'])){
        header("Location: profile.php");
    }
    if(!isset($_SESSION['email'])){
        header("Location: forget-password.php");
    }
    if (isset($_POST['code']) && !empty($_POST['code'])){
        include "database.php";
        $code = mysqli_real_escape_string($con, htmlspecialchars($_POST['code']));
        $email = mysqli_real_escape_string($con, htmlspecialchars(trim($_SESSION['email'])));
        $query_code = "SELECT * FROM `forget_password` where email = '{$email}' AND forget_code = '{$code}' AND forget_date > NOW()- INTERVAL 15 MINUTE;";
        $run_code = mysqli_query($con, $query_code);
        $fetch_code = mysqli_fetch_assoc($run_code);
        $code_num_row = mysqli_num_rows($run_code);
        if($code_num_row == 1){
            header("Location: new-password.php");
        }
        else{
            $query_code2 = "SELECT * FROM `forget_password` where email = '{$email}' AND forget_date < NOW()- INTERVAL 15 MINUTE;";
            $run_code2 = mysqli_query($con, $query_code2);
            $code2_num_row = mysqli_num_rows($run_code2);
            if($code2_num_row == 1){
                $_SESSION['warning7'] = 'warning7';
                if(isset($_SESSION['email']))
                header("Location: forget-password.php");
            }
        }
        if($code != $fetch_code['forget_code']){
            $_SESSION['warning9'] = 'warning9';
            header("Location: forget-password-code.php");
        }
    }
    else{
        $_SESSION['warning8'] = 'warning8';
        header("Location: forget-password-code.php");
    }
?>