<?php
		include "includes/header.php";
		?>
		<table class="table table-striped">
		<tr>
		<th class="not">Table</th>
		<th class="not">Entries</th>
		</tr>
		
				<tr>
					<td><a href="about_us.php">About_us</a></td>
					<td><?=counting("about_us", "id")?></td>
				</tr>
				
				<tr>
					<td><a href="admins.php">Admins</a></td>
					<td><?=counting("admins", "id")?></td>
				</tr>
				
				<tr>
					<td><a href="all_user.php">All_user</a></td>
					<td><?=counting("all_user", "id")?></td>
				</tr>
				
				<tr>
					<td><a href="bin.php">Bin</a></td>
					<td><?=counting("bin", "id")?></td>
				</tr>
				
				<tr>
					<td><a href="changed_passwords.php">Changed_passwords</a></td>
					<td><?=counting("changed_passwords", "id")?></td>
				</tr>
				
				<tr>
					<td><a href="ex_register_code.php">Ex_register_code</a></td>
					<td><?=counting("ex_register_code", "id")?></td>
				</tr>
				
				<tr>
					<td><a href="footer.php">Footer</a></td>
					<td><?=counting("footer", "id")?></td>
				</tr>
				
				<tr>
					<td><a href="forget_password.php">Forget_password</a></td>
					<td><?=counting("forget_password", "id")?></td>
				</tr>
				
				<tr>
					<td><a href="register_user.php">Register_user</a></td>
					<td><?=counting("register_user", "id")?></td>
				</tr>
				
				<tr>
					<td><a href="rent.php">Rent</a></td>
					<td><?=counting("rent", "id")?></td>
				</tr>
				
				<tr>
					<td><a href="rules.php">Rules</a></td>
					<td><?=counting("rules", "id")?></td>
				</tr>
				
				<tr>
					<td><a href="sail.php">Sail</a></td>
					<td><?=counting("sail", "id")?></td>
				</tr>
				
				<tr>
					<td><a href="slide.php">Slide</a></td>
					<td><?=counting("slide", "id")?></td>
				</tr>
				</table>
			<?php include "includes/footer.php";?>
			