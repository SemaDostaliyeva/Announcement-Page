<?php
	include "includes/header.php";
	?>

	<h1>Rent</h1>
	<p>This table includes <?php echo counting("rent", "id");?> rent.</p>

	<table id="sorted" class="table table-striped table-bordered">
	<thead>
	<tr>
		<th>Announcement id</th>
		<th>Add date</th>
		<th>Users id</th>
		<th>Fullname</th>
		<th>Phone</th>
		<th>Email</th>
		<th>Image1</th>
		<th>Image2</th>
		<th>Image3</th>
		<th>Image4</th>
		<th>Image5</th>
		<th>Image6</th>
		<th>Image7</th>
		<th>Image8</th>
		<th>Image9</th>
		<th>Image10</th>
		<th>Image11</th>
		<th>Image12</th>
		<th>Cost</th>
		<th>Region</th>
		<th>Kend</th>
		<th>Baku region</th>
		<th>Person type</th>
		<th>Area type</th>
		<th>Flat type</th>
		<th>Sot</th>
		<th>Flat area</th>
		<th>Room count</th>
		<th>Fix type</th>
		<th>Adress</th>
		<th>Info</th>
		<th>Rent status</th>
		<th>Dayly monthly</th>
	<th class="not">Delete</th>
	</tr>
	</thead>

	<?php
	$rent = getAll("rent");
	if($rent) foreach ($rent as $rents):
	?>
	<tr>
		<td><?php echo $rents['announcement_id']?></td>
		<td><?php echo $rents['add_date']?></td>
		<td><?php echo $rents['users_id']?></td>
		<td><?php echo $rents['fullname']?></td>
		<td><?php echo $rents['phone']?></td>
		<td><?php echo $rents['email']?></td>
		<td><?php echo $rents['image1']?></td>
		<td><?php echo $rents['image2']?></td>
		<td><?php echo $rents['image3']?></td>
		<td><?php echo $rents['image4']?></td>
		<td><?php echo $rents['image5']?></td>
		<td><?php echo $rents['image6']?></td>
		<td><?php echo $rents['image7']?></td>
		<td><?php echo $rents['image8']?></td>
		<td><?php echo $rents['image9']?></td>
		<td><?php echo $rents['image10']?></td>
		<td><?php echo $rents['image11']?></td>
		<td><?php echo $rents['image12']?></td>
		<td><?php echo $rents['cost']?></td>
		<td><?php echo $rents['region']?></td>
		<td><?php echo $rents['kend']?></td>
		<td><?php echo $rents['baku_region']?></td>
		<td><?php echo $rents['person_type']?></td>
		<td><?php echo $rents['area_type']?></td>
		<td><?php echo $rents['flat_type']?></td>
		<td><?php echo $rents['sot']?></td>
		<td><?php echo $rents['flat_area']?></td>
		<td><?php echo $rents['room_count']?></td>
		<td><?php echo $rents['fix_type']?></td>
		<td><?php echo $rents['adress']?></td>
		<td><?php echo $rents['info']?></td>
		<td><?php echo $rents['rent_status']?></td>
		<td><?php echo $rents['dayly_monthly']?></td>
		<td><a href="save.php?act=delete&id=<?php echo $rents['announcement_id']?>&cat=rent" onclick="return navConfirm(this.href);"><i class="glyphicon glyphicon-trash"></i></a></td>
	</tr>
	<?php endforeach; ?>
	</table>
	<?php include "includes/footer.php";?>
				