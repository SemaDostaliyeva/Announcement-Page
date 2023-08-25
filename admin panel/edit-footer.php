<?php
				include "includes/header.php";
				$data=[];

				$act = $_GET['act'];
				if($act == "edit") {
					$id = $_GET['id'];
					$footer = mysqli_fetch_assoc(mysqli_query($link, "SELECT * FROM `footer` where `footer_id` = '{$id}'"));
				}
				?>

				<form method="post" action="save.php" enctype='multipart/form-data'>
					<fieldset>
						<legend class="hidden-first">Add New Footer</legend>
						<input name="cat" type="hidden" value="footer">
						<input name="id" type="hidden" value="<?=$id?>">
						<input name="act" type="hidden" value="<?=$act?>">
				
							<label>Footer title</label>
							<input class="form-control" type="text" name="footer_title" value="<?=$footer['footer_title']?>" /><br>
							
							<label>Footer paragraph</label>
							<input class="form-control" type="text" name="footer_paragraph" value="<?=$footer['footer_paragraph']?>" /><br>
							
							<label>Site name</label>
							<input class="form-control" type="text" name="site_name" value="<?=$footer['site_name']?>" /><br>
							
							<label>Footer adress</label>
							<input class="form-control" type="text" name="footer_adress" value="<?=$footer['footer_adress']?>" /><br>
							
							<label>Footer phone</label>
							<input class="form-control" type="text" name="footer_phone" value="<?=$footer['footer_phone']?>" /><br>
							
							<label>Footer email</label>
							<input class="form-control" type="text" name="footer_email" value="<?=$footer['footer_email']?>" /><br>
							<br>
					<input type="submit" value=" Save " class="btn btn-success">
					</form>
					<?php include "includes/footer.php";?>
				