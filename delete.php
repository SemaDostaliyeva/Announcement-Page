<?php
    session_start();
    if(!isset($_SESSION['user'])){
        header("Location: login-pop-up.php");
    }
    if(isset($_POST['submit-delete'])){
        include "database.php";
        $hidden_id = $_POST['hidden-id'];
        $sql_delete = "UPDATE `{$_SESSION['table']}` SET {$_SESSION['table']}_status = 0 where announcement_id = '{$hidden_id}';";
        $run_delete = mysqli_query($con, $sql_delete);
    }
    header ("Location: profile.php");
?>