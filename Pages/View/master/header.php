<?php

$activePage = basename($_SERVER['PHP_SELF'], ".php");

$title = strtoupper(trim(basename($_SERVER['PHP_SELF']), '.php'));
?>


<!DOCTYPE html>

<html lang="en">
<!-- Basic -->

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<!-- Mobile Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Site Metas -->
	<title>CHORDS | <?= $title ?> </title>
	<meta name="keywords" content="">
	<meta name="description" content="">
	<meta name="author" content="">

	<!-- Site Icons -->
	<link rel="shortcut icon" href="#" type="image/x-icon">
	<link rel="apple-touch-icon" href="images/apple-touch-icon.png">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<!-- Site CSS -->
	<link rel="stylesheet" href="css/style.css">
	<!-- Responsive CSS -->
	<link rel="stylesheet" href="css/responsive.css">
	<!-- Custom CSS -->
	<link rel="stylesheet" href="css/custom.css">
	<link rel="stylesheet" href="css/custom1.css">

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.3.1/css/all.min.css" integrity="sha512-KulI0psuJQK8UMpOeiMLDXJtGOZEBm8RZNTyBBHIWqoXoPMFcw+L5AEo0YMpsW8BfiuWrdD1rH6GWGgQBF59Lg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

	<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

	<style>
		.image {
			width: 30px;
			height: 30px;
			border-radius: 50%;
		}
	</style>
</head>

<body>
	<!-- Start header -->
	<header class="top-navbar">
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
			<!-- <div class="container"> -->
			<div class="container">
				<a class="navbar-brand" href="index.html">
					<h1><strong>CHORDS</strong></h1>
				</a>
			</div>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbars-rs-food" aria-controls="navbars-rs-food" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<?php $activePage = basename($_SERVER['PHP_SELF'], ".php");	?>


			<div class="collapse navbar-collapse" id="navbars-rs-food">
				<ul class="navbar-nav  ml-auto">
					<li class="nav-item <?= ($activePage == 'index') ? 'active' : ''; ?> mr-2"><a class="nav-link" href="index.php">Home</a></li>
					<li class="nav-item <?= ($activePage == 'songs') ? 'active' : ''; ?> mr-2"><a class="nav-link" href="songs.php">Songs</a></li>
					<li class="nav-item <?= ($activePage == 'about') ? 'active' : ''; ?> mr-2"><a class="nav-link" href="about.php">About</a></li>
				</ul>

				<!-- user dropdown -->
				<?php
				if (isset($_SESSION['username'])) : ?>

					<li class="nav-item dropdown">
						<a class="nav-link " href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							<!-- <img src="../img-01.jpg" alt="image not found"> -->
							<img class="image" src="../../Pages/Backend/images/4b0986ed644bdf25dfeeb249c8171032.jpg" alt="">

						</a>
						<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
							<a class="dropdown-item" href="../View/logout.php">Log Out</a>
						</div>
					</li>

				<?php else : ?>
					<a href="../View/login.php" class="btn btn-primary">Login/Signup</a>
				<?php endif; ?>


			</div>
			</div>
		</nav>
	</header>
	<!-- <header class="top-navbar">
	<nav class="navbar navbar-expand-lg navbar-light bg-white">
	<div class="container">
  <a class="navbar-brand" href="#"><h1><strong>CHORDS</strong></h1></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
 
  
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="nav justify-content-center">
	<li class="nav-item <?= ($activePage == 'index') ? 'active' : ''; ?> mr-2"><a class="nav-link" href="index.php">Home</a></li>
	<li class="nav-item <?= ($activePage == 'songs') ? 'active' : ''; ?> mr-2"><a class="nav-link" href="songs.php">Songs</a></li>
	<li class="nav-item <?= ($activePage == 'about') ? 'active' : ''; ?> mr-2"><a class="nav-link" href="about.php">About</a></li>
				
      
    </ul>
	
  </div>
  </div>
</nav> -->
	<!-- End header -->