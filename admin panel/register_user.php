<?php
	include "includes/header.php";
	?>

	<h1>Register_user</h1>
	<p>This table includes <?php echo counting("register_user", "id");?> register_user.</p>

	<table id="sorted" class="table table-striped table-bordered">
	<thead>
	<tr>
		<th>Id</th>
		<th>User email</th>
		<th>User password</th>
		<th>User fullname</th>
		<th>Register date</th>
		<th>Random code</th>
		<th class="not">Delete</th>
	</tr>
	</thead>

	<?php
	$register_user = getAll("register_user");
	if($register_user) foreach ($register_user as $register_users):
		?>
	<tr>
		<td><?php echo $register_users['register_user_id']?></td>
		<td><?php echo $register_users['user_email']?></td>
		<td><?php echo $register_users['user_password']?></td>
		<td><?php echo $register_users['fullname']?></td>
		<td><?php echo $register_users['register_date']?></td>
		<td><?php echo $register_users['random_code']?></td>
		<td><a href="save.php?act=delete&id=<?php echo $register_users['register_user_id']?>&cat=register_user" onclick="return navConfirm(this.href);"><i class="glyphicon glyphicon-trash"></i></a></td>
		</tr>
	<?php endforeach; ?>
	</table>
	<?php include "includes/footer.php";?>
			