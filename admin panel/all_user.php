<?php
				include "includes/header.php";
				?>

				<h1>All_user</h1>
				<p>This table includes <?php echo counting("all_user", "id");?> all_user.</p>

				<table id="sorted" class="table table-striped table-bordered">
				<thead>
				<tr>
					<th>Id</th>
					<th>User email</th>
					<th>User fullname</th>
					<th>User password</th>
					<th>User date</th>
					<th class="not">Delete</th>
				</tr>
				</thead>

				<?php
				$all_user = getAll("all_user");
				if($all_user) foreach ($all_user as $all_users):
				?>
				<tr>
					<td><?php echo $all_users['id']?></td>
					<td><?php echo $all_users['user_email']?></td>
					<td><?php echo $all_users['fullname']?></td>
					<td><?php echo $all_users['user_password']?></td>
					<td><?php echo $all_users['user_date']?></td>

					<td><a href="save.php?act=delete&id=<?php echo $all_users['id']?>&cat=all_user" onclick="return navConfirm(this.href);"><i class="glyphicon glyphicon-trash"></i></a></td>
					</tr>
				<?php endforeach; ?>
				</table>
				<?php include "includes/footer.php";?>
			