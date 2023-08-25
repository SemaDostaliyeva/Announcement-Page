<?php
	include "includes/header.php";
	?>

	<h1>Bin</h1>
	<p>This table includes <?php echo counting("bin", "id");?> bin.</p>

	<table id="sorted" class="table table-striped table-bordered">
	<thead>
	<tr>
		<th>Announcement id</th>
		<th>Add date</th>
		<th>Users id</th>
		<th>Fullname</th>
		<th>Phone</th>
		<th>Email</th>
		<th>Sail ztype</th>
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
		<th>Village</th>
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
		<th>Dayly monthly</th>
		<th class="not">OK</th>
		<th class="not">Delete</th>
	</tr>
	</thead>

	<?php
	$bin = getAll("bin");
	if($bin) foreach ($bin as $bins):
	?>
	<tr>
		<td><?php echo $bins['announcement_id']?></td>
		<td><?php echo $bins['add_date']?></td>
		<td><?php echo $bins['users_id']?></td>
		<td><?php echo $bins['fullname']?></td>
		<td><?php echo $bins['phone']?></td>
		<td><?php echo $bins['email']?></td>
		<td><?php echo $bins['sail_type']?></td>
		<td><?php echo $bins['image1']?></td>
		<td><?php echo $bins['image2']?></td>
		<td><?php echo $bins['image3']?></td>
		<td><?php echo $bins['image4']?></td>
		<td><?php echo $bins['image5']?></td>
		<td><?php echo $bins['image6']?></td>
		<td><?php echo $bins['image7']?></td>
		<td><?php echo $bins['image8']?></td>
		<td><?php echo $bins['image9']?></td>
		<td><?php echo $bins['image10']?></td>
		<td><?php echo $bins['image11']?></td>
		<td><?php echo $bins['image12']?></td>
		<td><?php echo $bins['cost']?></td>
		<td><?php echo $bins['region']?></td>
		<td><?php echo $bins['kend']?></td>
		<td><?php echo $bins['baku_region']?></td>
		<td><?php echo $bins['person_type']?></td>
		<td><?php echo $bins['area_type']?></td>
		<td><?php echo $bins['flat_type']?></td>
		<td><?php echo $bins['sot']?></td>
		<td><?php echo $bins['flat_area']?></td>
		<td><?php echo $bins['room_count']?></td>
		<td><?php echo $bins['fix_type']?></td>
		<td><?php echo $bins['adress']?></td>
		<td><?php echo $bins['info']?></td>
		<td><?php echo $bins['dayly_monthly']?></td>


		<td><a href="edit-bin.php?act=edit&id=<?php echo $bins['announcement_id']?>">OK</a></td>
		<td><a href="save.php?act=delete&id=<?php echo $bins['announcement_id']?>&cat=bin" onclick="return navConfirm(this.href);"><i class="glyphicon glyphicon-trash"></i></a></td>
		</tr>
	<?php endforeach; ?>
	</table>
	<?php include "includes/footer.php";?>
