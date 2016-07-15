<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<!DOCTYPE HTML>
<html>
<head>
<title>Flat Portal Login Form  Responsive Widget Template | Home :: w3layouts</title>
<link href="<?php echo site_url("/css/login.css"); ?>" rel="stylesheet" type="text/css" media="all"/>
<!-- Custom Theme files -->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
<meta name="keywords" content="Plans & Pricing Tables Responsive, Login form web template, Sign up Web Templates, Flat Web Templates, Login signup Responsive web template, Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<!--web-fonts-->
<link href='//fonts.googleapis.com/css?family=PT+Sans+Narrow:400,700' rel='stylesheet' type='text/css'>
<!--web-fonts-->
</head>
<body>
			<div class="main">
				<div class="login">
					<div class="login-top">
						<img src="<?php echo site_url('images/p.png'); ?>">
					</div>
					<h1>HUB RMS 3.0</h1>
					<?php if($error != ''){ ?>
					<div style="margin-top:20px;margin-bottom:20px;color:red">
						<h3><?php echo $error; ?></h3>
					</div>
					<?php } ?>
					<div class="login-bottom">
					<form action="<?php echo site_url('secure/auth'); ?>" method="POST">
						<input type="text" name="username" placeholder="Email" required>					
						<input type="password" name="password" class="password" placeholder="Password" required>						
						<input type="submit" value="login">
					</form>
					<a href="http://hubdrive.net"><p>Contact Builders || Click Here</p></a>
					</div>
				</div>
			</div>
		<div class="footer">
			<p>&copy 2016 HUB RMS. All rights reserved | Developed by <a href="http://hubdrive.net">Hub IT Solution</a></p>
		</div>

</body>
</html>