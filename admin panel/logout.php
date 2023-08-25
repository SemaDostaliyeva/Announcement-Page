<?php
	session_start();
	setcookie("adminname","");
	setcookie("adminpass","");
	setcookie("auth","");
	
	unset($_SESSION['sess_admin_login']);
	if(session_destroy()) {
		header("location:"."index.php");
	}
?>
