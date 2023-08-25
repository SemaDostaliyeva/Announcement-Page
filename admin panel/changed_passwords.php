<?php
	include "includes/header.php";
	?>


	<h1>Changed_passwords</h1>
	<p>This table includes <?php echo counting("changed_passwords", "id");?> changed_passwords.</p>

	<table id="sorted" class="table table-striped table-bordered">
	<thead>
	<tr>
		<th>Id</th>
		<th>Email</th>
		<th>Change date</th>
		<th>Forget code</th>
		<th>Ex password</th>
		<th>New password</th>
		<th class="not">Delete</th>
	</tr>
	</thead>

	<?php
	$changed_passwords = getAll("changed_passwords");
	if($changed_passwords) foreach ($changed_passwords as $changed_passwordss):
	?>
	<tr>
		<td><?php echo $changed_passwordss['changed_passwords_id']?></td>
		<td><?php echo $changed_passwordss['email']?></td>
		<td><?php echo $changed_passwordss['change_date']?></td>
		<td><?php echo $changed_passwordss['forget_code']?></td>
		<td><?php echo $changed_passwordss['ex_password']?></td>
		<td><?php echo $changed_passwordss['new_password']?></td>
		<td><a href="save.php?act=delete&id=<?php echo $changed_passwordss['changed_passwords_id']; ?>&cat=changed_passwords" onclick="return navConfirm(this.href);"><i class="glyphicon glyphicon-trash"></i></a></td>
	</tr>
	<?php endforeach; ?>
	</table>
	<?php include "includes/footer.php";?>
