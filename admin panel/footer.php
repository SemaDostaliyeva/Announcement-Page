<?php
	include "includes/header.php";
	?>

	<h1>Footer</h1>
	<p>This table includes <?php echo counting("footer", "id");?> footer.</p>

	<table id="sorted" class="table table-striped table-bordered">
	<thead>
	<tr>
		<th>Id</th>
		<th>Footer title</th>
		<th>Footer paragraph</th>
		<th>Site name</th>
		<th>Footer adress</th>
		<th>Footer phone</th>
		<th>Footer email</th>
		<th class="not">Edit</th>
	</tr>
	</thead>

	<?php
	$footer = getAll("footer");
	if($footer) foreach ($footer as $footers):
	?>
	<tr>
		<td><?php echo $footers['footer_id']?></td>
		<td><?php echo $footers['footer_title']?></td>
		<td><?php echo $footers['footer_paragraph']?></td>
		<td><?php echo $footers['site_name']?></td>
		<td><?php echo $footers['footer_adress']?></td>
		<td><?php echo $footers['footer_phone']?></td>
		<td><?php echo $footers['footer_email']?></td>

		<td><a href="edit-footer.php?act=edit&id=<?php echo $footers['footer_id']?>"> <i class="glyphicon glyphicon-edit"></i></a></td>
		</tr>
	<?php endforeach; ?>
	</table>
	<?php include "includes/footer.php";?>
				