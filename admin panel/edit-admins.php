<?php
				include "includes/header.php";
				$data=[];

				$act = $_GET['act'];
				if($act == "edit") {
					$id = $_GET['id'];
					$admins = getById("admins", $id);
				}
				?>

				<form method="post" action="save.php" enctype='multipart/form-data'>
					<fieldset>
						<legend class="hidden-first">Add New Admins</legend>
						<input name="cat" type="hidden" value="admins">
						<input name="id" type="hidden" value="<?=$id?>">
						<input name="act" type="hidden" value="<?=$act?>">
				
							<label>Name</label>
							<input class="form-control" type="text" name="name" value="<?=$admins['name']?>" /><br>
							
							<label>Email</label>
							<input class="form-control" type="text" name="email" value="<?=$admins['email']?>" /><br>
							
							<label>Password</label>
							<input class="form-control" type="text" name="password" value="<?=$admins['password']?>" <?=($act == "edit")? "readonly" :"" ;?> /><br>
							
							<label>Role</label>
							<input class="form-control" type="text" name="role" value="<?=$admins['role']?>" /><br>
							<br>
					<input type="submit" value=" Save " class="btn btn-success">
					</form>
					<?php include "includes/footer.php";?>
				