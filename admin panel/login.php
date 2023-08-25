<?php
	@session_start();
	include("includes/connect.php");
	$adminemail = mysqli_real_escape_string($link, base64_decode($_POST['email']));
	$adminpass = mysqli_real_escape_string($link, base64_decode($_POST['password']));
	$adminpass = md5($adminpass);
	$auth = 'admin_in';

	$query = mysqli_query($link, "SELECT * FROM `admins` WHERE email = '".$adminemail."' AND password = '".$adminpass."'");
	if (mysqli_affected_rows($link) == 0 ){
		 echo json_encode(array('status' => 'error','message'=> 'Wrong email or password!'));
	} else {
		$row = mysqli_fetch_array($query);
		$_SESSION['sess_admin_login'] = $row['id'];
		echo json_encode(array('status' => 'success','message'=> 'Logging in'));
	}
?>
