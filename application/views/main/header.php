<!DOCTYPE HTML>
<html>
	<head>
		<title><?php echo $title;?> | Tour</title>
		<link href="<?php echo base_url("app-contents/main/");?>css/bootstrap.css" rel="stylesheet" type="text/css" />
		<link href="<?php echo base_url("app-contents/main/");?>css/style.css" rel="stylesheet" type="text/css" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
		<link href="//fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
		<script type="text/javascript" src="<?php echo base_url("app-contents/main/");?>js/jquery-1.11.1.min.js"></script>
		<script type="text/javascript" src="<?php echo base_url("app-contents/main/");?>js/login.js"></script>
		<script src="<?php echo base_url("app-contents/main/");?>js/jquery.easydropdown.js"></script>
		<script src="<?php echo base_url("app-contents/main/");?>js/wow.min.js"></script>
		<link href="<?php echo base_url("app-contents/main/");?>css/animate.css" rel="stylesheet" type="text/css" />
		<script>
		new WOW().init();
		</script>
		<script src="<?php echo base_url("app-contents/main/");?>js/bootstrap.js"></script>
		<style type="text/css">
			.dropdown {
				position: relative;
			}
			.dropdown-menu {
				border-radius: 0;
				border-color: #eee;
				box-shadow: none;
				top: 2.85em;
			}
			.dropdown-menu li {
				list-style: none;
				display: block;
			}
			.dropdown-menu li a {
				padding: 5px;
			}
		</style>
	</head>
	<body>
		<div class="header">
			<div class="col-sm-8 header-left">
				<!-- <div class="logo"> -->
					<!-- <a href="index.html"><img src="<?php echo base_url("app-contents/main/");?>images/logo.png" alt=""/></a> -->
				<!-- </div> -->
				<div class="menu">
					<a class="toggleMenu" href="#"><img src="<?php echo base_url("app-contents/main/");?>images/nav.png" alt="" /></a>
					<ul class="nav" id="nav">
						<li class="active"><a href="#"><h3>Museum Affandi</h3></a></li>
						<li></li>
						<li><a href="<?php echo base_url(); ?>">Home</a></li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Gallery</a>
							<ul class="dropdown-menu">
								<li><a href="<?php echo base_url(); ?>gallery/foto">Foto</a></li>
								<li><a href="<?php echo base_url(); ?>gallery/video">Video</a></li>
							</ul>
						</li>
						<li><a href="<?php echo base_url(); ?>main/about-us">About Us</a></li>
						<div class="clearfix"></div>
					</ul>
					<script type="text/javascript" src="<?php echo base_url("app-contents/main/");?>js/responsive-nav.js"></script>
				</div>
				<div class="clearfix"></div>
			</div>
			<div class="col-sm-4 header_right">
					<div id="loginContainer" style="color: transparent;">&nbsp;</a>
					<!-- <div id="loginContainer"><a href="#" id="loginButton"><img src="<?php echo base_url("app-contents/main/");?>images/login.png"><span>Login</span></a> -->
<!-- 					<div id="loginBox">
						<form id="loginForm" action="<?php echo base_url('dashboard/login/');?>" method="POST">
							<fieldset id="body">
								<fieldset>
									<label for="username">Username</label>
									<input type="text" name="username" id="username">
								</fieldset>
								<fieldset>
									<label for="password">Password</label>
									<input type="password" name="password" id="password">
								</fieldset>
								<input type="submit" name="login" id="login" value="Sign in">
							</fieldset>
						</form>
					</div>
 -->				
			</div>
			<div class="clearfix"></div>
		</div>
		<div class="clearfix"></div>
	</div>
