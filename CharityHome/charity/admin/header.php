<?php
session_start();
//include('header.php');
//print_r($_SESSION);

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Charity Home || Charity and Donation HTML5 Template</title>

	<!-- responsive meta -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<!-- master stylesheet -->
	<link rel="stylesheet" href="../css/style.css">
	<!-- responsive stylesheet -->
	<link rel="stylesheet" href="../css/responsive.css">



</head>
<body>


	<header class="header">
		<div class="container">
			<div class="logo pull-left">
				<a href="index.html">
					<img src="../img/resources/logo.png" alt="Awesome Image"/>
				</a>
			</div>
			<div class="header-right-info pull-right clearfix">
				<div class="single-header-info">
					<div class="icon-box">
						<div class="inner-box">
							<i class="flaticon-interface-2"></i>
						</div>
					</div>
					<div class="content">
						<h3>EMAIL</h3>
						<p>charityhome@gmail.com</p>
					</div>
				</div>
				<div class="single-header-info">
					<div class="icon-box">
						<div class="inner-box">
							<i class="flaticon-telephone"></i>
						</div>
					</div>
					<div class="content">
						<h3>Call Now</h3>
						<p><b>(732) 803-010-03</b></p>
					</div>
				</div>
				<div class="single-header-info">
					<div class="icon-box">
						<div class="inner-box">
							<i class="flaticon-person"></i>
						</div>
					</div>
					<div class="content">
						<h3>Welcome</h3>
						<p><b><?php echo  $_SESSION['user_name'];?></b></p>
					</div>
				</div>
				
		</div>
	</header> <!-- /.header -->


	<nav class="mainmenu-area stricky">
		<div class="container">
			<div class="navigation pull-left">
				<div class="nav-header">
					<ul>
						<li>
							<a href="index.php">Home</a>
							
						</li>
						<!-- <li><a href="about.php">About</a></li> -->						
						<li>
							<a href="causes.php">Causes</a>
							
						</li>						
						<li>
							<a href="events.php">Events</a>
							
						</li>
						<li>
							<a href="volunteer.php">Volunteer</a>
							
						</li>
						<li>
							<a href="gallery.php">Gallery</a>
							
						</li>
						
						<!-- <li><a href="contact.php">Contact</a></li> -->
						<li><a href="logout.php">Log-Out</a></li>
					</ul>
				</div>
				<div class="nav-footer">
					<button><i class="fa fa-bars"></i></button>
				</div>
			</div>
			<div class="search-box pull-right">
				<form action="#">
					<input type="text" placeholder="Search...">
					<button type="submit"><i class="fa fa-search"></i></button>
				</form>
			</div>
		</div>
	</nav> <!-- /.mainmenu-area -->
