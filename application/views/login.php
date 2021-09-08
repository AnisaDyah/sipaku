<!DOCTYPE html>
<html lang="zxx" class="no-js">
<head>
	<!-- Mobile Specific Meta -->
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- Favicon-->
	<link rel="shortcut icon" href="<?php echo base_url('assets/img/iconweb.png') ?>">
	<!-- Author Meta -->
	<meta name="author" content="codepixer">
	<!-- Meta Description -->
	<meta name="description" content="">
	<!-- Meta Keyword -->
	<meta name="keywords" content="">
	<!-- meta character set -->
	<meta charset="UTF-8">
	<!-- Site Title -->
	<title>SIPAKO</title>
	<link rel="stylesheet" href="<?php echo base_url('assets/fontawesome/css/all.css') ?>">
	<link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet">
	<!--CSS============================================= -->
	<link rel="stylesheet" href="<?php echo base_url('assets/css/linearicons.css') ?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/css/font-awesome.min.css') ?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.css') ?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/css/magnific-popup.css') ?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/css/nice-select.css') ?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/css/animate.min.css') ?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/css/owl.carousel.css') ?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/css/main.css') ?>">
</head>
<body>
	<!-- start banner header Area -->
	<section class="banner-area" id="beranda">
		<div class="container">
			<div class="row fullscreen d-flex align-items-center justify-content-start" style="height: 657px;">
				<div class="banner-content col-lg-7" style="padding-top: 100px">
					<div class="row">
					<form action="<?php echo base_url('Login/aksi_login'); ?>" method="post">		
		<table>
			<tr>
				<td>Username</td>
				<td><input type="text" name="username"></td>
			</tr>
			<tr>
				<td>Password</td>
				<td><input type="password" name="password"></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" value="Login"></td>
			</tr>
		</table>
	</form>
				</div>
			</div>
		</div>
	</section>
	<!-- End banner header Area -->
	<script src="<?php echo base_url('assets/')?>/js/main.js"></script>
</body>
</html>