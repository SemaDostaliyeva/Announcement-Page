<?php
	include("includes/connect.php");
	include("includes/data.php");

	$act = $_GET['act'];
	if($act == "edit") {
		$id = $_GET['id'];
		$bin_query = "SELECT * FROM `bin` where announcement_id = '".$id."';";
		$run_bin = mysqli_query($link , $bin_query);
		$bin = mysqli_fetch_assoc($run_bin);
	}

	$add_date = $bin["add_date"];
	$users_id = $bin["users_id"];
	$fullname = $bin["fullname"] ;
	$phone = $bin["phone"] ;
	$email = $bin["email"] ;
	$image1 = $bin["image1"] ;
	$image2 = $bin["image2"] ;
	$image3 = $bin["image3"] ;
	$image4 = $bin["image4"] ;
	$image5 = $bin["image5"] ;
	$image6 = $bin["image6"] ;
	$image7 = $bin["image7"] ;
	$image8 = $bin["image8"] ;
	$image9 = $bin["image9"] ;
	$image10 = $bin["image10"] ;
	$image11 = $bin["image11"] ;
	$image12 = $bin["image12"] ;
	$cost = $bin["cost"] ;
	$region = $bin["region"] ;
	$kend = $bin["kend"] ;
	$baku_region = $bin["baku_region"] ;
	$person_type = $bin["person_type"] ;
	$area_type = $bin["area_type"] ;
	$flat_type = $bin["flat_type"] ;
	$sot = $bin["sot"] ;
	$flat_area = $bin["flat_area"] ;
	$room_count = $bin["room_count"] ;
	$fix_type = $bin["fix_type"] ;
	$adress = $bin["adress"] ;
	$info = $bin["info"] ;
	$dayly_monthly = $bin["dayly_monthly"] ;

if($act == "edit"){

	if($bin['sail_type'] == "1"){
		mysqli_query($link, "INSERT INTO `sail` (  `announcement_id` , `add_date` , `users_id` , `fullname` , `phone` , `email` , `image1` , `image2` , `image3` , `image4` , `image5` , `image6` , `image7` , `image8` , `image9` , `image10` , `image11` , `image12` , `cost` , `region` , `kend` , `baku_region` , `person_type` , `area_type` , `flat_type` , `sot` , `flat_area` , `room_count` , `fix_type` , `adress` , `info` ) VALUES ( '".$id."' , '".$add_date."' , '".$users_id."' , '".$fullname."' , '".$phone."' , '".$email."' , '".$image1."' , '".$image2."' , '".$image3."' , '".$image4."' , '".$image5."' , '".$image6."' , '".$image7."' , '".$image8."' , '".$image9."' , '".$image10."' , '".$image11."' , '".$image12."' , '".$cost."' , '".$region."' , '".$kend."' , '".$baku_region."' , '".$person_type."' , '".$area_type."' , '".$flat_type."' , '".$sot."' , '".$flat_area."' , '".$room_count."' , '".$fix_type."' , '".$adress."' , '".$info."' ) ");
	}

	if($bin['sail_type'] == "2"){
		mysqli_query($link, "INSERT INTO `rent` (  `announcement_id` , `add_date` , `users_id` , `fullname` , `phone` , `email` , `image1` , `image2` , `image3` , `image4` , `image5` , `image6` , `image7` , `image8` , `image9` , `image10` , `image11` , `image12` , `cost` , `region` , `kend` , `baku_region` , `person_type` , `area_type` , `flat_type` , `sot` , `flat_area` , `room_count` , `fix_type` , `adress` , `info` , `dayly_monthly` ) VALUES ( '".$id."' , '".$add_date."' , '".$users_id."' , '".$fullname."' , '".$phone."' , '".$email."' , '".$image1."' , '".$image2."' , '".$image3."' , '".$image4."' , '".$image5."' , '".$image6."' , '".$image7."' , '".$image8."' , '".$image9."' , '".$image10."' , '".$image11."' , '".$image12."' , '".$cost."' , '".$region."' , '".$kend."' , '".$baku_region."' , '".$person_type."' , '".$area_type."' , '".$flat_type."' , '".$sot."' , '".$flat_area."' , '".$room_count."' , '".$fix_type."' , '".$adress."' , '".$info."' ,'".$dayly_monthly."' ) ");
	}

	mysqli_query($link, "DELETE FROM `bin` WHERE announcement_id = '".$id."' ");
}
header("Location: bin.php");
?>
			