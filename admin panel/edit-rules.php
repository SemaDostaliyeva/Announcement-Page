<?php
				include "includes/header.php";
				$data=[];

				$act = $_GET['act'];
				if($act == "edit") {
					$id = $_GET['id'];
					$rules = mysqli_fetch_assoc(mysqli_query($link, "SELECT * FROM `rules` where `rules_id` = '{$id}'"));

				}
				?>

				<form method="post" action="save.php" enctype='multipart/form-data'>
					<fieldset>
						<legend class="hidden-first">Add New Rules</legend>
						<input name="cat" type="hidden" value="rules">
						<input name="id" type="hidden" value="<?=$id?>">
						<input name="act" type="hidden" value="<?=$act?>">
				
							<label>Rules1</label>
							<input class="form-control" type="text" name="rules1" value="<?=$rules['rules1']?>" /><br>
							
							<label>Rules2</label>
							<input class="form-control" type="text" name="rules2" value="<?=$rules['rules2']?>" /><br>
							
							<label>Rules3</label>
							<input class="form-control" type="text" name="rules3" value="<?=$rules['rules3']?>" /><br>
							
							<label>Rules4</label>
							<input class="form-control" type="text" name="rules4" value="<?=$rules['rules4']?>" /><br>
							
							<label>Rules5</label>
							<input class="form-control" type="text" name="rules5" value="<?=$rules['rules5']?>" /><br>
							<br>
					<input type="submit" value=" Save " class="btn btn-success">
					</form>
					<?php include "includes/footer.php";?>
				