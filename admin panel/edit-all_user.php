<?php
				include "includes/header.php";
				$data=[];

				$act = $_GET['act'];
				if($act == "edit") {
					$id = $_GET['id'];
					$all_user = getById("all_user", $id);
				}
				?>

				<form method="post" action="save.php" enctype='multipart/form-data'>
					<fieldset>
						<legend class="hidden-first">Add New All_user</legend>
						<input name="cat" type="hidden" value="all_user">
						<input name="id" type="hidden" value="<?=$id?>">
						<input name="act" type="hidden" value="<?=$act?>">
				
							<label>User email</label>
							<input class="form-control" type="text" name="user_email" value="<?=$all_user['user_email']?>" /><br>
							
							<label>User password</label>
							<input class="form-control" type="text" name="user_password" value="<?=$all_user['user_password']?>" /><br>
							
							<label>User date</label>
							<input class="form-control" type="text" name="user_date" value="<?=$all_user['user_date']?>" /><br>
							<br>
					<input type="submit" value=" Save " class="btn btn-success">
					</form>
					<?php include "includes/footer.php";?>
				