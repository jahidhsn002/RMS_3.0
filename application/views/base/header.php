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
		<div id="body" class="clearfix">
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
								<a class="dropdown-toggle" data-toggle="dropdown" href="#">Food
								<span class="caret"></span></a>
								<ul class="dropdown-menu">
									<li><a href="<?php echo site_url("food"); ?>">Manage</a></li>
									<li><a href="<?php echo site_url("food/add"); ?>">New Food</a></li>
									<li class="divider"></li>
									<li><a href="<?php echo site_url("category"); ?>">All Category</a></li>
									<li><a href="<?php echo site_url("category/add"); ?>">Add Category</a></li>
									<li class="divider"></li>
									<li><a href="<?php echo site_url("printing"); ?>">View Printing</a></li>
									<li><a href="<?php echo site_url("printing/add"); ?>">set Printing</a></li>
									<li class="divider"></li>
									<li><a href="<?php echo site_url("stock"); ?>">Stock</a></li>
								</ul>
							</li>
							<li class="dropdown">
								<a class="dropdown-toggle" data-toggle="dropdown" href="#">Salse
								<span class="caret"></span></a>
								<ul class="dropdown-menu">
									<li><a href="<?php echo site_url("salse/checkout"); ?>">Checkout</a></li>
									<li><a href="<?php echo site_url("salse"); ?>">Partsale</a></li>
									<li><a href="<?php echo site_url("salse/order"); ?>">Order</a></li>
									<li class="divider"></li>
									<li><a href="<?php echo site_url("supplier"); ?>">All Supplier</a></li>
									<li><a href="<?php echo site_url("supplier/add"); ?>">Add Supplier</a></li>
									<li class="divider"></li>
									<li><a href="<?php echo site_url("stock/supply"); ?>">Supply Food</a></li>
								</ul>
							</li>
							<li class="dropdown">
								<a class="dropdown-toggle" data-toggle="dropdown" href="#">Settings
								<span class="caret"></span></a>
								<ul class="dropdown-menu">
								<li><a href="<?php echo site_url("discount"); ?>">Discount</a></li>
									<li><a href="<?php echo site_url("discount/add"); ?>">Add Discount</a></li>
									<li class="divider"></li>
									<li><a href="<?php echo site_url("payment"); ?>">Payment</a></li>
									<li><a href="<?php echo site_url("payment/add"); ?>">New Method</a></li>
									<li class="divider"></li>
									<li><a href="<?php echo site_url("user"); ?>">User Manager</a></li>
									<li><a href="<?php echo site_url("user/add"); ?>">Set User</a></li>
									<li class="divider"></li>
									<li><a href="<?php echo site_url("table"); ?>">Manage</a></li>
									<li><a href="<?php echo site_url("table/add"); ?>">New Table</a></li>
									<li class="divider"></li>
									<li><a href="<?php echo site_url("settings"); ?>">Basic</a></li>
									<li><a href="<?php echo site_url("settings/store"); ?>">Store</a></li>
									<li><a href="<?php echo site_url("settings/customize"); ?>">Customize</a></li>
									<li><a href="<?php echo site_url("settings/fundamentals"); ?>">Fundamentals</a></li>
									<li class="divider"></li>
								</ul>
							</li>
							<li class="dropdown">
								<a class="dropdown-toggle" data-toggle="dropdown" href="#">Reports
								<span class="caret"></span></a>
								<ul class="dropdown-menu">
									<li><a href="<?php echo site_url("history"); ?>">Supply History</a></li>
									<li><a href="<?php echo site_url("history/salse"); ?>">Partsale History</a></li>
									<li><a href="#">About Us</a></li>
								</ul>
							</li>
							<li class="dropdown">
								<a class="dropdown-toggle" data-toggle="dropdown" href="#">Help
								<span class="caret"></span></a>
								<ul class="dropdown-menu">
									<li><a href="#">Documentation</a></li>
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