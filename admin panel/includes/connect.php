<?php
		$link = mysqli_connect("127.0.0.1", "root", "12345678");
		mysqli_select_db($link, "announcement");
		mysqli_query($link, "SET CHARACTER SET utf8");
		?>
		