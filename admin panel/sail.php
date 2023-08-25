<?php
	include "includes/header.php";
?>

	<h1>Sail</h1>
	<p>This table includes <?php echo counting("sail", "id");?> sail.</p>

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
		<th>Sail status</th>
		<th>Sot</th>
		<th>Flat area</th>
		<th>Room count</th>
		<th>Fix type</th>
		<th>Adress</th>
		<th>Info</th>
		<th class="not">Delete</th>
	</tr>
	</thead>

	<?php
	$sail = getAll("sail");
	if($sail) foreach ($sail as $sails):
	?>
	<tr>
		<td><?php echo $sails['announcement_id']?></td>
		<td><?php echo $sails['add_date']?></td>
		<td><?php echo $sails['users_id']?></td>
		<td><?php echo $sails['fullname']?></td>
		<td><?php echo $sails['phone']?></td>
		<td><?php echo $sails['email']?></td>
		<td><?php echo $sails['image1']?></td>
		<td><?php echo $sails['image2']?></td>
		<td><?php echo $sails['image3']?></td>
		<td><?php echo $sails['image4']?></td>
		<td><?php echo $sails['image5']?></td>
		<td><?php echo $sails['image6']?></td>
		<td><?php echo $sails['image7']?></td>
		<td><?php echo $sails['image8']?></td>
		<td><?php echo $sails['image9']?></td>
		<td><?php echo $sails['image10']?></td>
		<td><?php echo $sails['image11']?></td>
		<td><?php echo $sails['image12']?></td>
		<td><?php echo $sails['cost']?></td>
		<td><?php echo $sails['region']?></td>
		<td><?php echo $sails['kend']?></td>
		<td><?php echo $sails['baku_region']?></td>
		<td><?php echo $sails['person_type']?></td>
		<td><?php echo $sails['area_type']?></td>
		<td><?php echo $sails['flat_type']?></td>
		<td><?php echo $sails['sail_status']?></td>
		<td><?php echo $sails['sot']?></td>
		<td><?php echo $sails['flat_area']?></td>
		<td><?php echo $sails['room_count']?></td>
		<td><?php echo $sails['fix_type']?></td>
		<td><?php echo $sails['adress']?></td>
		<td><?php echo $sails['info']?></td>
		<td><a href="save.php?act=delete&id=<?php echo $sails['announcement_id']?>&cat=sail" onclick="return navConfirm(this.href);"><i class="glyphicon glyphicon-trash"></i></a></td>
	</tr>
	<?php endforeach; ?>
	</table>
	<?php include "includes/footer.php";?>
				