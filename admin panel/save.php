<?php
	include("includes/connect.php");

	@$cat = $_POST['cat'];
	@$cat_get = $_GET['cat'];
	@$act = $_POST['act'];
	@$act_get = $_GET['act'];
	@$id = $_POST['id'];
	@$id_get = $_GET['id'];

	if(@$cat == "about_us" || @$cat_get == "about_us") {
		$about_header = addslashes(htmlentities($_POST["about_header"], ENT_QUOTES));
		$about_paragraph = addslashes(htmlentities($_POST["about_paragraph"], ENT_QUOTES));
		$card1_count = addslashes(htmlentities($_POST["card1_count"], ENT_QUOTES));
		$card2_count = addslashes(htmlentities($_POST["card2_count"], ENT_QUOTES));
		$card3_count = addslashes(htmlentities($_POST["card3_count"], ENT_QUOTES));
		$card4_count = addslashes(htmlentities($_POST["card4_count"], ENT_QUOTES));
		$office_adress = addslashes(htmlentities($_POST["office_adress"], ENT_QUOTES));
		$email = addslashes(htmlentities($_POST["email"], ENT_QUOTES));

		if (@$act == "edit") {
			$sql_query = "UPDATE `about_us` SET  `about_header` =  '".$about_header."' , `about_paragraph` =  '".$about_paragraph."' , `card1_count` =  '".$card1_count."' , `card2_count` =  '".$card2_count."' , `card3_count` =  '".$card3_count."' , `card4_count` =  '".$card4_count."' ,  `office_adress` =  '".$office_adress."' , `email` =  '".$email."' WHERE `about_us_id` = '".$id."';";
			mysqli_query($link, $sql_query); 
		}
		header("location:"."about_us.php");
	}
		
	if(@$cat == "admins" || @$cat_get == "admins") {
		$name = addslashes(htmlentities($_POST["name"], ENT_QUOTES));
		$email = addslashes(htmlentities($_POST["email"], ENT_QUOTES));
		$password = addslashes(htmlentities($_POST["password"], ENT_QUOTES));
		$role = addslashes(htmlentities($_POST["role"], ENT_QUOTES));

		if(@$act == "add") {
			mysqli_query($link, "INSERT INTO `admins` (  `name` , `email` , `password` , `role` ) VALUES ( '".$name."' , '".$email."' , '".md5($password)."', '".$role."' ) ");
		}elseif (@$act == "edit") {
			mysqli_query($link, "UPDATE `admins` SET  `name` =  '".$name."' , `email` =  '".$email."' , `role` =  '".$role."'  WHERE `id` = '".@$id."' "); 
		}elseif (@$act_get == "delete") {
			mysqli_query($link, "DELETE FROM `admins` WHERE id = '".$id_get."' ");
		}
		header("location:"."admins.php");
	}

	if(@$cat == "all_user" || @$cat_get == "all_user") {
		$user_email = addslashes(htmlentities($_POST["user_email"], ENT_QUOTES));
		$user_password = addslashes(htmlentities($_POST["user_password"], ENT_QUOTES));
		$user_date = addslashes(htmlentities($_POST["user_date"], ENT_QUOTES));

		if(@$act == "add") {
			mysqli_query($link, "INSERT INTO `all_user` (  `user_email` , `user_password` , `user_date` ) VALUES ( '".$user_email."' , '".$user_password."' , '".$user_date."' ) ");
		}elseif (@$act == "edit") {
			mysqli_query($link, "UPDATE `all_user` SET  `user_email` =  '".$user_email."' , `user_password` =  '".$user_password."' , `user_date` =  '".$user_date."'  WHERE `id` = '".@$id."' "); 
		}elseif (@$act_get == "delete") {
			mysqli_query($link, "DELETE FROM `all_user` WHERE id = '".@$id_get."' ");
		}
		header("location:"."all_user.php");
	}
	
	if(@$cat == "bin" || @$cat_get == "bin") {		
		if (@$act_get == "delete") {
			mysqli_query($link, "DELETE FROM `bin` WHERE announcement_id = '".@$id_get."' ");
		}
		header("location: bin.php");	
	}
	
	if(@$cat == "changed_passwords" || @$cat_get == "changed_passwords") {
		if (@$act_get == "delete") {
			mysqli_query($link, "DELETE FROM `changed_passwords` WHERE changed_passwords_id = '".$id_get."' ");
		}
		header("location:"."changed_passwords.php");
	}
	
	if(@$cat == "ex_register_code" || @$cat_get == "ex_register_code") {
		if (@$act_get == "delete") {
			mysqli_query($link, "DELETE FROM `ex_register_code` WHERE ex_register_code_id = '".$id_get."' ");
		}
		header("location:"."ex_register_code.php");
	}
	
	if(@$cat == "footer" || @$cat_get == "footer") {
		$footer_title = addslashes(htmlentities($_POST["footer_title"], ENT_QUOTES));
		$footer_paragraph = addslashes(htmlentities($_POST["footer_paragraph"], ENT_QUOTES));
		$site_name = addslashes(htmlentities($_POST["site_name"], ENT_QUOTES));
		$footer_adress = addslashes(htmlentities($_POST["footer_adress"], ENT_QUOTES));
		$footer_phone = addslashes(htmlentities($_POST["footer_phone"], ENT_QUOTES));
		$footer_email = addslashes(htmlentities($_POST["footer_email"], ENT_QUOTES));

		if (@$act == "edit") {
			mysqli_query($link, "UPDATE `footer` SET  `footer_title` =  '".$footer_title."' , `footer_paragraph` =  '".$footer_paragraph."' , `site_name` =  '".$site_name."' , `footer_adress` =  '".$footer_adress."' , `footer_phone` =  '".$footer_phone."' , `footer_email` =  '".$footer_email."'  WHERE `footer_id` = '".$id."' "); 
		}
			header("location:"."footer.php");
	}
	
	if(@$cat == "forget_password" || @$cat_get == "forget_password") {
		if (@$act_get == "delete") {
			mysqli_query($link, "DELETE FROM `forget_password` WHERE forget_password_id = '".$id_get."' ");
		}
			header("location:"."forget_password.php");
	}
	
	if(@$cat == "register_user" || @$cat_get == "register_user") {
		if (@$act_get == "delete") {
			mysqli_query($link, "DELETE FROM `register_user` WHERE register_user_id = '".$id_get."' ");
		}
		header("location:"."register_user.php");
	}
		
	if(@$cat == "rent" || @$cat_get == "rent") {
		if (@$act_get == "delete") {
			mysqli_query($link, "DELETE FROM `rent` WHERE announcement_id = '".$id_get."' ");
		}
		header("location:"."rent.php");
	}
	
	if(@$cat == "rules" || @$cat_get == "rules") {
		$rules1 = addslashes(htmlentities($_POST["rules1"], ENT_QUOTES));
		$rules2 = addslashes(htmlentities($_POST["rules2"], ENT_QUOTES));
		$rules3 = addslashes(htmlentities($_POST["rules3"], ENT_QUOTES));
		$rules4 = addslashes(htmlentities($_POST["rules4"], ENT_QUOTES));
		$rules5 = addslashes(htmlentities($_POST["rules5"], ENT_QUOTES));

		if (@$act == "edit") {
			mysqli_query($link, "UPDATE `rules` SET  `rules1` =  '".$rules1."' , `rules2` =  '".$rules2."' , `rules3` =  '".$rules3."' , `rules4` =  '".$rules4."' , `rules5` =  '".$rules5."'  WHERE rules_id = '".$id."' "); 
		}
		header("location:"."rules.php");
	}

	if(@$cat == "sail" || @$cat_get == "sail") {
		if (@$act_get == "delete") {
			mysqli_query($link, "DELETE FROM `sail` WHERE announcement_id = '".$id_get."' ");
		}
		header("location:"."sail.php");
	}	
?>