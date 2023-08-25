<?php
				include "includes/header.php";
				$data=[];

				$act = $_GET['act'];
				if($act == "edit") {
					$id = $_GET['id'];
					$register_user = getById("register_user", $id);
				}
				?>

				<form method="post" action="save.php" enctype='multipart/form-data'>
					<fieldset>
						<legend class="hidden-first">Add New Register_user</legend>
						<input name="cat" type="hidden" value="register_user">
						<input name="id" type="hidden" value="<?=$id?>">
						<input name="act" type="hidden" value="<?=$act?>">
				
							<label>User email</label>
							<input class="form-control" type="text" name="user_email" value="<?=$register_user['user_email']?>" /><br>
							
							<label>User password</label>
							<input class="form-control" type="text" name="user_password" value="<?=$register_user['user_password']?>" /><br>
							
							<label>Register date</label>
							<input class="form-control" type="text" name="register_date" value="<?=$register_user['register_date']?>" /><br>
							
							<label>Random code</label>
							<input class="form-control" type="text" name="random_code" value="<?=$register_user['random_code']?>" /><br>
							<br>
					<input type="submit" value=" Save " class="btn btn-success">
					</form>
					<?php include "includes/footer.php";?>
				