<?php
				include "includes/header.php";
				$data=[];

				$act = $_GET['act'];
				if($act == "edit") {
					$id = $_GET['id'];
					$rent = getById("rent", $id);
				}
				?>

				<form method="post" action="save.php" enctype='multipart/form-data'>
					<fieldset>
						<legend class="hidden-first">Add New Rent</legend>
						<input name="cat" type="hidden" value="rent">
						<input name="id" type="hidden" value="<?=$id?>">
						<input name="act" type="hidden" value="<?=$act?>">
				
							<label>Add date</label>
							<input class="form-control" type="text" name="add_date" value="<?=$rent['add_date']?>" /><br>
							
							<label>Users id</label>
							<input class="form-control" type="text" name="users_id" value="<?=$rent['users_id']?>" /><br>
							
							<label>Fullname</label>
							<input class="form-control" type="text" name="fullname" value="<?=$rent['fullname']?>" /><br>
							
							<label>Phone</label>
							<input class="form-control" type="text" name="phone" value="<?=$rent['phone']?>" /><br>
							
							<label>Email</label>
							<input class="form-control" type="text" name="email" value="<?=$rent['email']?>" /><br>
							
							<label>Image1</label>
							<input class="form-control" type="text" name="image1" value="<?=$rent['image1']?>" /><br>
							
							<label>Image2</label>
							<input class="form-control" type="text" name="image2" value="<?=$rent['image2']?>" /><br>
							
							<label>Image3</label>
							<input class="form-control" type="text" name="image3" value="<?=$rent['image3']?>" /><br>
							
							<label>Image4</label>
							<input class="form-control" type="text" name="image4" value="<?=$rent['image4']?>" /><br>
							
							<label>Image5</label>
							<input class="form-control" type="text" name="image5" value="<?=$rent['image5']?>" /><br>
							
							<label>Image6</label>
							<input class="form-control" type="text" name="image6" value="<?=$rent['image6']?>" /><br>
							
							<label>Image7</label>
							<input class="form-control" type="text" name="image7" value="<?=$rent['image7']?>" /><br>
							
							<label>Image8</label>
							<input class="form-control" type="text" name="image8" value="<?=$rent['image8']?>" /><br>
							
							<label>Image9</label>
							<input class="form-control" type="text" name="image9" value="<?=$rent['image9']?>" /><br>
							
							<label>Image10</label>
							<input class="form-control" type="text" name="image10" value="<?=$rent['image10']?>" /><br>
							
							<label>Image11</label>
							<input class="form-control" type="text" name="image11" value="<?=$rent['image11']?>" /><br>
							
							<label>Image12</label>
							<input class="form-control" type="text" name="image12" value="<?=$rent['image12']?>" /><br>
							
							<label>Cost</label>
							<input class="form-control" type="text" name="cost" value="<?=$rent['cost']?>" /><br>
							
							<label>Region</label>
							<input class="form-control" type="text" name="region" value="<?=$rent['region']?>" /><br>
							
							<label>Kend</label>
							<input class="form-control" type="text" name="kend" value="<?=$rent['kend']?>" /><br>
							
							<label>Baku region</label>
							<input class="form-control" type="text" name="baku_region" value="<?=$rent['baku_region']?>" /><br>
							
							<label>Person type</label>
							<input class="form-control" type="text" name="person_type" value="<?=$rent['person_type']?>" /><br>
							
							<label>Area type</label>
							<input class="form-control" type="text" name="area_type" value="<?=$rent['area_type']?>" /><br>
							
							<label>Flat type</label>
							<input class="form-control" type="text" name="flat_type" value="<?=$rent['flat_type']?>" /><br>
							
							<label>Sot</label>
							<input class="form-control" type="text" name="sot" value="<?=$rent['sot']?>" /><br>
							
							<label>Flat area</label>
							<input class="form-control" type="text" name="flat_area" value="<?=$rent['flat_area']?>" /><br>
							
							<label>Room count</label>
							<input class="form-control" type="text" name="room_count" value="<?=$rent['room_count']?>" /><br>
							
							<label>Fix type</label>
							<input class="form-control" type="text" name="fix_type" value="<?=$rent['fix_type']?>" /><br>
							
							<label>Adress</label>
							<input class="form-control" type="text" name="adress" value="<?=$rent['adress']?>" /><br>
							
							<label>Info</label>
							<input class="form-control" type="text" name="info" value="<?=$rent['info']?>" /><br>
							
							<label>Rent status</label>
							<input class="form-control" type="text" name="rent_status" value="<?=$rent['rent_status']?>" /><br>
							
							<label>Dayly monthly</label>
							<input class="form-control" type="text" name="dayly_monthly" value="<?=$rent['dayly_monthly']?>" /><br>
							<br>
					<input type="submit" value=" Save " class="btn btn-success">
					</form>
					<?php include "includes/footer.php";?>
				