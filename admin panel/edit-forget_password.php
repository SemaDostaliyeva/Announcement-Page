<?php
				include "includes/header.php";
				$data=[];

				$act = $_GET['act'];
				if($act == "edit") {
					$id = $_GET['id'];
					$forget_password = getById("forget_password", $id);
				}
				?>

				<form method="post" action="save.php" enctype='multipart/form-data'>
					<fieldset>
						<legend class="hidden-first">Add New Forget_password</legend>
						<input name="cat" type="hidden" value="forget_password">
						<input name="id" type="hidden" value="<?=$id?>">
						<input name="act" type="hidden" value="<?=$act?>">
				
							<label>Forget code</label>
							<input class="form-control" type="text" name="forget_code" value="<?=$forget_password['forget_code']?>" /><br>
							
							<label>Forget date</label>
							<input class="form-control" type="text" name="forget_date" value="<?=$forget_password['forget_date']?>" /><br>
							
							<label>Email</label>
							<input class="form-control" type="text" name="email" value="<?=$forget_password['email']?>" /><br>
							<br>
					<input type="submit" value=" Save " class="btn btn-success">
					</form>
					<?php include "includes/footer.php";?>
				