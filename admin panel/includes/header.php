<?php
error_reporting(0);
@session_start();
if (!isset($_SESSION["sess_admin_login"])){header("location:"."index.php");}
	include("includes/connect.php");
	include("includes/data.php");
	?>
	<!DOCTYPE html>
	<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="author" content="@housamz">

		<meta name="description" content="Mass Admin Panel">
		<title>Announcement Admin Panel</title>
		<link href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.7/cosmo/bootstrap.min.css" rel="stylesheet" integrity="sha384-h21C2fcDk/eFsW9sC9h0dhokq5pDinLNklTKoxIZRUn3+hvmgQSffLLQ4G4l2eEr" crossorigin="anonymous">

		<!-- Custom CSS -->
		<link rel="stylesheet" href="includes/style.css">
		<link href="//cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css" rel="stylesheet" type="text/css" />

		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesnt work if you view the page via file:// -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
			<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>

	<body>

	<div class="wrapper">
		<!-- Sidebar Holder -->
		<nav id="sidebar" class="bg-primary">
			<div class="sidebar-header">
				<h3>
					Announcement Admin Panel<br>
					<i id="sidebarCollapse" class="glyphicon glyphicon-circle-arrow-left"></i>
				</h3>
				<strong>
					Announcement<br>
					<i id="sidebarExtend" class="glyphicon glyphicon-circle-arrow-right"></i>
				</strong>
			</div><!-- /sidebar-header -->

			<!-- start sidebar -->
			<ul class="list-unstyled components">
				<li>
					<a href="home.php" aria-expanded="false">
						<i class="glyphicon glyphicon-home"></i>
						Home
					</a>
				</li>
					<li><a href="about_us.php"> About_us <span class="pull-right"><?=counting("about_us", "id")?></span></a></li>
					<li><a href="admins.php"> Admins <span class="pull-right"><?=counting("admins", "id")?></span></a></li>
					<li><a href="all_user.php"> All_user <span class="pull-right"><?=counting("all_user", "id")?></span></a></li>
					<li><a href="bin.php"> Bin <span class="pull-right"><?=counting("bin", "id")?></span></a></li>
					<li><a href="changed_passwords.php"> Changed_passwords <span class="pull-right"><?=counting("changed_passwords", "id")?></span></a></li>
					<li><a href="ex_register_code.php"> Ex_register_code <span class="pull-right"><?=counting("ex_register_code", "id")?></span></a></li>
					<li><a href="footer.php"> Footer <span class="pull-right"><?=counting("footer", "id")?></span></a></li>
					<li><a href="forget_password.php"> Forget_password <span class="pull-right"><?=counting("forget_password", "id")?></span></a></li>
					<li><a href="register_user.php"> Register_user <span class="pull-right"><?=counting("register_user", "id")?></span></a></li>
					<li><a href="rent.php"> Rent <span class="pull-right"><?=counting("rent", "id")?></span></a></li>
					<li><a href="rules.php"> Rules <span class="pull-right"><?=counting("rules", "id")?></span></a></li>
					<li><a href="sail.php"> Sail <span class="pull-right"><?=counting("sail", "id")?></span></a></li>
					<li><a href="logout.php"> Logout</a></li>
		</ul>
	</nav><!-- /end sidebar -->

	<!-- Page Content Holder -->
	<div id="content">