<?php
				include "includes/header.php";
				$data=[];

				$act = $_GET['act'];
				if($act == "edit") {
					$id = $_GET['id'];
					$changed_passwords = getById("changed_passwords", $id);
				}
				?>

				<form method="post" action="save.php" enctype='multipart/form-data'>
					<fieldset>
						<legend class="hidden-first">Add New Changed_passwords</legend>
						<input name="cat" type="hidden" value="changed_passwords">
						<input name="id" type="hidden" value="<?=$id?>">
						<input name="act" type="hidden" value="<?=$act?>">
				
							<label>Email</label>
							<input class="form-control" type="text" name="email" value="<?=$changed_passwords['email']?>" /><br>
							
							<label>Change date</label>
							<input class="form-control" type="text" name="change_date" value="<?=$changed_passwords['change_date']?>" /><br>
							
							<label>Forget code</label>
							<input class="form-control" type="text" name="forget_code" value="<?=$changed_passwords['forget_code']?>" /><br>
							
							<label>Ex password</label>
							<input class="form-control" type="text" name="ex_password" value="<?=$changed_passwords['ex_password']?>" /><br>
							
							<label>New password</label>
							<input class="form-control" type="text" name="new_password" value="<?=$changed_passwords['new_password']?>" /><br>
							<br>
					<input type="submit" value=" Save " class="btn btn-success">
					</form>
					<?php include "includes/footer.php";?>
				