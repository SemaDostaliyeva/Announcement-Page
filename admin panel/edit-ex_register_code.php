<?php
				include "includes/header.php";
				$data=[];

				$act = $_GET['act'];
				if($act == "edit") {
					$id = $_GET['id'];
					$ex_register_code = getById("ex_register_code", $id);
				}
				?>

				<form method="post" action="save.php" enctype='multipart/form-data'>
					<fieldset>
						<legend class="hidden-first">Add New Ex_register_code</legend>
						<input name="cat" type="hidden" value="ex_register_code">
						<input name="id" type="hidden" value="<?=$id?>">
						<input name="act" type="hidden" value="<?=$act?>">
				
							<label>Email</label>
							<input class="form-control" type="text" name="email" value="<?=$ex_register_code['email']?>" /><br>
							
							<label>Ex register code date</label>
							<input class="form-control" type="text" name="ex_register_code_date" value="<?=$ex_register_code['ex_register_code_date']?>" /><br>
							
							<label>Register code</label>
							<input class="form-control" type="text" name="register_code" value="<?=$ex_register_code['register_code']?>" /><br>
							<br>
					<input type="submit" value=" Save " class="btn btn-success">
					</form>
					<?php include "includes/footer.php";?>
				