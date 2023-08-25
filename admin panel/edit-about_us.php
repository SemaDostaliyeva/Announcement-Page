<?php
	include "includes/header.php";
	$data=[];

	$act = $_GET['act'];
	if($act == "edit") {
		$id = $_GET['id'];
		$about_us = mysqli_fetch_assoc(mysqli_query($link, "SELECT * FROM `about_us` where `about_us_id` = '{$id}'"));
	}
	?>

	<form method="post" action="save.php" enctype='multipart/form-data'>
		<fieldset>
			<legend class="hidden-first">Add New About_us</legend>
			<input name="cat" type="hidden" value="about_us">
			<input name="id" type="hidden" value="<?=$id?>">
			<input name="act" type="hidden" value="<?=$act?>">

				<label>About header</label>
				<input class="form-control" type="text" name="about_header" value="<?=$about_us['about_header']?>" /><br>
				
				<label>About paragraph</label>
				<input class="form-control" type="text" name="about_paragraph" value="<?=$about_us['about_paragraph']?>" /><br>
				
				<label>Card1 count</label>
				<input class="form-control" type="text" name="card1_count" value="<?=$about_us['card1_count']?>" /><br>
				
				<label>Card2 count</label>
				<input class="form-control" type="text" name="card2_count" value="<?=$about_us['card2_count']?>" /><br>
				
				<label>Card3 count</label>
				<input class="form-control" type="text" name="card3_count" value="<?=$about_us['card3_count']?>" /><br>
				
				<label>Card4 count</label>
				<input class="form-control" type="text" name="card4_count" value="<?=$about_us['card4_count']?>" /><br>
				
				<label>Office adress</label>
				<input class="form-control" type="text" name="office_adress" value="<?=$about_us['office_adress']?>" /><br>

				<label>Email</label>
				<input class="form-control" type="text" name="email" value="<?=$about_us['email']?>" /><br>
				<br>
		<input type="submit" value=" Save " class="btn btn-success">
		</form>
		<?php include "includes/footer.php";?>
				