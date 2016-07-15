<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
    
		<title>Bootstrap 101 Template</title>

		<!-- Bootstrap -->
		<link href="<?php echo site_url("css/bootstrap.min.css"); ?>" rel="stylesheet">
		<link href="<?php echo site_url("css/rwd-table.min.css"); ?>" rel="stylesheet">
		<link href="<?php echo site_url("css/style.css"); ?>" rel="stylesheet">

		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
			<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>
	<body>
		<div id="body">
			<nav class="navbar navbar-default">
				<div class="container-fluid">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#TopNav">
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span> 
						</button>
						<a class="hidden-sm hidden-md hidden-lg navbar-brand" href="#">RMS 3.0</a>
					</div>
					<div class="collapse navbar-collapse" id="TopNav">
						<ul class="nav navbar-nav">
							<li class="active"><a href="#">RMS 3.0</a></li>
							<li class="dropdown">
								<a class="dropdown-toggle" data-toggle="dropdown" href="#">Table
								<span class="caret"></span></a>
								<ul class="dropdown-menu">
									<li><a href="<?php echo site_url("table"); ?>">Manage</a></li>
									<li><a href="<?php echo site_url("table/add"); ?>">New Table</a></li>
								</ul>
							</li>
							<li class="dropdown">
								<a class="dropdown-toggle" data-toggle="dropdown" href="#">Food
								<span class="caret"></span></a>
								<ul class="dropdown-menu">
									<li><a href="#">Manage</a></li>
									<li><a href="#">New Food</a></li>
									<li><a href="#">Category</a></li>
									<li><a href="#">Printing</a></li>
								</ul>
							</li>
							<li class="dropdown">
								<a class="dropdown-toggle" data-toggle="dropdown" href="#">Stock
								<span class="caret"></span></a>
								<ul class="dropdown-menu">
									<li><a href="#">Manage</a></li>
									<li><a href="#">Wastage</a></li>
									<li><a href="#">Stock Food</a></li>
								</ul>
							</li>
							<li class="dropdown">
								<a class="dropdown-toggle" data-toggle="dropdown" href="#">Salse
								<span class="caret"></span></a>
								<ul class="dropdown-menu">
									<li><a href="#">Checkout</a></li>
									<li><a href="#">Partsale</a></li>
									<li><a href="#">Order</a></li>
								</ul>
							</li>
							<li><a href="#">Order</a></li>
							<li class="dropdown">
								<a class="dropdown-toggle" data-toggle="dropdown" href="#">Settings
								<span class="caret"></span></a>
								<ul class="dropdown-menu">
									<li><a href="<?php echo site_url("settings"); ?>">Basic</a></li>
									<li><a href="<?php echo site_url("settings/store"); ?>">Store</a></li>
									<li><a href="<?php echo site_url("settings/customize"); ?>">Customize</a></li>
									<li><a href="<?php echo site_url("settings/fundamentals"); ?>">Fundamentals</a></li>
								</ul>
							</li>
							<li class="dropdown">
								<a class="dropdown-toggle" data-toggle="dropdown" href="#">Users
								<span class="caret"></span></a>
								<ul class="dropdown-menu">
									<li><a href="<?php echo site_url("user"); ?>">Manage</a></li>
									<li><a href="<?php echo site_url("user/add"); ?>">Set User</a></li>
									<li><a href="#">Help Doc</a></li>
									<li><a href="#">About Us</a></li>
								</ul>
							</li>
						</ul>
						<ul class="nav navbar-nav navbar-right">
							<li class="active"><a href="<?php echo site_url("secure/logout"); ?>">Logout</a></li>
						</ul>
					</div>
				</div>
			</nav>