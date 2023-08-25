<?php 
	session_start();
	if(!isset($_SESSION['user'])){
        header("Location: profile.php");
    }
	session_destroy();
	header("Location: index.php");
?>