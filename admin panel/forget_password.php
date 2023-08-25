<?php include "includes/header.php"; ?>

<h1>Forget_password</h1>
<p>This table includes <?php echo counting("forget_password", "id");?> forget_password.</p>

<table id="sorted" class="table table-striped table-bordered">
	<thead>
		<tr>
			<th>Id</th>
			<th>Forget code</th>
			<th>Forget date</th>
			<th>Email</th>
			<th class="not">Delete</th>
		</tr>
	</thead>

	<?php
		$forget_password = getAll("forget_password");
		if($forget_password) foreach ($forget_password as $forget_passwords):
	?>
	<tr>
		<td><?php echo $forget_passwords['forget_password_id']?></td>
		<td><?php echo $forget_passwords['forget_code']?></td>
		<td><?php echo $forget_passwords['forget_date']?></td>
		<td><?php echo $forget_passwords['email']?></td>
		<td><a href="save.php?act=delete&id=<?php echo $forget_passwords['forget_password_id']?>&cat=forget_password" onclick="return navConfirm(this.href);"><i class="glyphicon glyphicon-trash"></i></a></td>
	</tr>
	<?php endforeach; ?>
</table>

<?php include "includes/footer.php";?>
				