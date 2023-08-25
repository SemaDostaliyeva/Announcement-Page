<?php
	include "includes/header.php";
	?>

	<h1>About_us</h1>
	<p>This table includes <?php echo counting("about_us", "id");?> about_us.</p>

	<table id="sorted" class="table table-striped table-bordered">
	<thead>
	<tr>
		<th>Id</th>
		<th>About header</th>
		<th>About paragraph</th>
		<th>Announcement count</th>
		<th>Sail announcement count</th>
		<th>Rent announcement count</th>
		<th>Active users</th>
		<th>Office adress</th>
		<th>Email</th>
		<th class="not">Edit</th>
	</tr>
	</thead>

	<?php
	$about_us = getAll("about_us");
	if($about_us) foreach ($about_us as $about_uss):
		?>
	<tr>
		<td><?php echo $about_uss['about_us_id']?></td>
		<td><?php echo $about_uss['about_header']?></td>
		<td><?php echo $about_uss['about_paragraph']?></td>
		<td><?php echo $about_uss['card1_count']?></td>
		<td><?php echo $about_uss['card2_count']?></td>
		<td><?php echo $about_uss['card3_count']?></td>
		<td><?php echo $about_uss['card4_count']?></td>
		<td><?php echo $about_uss['office_adress']?></td>
		<td><?php echo $about_uss['email']?></td>
		<td><a href="edit-about_us.php?act=edit&id=<?php echo $about_uss['about_us_id']?>"><i class="glyphicon glyphicon-edit"></i></a></td>
	</tr>
	<?php endforeach; ?>
</table>
<?php include "includes/footer.php";?>
	