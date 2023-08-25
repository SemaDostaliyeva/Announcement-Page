<?php
				include "includes/header.php";
				$data=[];

				$act = $_GET['act'];
				if($act == "edit") {
					$id = $_GET['id'];
					$sail = getById("sail", $id);
				}
				?>

				<form method="post" action="save.php" enctype='multipart/form-data'>
					<fieldset>
						<legend class="hidden-first">Add New Sail</legend>
						<input name="cat" type="hidden" value="sail">
						<input name="id" type="hidden" value="<?=$id?>">
						<input name="act" type="hidden" value="<?=$act?>">
				
							<label>Add date</label>
							<input class="form-control" type="text" name="add_date" value="<?=$sail['add_date']?>" /><br>
							
							<label>Users id</label>
							<input class="form-control" type="text" name="users_id" value="<?=$sail['users_id']?>" /><br>
							
							<label>Fullname</label>
							<input class="form-control" type="text" name="fullname" value="<?=$sail['fullname']?>" /><br>
							
							<label>Phone</label>
							<input class="form-control" type="text" name="phone" value="<?=$sail['phone']?>" /><br>
							
							<label>Email</label>
							<input class="form-control" type="text" name="email" value="<?=$sail['email']?>" /><br>
							
							<label>Image1</label>
							<input class="form-control" type="text" name="image1" value="<?=$sail['image1']?>" /><br>
							
							<label>Image2</label>
							<input class="form-control" type="text" name="image2" value="<?=$sail['image2']?>" /><br>
							
							<label>Image3</label>
							<input class="form-control" type="text" name="image3" value="<?=$sail['image3']?>" /><br>
							
							<label>Image4</label>
							<input class="form-control" type="text" name="image4" value="<?=$sail['image4']?>" /><br>
							
							<label>Image5</label>
							<input class="form-control" type="text" name="image5" value="<?=$sail['image5']?>" /><br>
							
							<label>Image6</label>
							<input class="form-control" type="text" name="image6" value="<?=$sail['image6']?>" /><br>
							
							<label>Image7</label>
							<input class="form-control" type="text" name="image7" value="<?=$sail['image7']?>" /><br>
							
							<label>Image8</label>
							<input class="form-control" type="text" name="image8" value="<?=$sail['image8']?>" /><br>
							
							<label>Image9</label>
							<input class="form-control" type="text" name="image9" value="<?=$sail['image9']?>" /><br>
							
							<label>Image10</label>
							<input class="form-control" type="text" name="image10" value="<?=$sail['image10']?>" /><br>
							
							<label>Image11</label>
							<input class="form-control" type="text" name="image11" value="<?=$sail['image11']?>" /><br>
							
							<label>Image12</label>
							<input class="form-control" type="text" name="image12" value="<?=$sail['image12']?>" /><br>
							
							<label>Cost</label>
							<input class="form-control" type="text" name="cost" value="<?=$sail['cost']?>" /><br>
							
							<label>Region</label>
							<input class="form-control" type="text" name="region" value="<?=$sail['region']?>" /><br>
							
							<label>Kend</label>
							<input class="form-control" type="text" name="kend" value="<?=$sail['kend']?>" /><br>
							
							<label>Baku region</label>
							<input class="form-control" type="text" name="baku_region" value="<?=$sail['baku_region']?>" /><br>
							
							<label>Person type</label>
							<input class="form-control" type="text" name="person_type" value="<?=$sail['person_type']?>" /><br>
							
							<label>Area type</label>
							<input class="form-control" type="text" name="area_type" value="<?=$sail['area_type']?>" /><br>
							
							<label>Flat type</label>
							<input class="form-control" type="text" name="flat_type" value="<?=$sail['flat_type']?>" /><br>
							
							<label>Sail status</label>
							<input class="form-control" type="text" name="sail_status" value="<?=$sail['sail_status']?>" /><br>
							
							<label>Sot</label>
							<input class="form-control" type="text" name="sot" value="<?=$sail['sot']?>" /><br>
							
							<label>Flat area</label>
							<input class="form-control" type="text" name="flat_area" value="<?=$sail['flat_area']?>" /><br>
							
							<label>Room count</label>
							<input class="form-control" type="text" name="room_count" value="<?=$sail['room_count']?>" /><br>
							
							<label>Fix type</label>
							<input class="form-control" type="text" name="fix_type" value="<?=$sail['fix_type']?>" /><br>
							
							<label>Adress</label>
							<input class="form-control" type="text" name="adress" value="<?=$sail['adress']?>" /><br>
							
							<label>Info</label>
							<input class="form-control" type="text" name="info" value="<?=$sail['info']?>" /><br>
							<br>
					<input type="submit" value=" Save " class="btn btn-success">
					</form>
					<?php include "includes/footer.php";?>
				