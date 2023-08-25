<?php
	include "includes/header.php";
	?>

	<h1>Rules</h1>
	<p>This table includes <?php echo counting("rules", "id");?> rules.</p>

	<table id="sorted" class="table table-striped table-bordered">
	<thead>
	<tr>
		<th>Id</th>
		<th>Rules1</th>
		<th>Rules2</th>
		<th>Rules3</th>
		<th>Rules4</th>
		<th>Rules5</th>
		<th class="not">Edit</th>
	</tr>
	</thead>

	<?php
	$rules = getAll("rules");
	if($rules) foreach ($rules as $ruless):
	?>
	<tr>
		<td><?php echo $ruless['rules_id']?></td>
		<td><?php echo $ruless['rules1']?></td>
		<td><?php echo $ruless['rules2']?></td>
		<td><?php echo $ruless['rules3']?></td>
		<td><?php echo $ruless['rules4']?></td>
		<td><?php echo $ruless['rules5']?></td>
		<td><a href="edit-rules.php?act=edit&id=<?php echo $ruless['rules_id']?>"><i class="glyphicon glyphicon-edit"></i></a></td>
	</tr>
	<?php endforeach; ?>
	</table>
	<?php include "includes/footer.php";?>
				