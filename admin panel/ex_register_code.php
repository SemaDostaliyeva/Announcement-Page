<?php
	include "includes/header.php";
?>

	<h1>Ex_register_code</h1>
	<p>This table includes <?php echo counting("ex_register_code", "id");?> ex_register_code.</p>

	<table id="sorted" class="table table-striped table-bordered">
	<thead>
	<tr>
		<th>Id</th>
		<th>Email</th>
		<th>Ex register code date</th>
		<th>Register code</th>
		<th class="not">Delete</th>
	</tr>
	</thead>
	<?php
	$ex_register_code = getAll("ex_register_code");
	if($ex_register_code) foreach ($ex_register_code as $ex_register_codes):
	?>
	<tr>
		<td><?php echo $ex_register_codes['ex_register_code_id']?></td>
		<td><?php echo $ex_register_codes['email']?></td>
		<td><?php echo $ex_register_codes['ex_register_code_date']?></td>
		<td><?php echo $ex_register_codes['register_code']?></td>
		<td><a href="save.php?act=delete&id=<?php echo $ex_register_codes['ex_register_code_id']?>&cat=ex_register_code" onclick="return navConfirm(this.href);"><i class="glyphicon glyphicon-trash"></i></a></td>
		</tr>
	<?php endforeach; ?>
	</table>
	<?php include "includes/footer.php";?>
				