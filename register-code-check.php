<?php
    session_start();
    if(isset($_SESSION['user'])){
        header("Location: profile.php");
    }
    if (isset($_POST['code']) && !empty($_POST['code'])){
        include "database.php";
        $code = mysqli_real_escape_string($con, htmlspecialchars($_POST['code']));
        $email = mysqli_real_escape_string($con, htmlspecialchars($_SESSION['register-email']));
        $query_code = "SELECT * FROM `register_user` where user_email = '{$email}' AND random_code = '{$code}' AND register_date > NOW()- INTERVAL 15 MINUTE;";
        $run_code = mysqli_query($con, $query_code);
        $fetch_code = mysqli_fetch_assoc($run_code);
        $code_num_row = mysqli_num_rows($run_code);
        if($code_num_row == 1){
            $multi_query = "INSERT INTO `all_user` (user_email, fullname, user_password) SELECT user_email, fullname, user_password FROM `register_user` where user_email = '{$email}';";
            $multi_query2 = "DELETE FROM `register_user` where user_email = '{$email}';";
            $run_multi = mysqli_query($con, $multi_query);
            $run_multi2 = mysqli_query($con, $multi_query2);
            $query_check = "SELECT * FROM `all_user` where user_email = '{$email}'; ";
            $run_check = mysqli_query($con, $query_check);
            $num_row_multi = mysqli_num_rows($run_check);
            if($num_row_multi==1){
                $_SESSION['warning1'] = 'warning1';
                header("Location: login-pop-up.php");
            }
            else{
                header("Location: register-pop-up.php");
            }
        }
        else{
            $query_code2 = "SELECT * FROM `register_user` where user_email = '{$email}'  AND register_date < NOW()- INTERVAL 15 MINUTE;";
            $run_code2 = mysqli_query($con, $query_code2);
            $code2_num_row = mysqli_num_rows($run_code2);
            if($code2_num_row == 1){
                $_SESSION['warning4'] = 'warning4';
                header("Location: register-pop-up.php");
            }         
        }
        if($code != $fetch_code['random_code']){
            $_SESSION['warning11'] = 'warning11';
            header("Location: register-code.php");
        }
    }
    else{
        $_SESSION['warning10'] = 'warning10';
        header("Location: register-code.php");
    }
?>