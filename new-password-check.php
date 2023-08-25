<?php
    session_start();
    if(isset($_SESSION['user'])){
        header("Location: profile.php");
    }
    if(!isset($_SESSION['email'])){
        header("Location: forget-password.php");
    }
    if(isset($_POST['password']) && !empty($_POST['password']) && isset($_POST['password-confirm']) && !empty($_POST['password-confirm'])){
        include "database.php";
        $password = mysqli_real_escape_string($con, htmlspecialchars($_POST['password']));
        $cpassword = mysqli_real_escape_string($con, htmlspecialchars($_POST['password-confirm']));
        $email = mysqli_real_escape_string($con, htmlspecialchars(trim($_SESSION['email'])));
        if($password == $cpassword && $password!="" && $cpassword!=""){

            $password = md5($password);
            $query_ex_pass = "SELECT user_password FROM `all_user` where user_email = '{$email}';";
            $run_ex_pass = mysqli_query($con, $query_ex_pass);
            $fetch_ex_pass = mysqli_fetch_assoc($run_ex_pass);
            $pass = $fetch_ex_pass['user_password'];

            $bool = true;
            if( $password == $pass){
                $bool = false;
            }
    
            $query_changed_pass = "SELECT ex_password FROM `changed_passwords` where email = '{$email}';"; 
            $run_changed_pass = mysqli_query($con, $query_changed_pass);

            while($fetch_changed_pass = mysqli_fetch_assoc($run_changed_pass)){
                $changed_pass = $fetch_changed_pass['ex_password'];
                if($changed_pass == $password){
                     $bool = false;
                     break;
                }
            }

            if($bool){
                $query_update = "UPDATE `all_user` SET user_password = '{$password}' where user_email = '{$email}';";
                $run_update = mysqli_query($con, $query_update);
                $affect = mysqli_affected_rows($con);
                if($affect == 1){
                    $query_forget_code = "SELECT forget_code FROM `forget_password` where email = '{$email}';";
                    $run_forget_code = mysqli_query($con, $query_forget_code);
                    $fetch_forget_code = mysqli_fetch_assoc($run_forget_code);

                    $query_change = "INSERT INTO `changed_passwords` (email, forget_code, ex_password, new_password) VALUES('{$email}', '{$fetch_forget_code['forget_code']}','{$pass}','{$password}');";
                    $run_change = mysqli_query($con, $query_change);
                    $query_del = "DELETE FROM `forget_password` where email = '{$email}';";
                    $run_del = mysqli_query($con, $query_del);
                    $_SESSION['warning15']='warning15';
                    header("Location: login-pop-up.php");
                }
                else{
                    header("Location: new-password.php");
                }
            }
            else{
                $_SESSION['warning14']='warning14';
                header("Location: new-password.php");
            }
        }
        else{
            $_SESSION['warning13']='warning13';
            header("Location: new-password.php");
        }
    }
    else{
        $_SESSION['warning12']='warning12';
        header("Location: new-password.php");
    }
?>