<!DOCTYPE html>
<html lang="en-US" dir="ltr">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">


	<!-- ===============================================-->
	<!--    Document Title-->
	<!-- ===============================================-->
	<title>SIPAKU</title>


	<!-- ===============================================-->
	<!--    Favicons-->
	<!-- ===============================================-->
	<link href="<?php echo base_url('assets_home/public/assets/img/favicons/apple-touch-icon.png') ?>" rel="apple-touch-icon" sizes="180x180">
	<link href="<?php echo base_url('assets_home/public/assets/img/favicons/favicon-32x32.png') ?>" rel="icon" type="image/png" sizes="32x32">
	<link href="<?php echo base_url('assets_home/public/assets/img/favicons/favicon-16x16.png') ?>" rel="icon" type="image/png" sizes="16x16">
	<link href="<?php echo base_url('assets_home/public/assets/img/favicons/favicons.ico') ?>" rel="shortcut icon" type="image/x-icon">
	<link href="<?php echo base_url('assets_home/public/assets/img/favicons/manifest.json') ?>" rel="manifest">
	<meta content="<?php echo base_url('assets_home/public/assets/img/favicons/mstile-150x150.png') ?>" name="msapplication-TileImage">
	<meta name="theme-color" content="#ffffff">
	<link rel="stylesheet" href="<?php echo base_url('assets_home/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') ?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/css/styles.css') ?>">



	<!-- ===============================================-->
	<!--    Stylesheets-->
	<!-- ===============================================-->
	<link href="<?php echo base_url('assets_home/public/assets/css/theme.css') ?>" rel="stylesheet" />

</head>


<body>
	<!-- ===============================================-->
	<!--    Main Content-->
	<!-- ===============================================-->
	<main class="main" id="top">
		<nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" data-navbar-on-scroll="data-navbar-on-scroll">
			<div class="container"><a class="navbar-brand d-flex align-items-center fw-bold fs-2" href="#">
					<img class="d-inline-block me-3" src="<?php echo base_url('assets_home/public/assets/img/logo.png') ?>" alt="" />SIPAKU</a>
				<button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
				<div class="collapse navbar-collapse border-top border-lg-0 mt-4 mt-lg-0" id="navbarSupportedContent">
					<ul class="navbar-nav ms-auto pt-2 pt-lg-0">

						<li class="nav-item"><a class="nav-link" href="<?php echo base_url('Dashboard') ?>">HOME </a></li>
						<li class=" nav-item"><a class="nav-link" href="#tentang">TENTANG SIPAKU</a></li>
						<?php if ($this->session->userdata('status') != "login") { ?>
							<li class="nav-item"><a class="nav-link" href="#login">LOGIN </a></li>

						<?php } else { ?>
							<li class="nav-item"><a class="nav-link" href="<?php echo base_url('Login/logout') ?>">LOGOUT</a></li>
						<?php } ?>


					</ul>
				</div>
			</div>
		</nav>
		<section class="py-0">
			<div class="bg-holder" style="background-image:url(<?php echo base_url('assets_home/public/assets/img/illustrations/dot.png') ?>);background-position:left;background-size:auto;margin-top:-105px;">
			</div>
			<!--/.bg-holder-->

			<div class="container position-relative">
				<div class="row align-items-center">
					<div class="col-md-5 col-lg-6 order-md-1 pt-8"><img class="img-fluid" src="<?php echo base_url('assets_home/public/assets/img/illustrations/hero-header.png') ?>" alt="" /></div>
					<div class="col-md-7 col-lg-6 text-center text-md-start pt-5 pt-md-9">
						<h1 class="mb-4 display-3 fw-bold">Sistem Pakar Penyakit Kulit <br class="d-block d-lg-none d-xl-block" /></h1>
						<p class="mt-3 mb-4 fs-1">Sistem Informasi yang berguna untuk membantu user <br class="d-none d-lg-block" /> dalam mendiagnosa penyakit kulit</p><a class="btn btn-lg btn-primary rounded-pill hover-top" href="<?php echo site_url('DiagnosaController') ?>" role="button">Lakukan Diagnosa</a>
					</div>
				</div>
			</div>
		</section>
		</br>
		</br></br></br>
		<section class="py-8" id="tentang">
			<div class="bg-holder" style="background-image:url(<?php echo base_url('assets_home/public/assets/img/illustrations/services-bg.png') ?>);background-position:center left;background-size:auto;">
			</div>
			<!--/.bg-holder-->

			<div class="bg-holder" style="background-image:url(<?php echo base_url('assets_home/public/assets/img/illustrations/dot-2.png') ?>);background-position:center right;background-size:auto;margin-left:-100px;margin-top:20px;">
			</div>
			<!--/.bg-holder-->

			<div class="container-lg">
				<div class="row justify-content-center">
					<div class="col-6 text-center">
						<h1 class="fw-bold">SISTEM PAKAR PENYAKIT KULIT</h1>
						<h3 class="fw-bold">( S I P A K U )</h3>

						<hr class="w-75 mx-auto text-dark" style="height:3px;" />
					</div>
				</div>
				</br>
				<div class="row justify-content-center">
					<div class="col-sm-9 col-xl-8 text-center">
						<h5 style="line-height: 2;">
							Aplikasi diagnosa penyakit ini merupakan sistem pakar yang mengadopsi pengetahuan manusia ke komputer, agar komputer dapat menyelesaikan masalah seperti yang di lakukan oleh seorang pakar/dokter.
						</h5>
						<h5 style="line-height: 2;">Aplikasi sistem pakar ini menggunakan metode Forward Chaining dan aplikasi yang digunakan dapat membantu mendiagnosa suatu penyakit berbasis pengetahuan dari manusia disebut kecerdasan buatan atau AI.
							Dengan demikian, sistem aplikasi ini dibuat untuk memudahkan pasien/user untuk mediagnosa gejala thalasemia. Penggunaan metode forward chaining di penelitian ini kerena program aplikasi sistem pakar yang dibangun dapat melacak diagnosa penyakit caar air. Dengan menggunakan metode ini, semua data gejala dan aturan akan ditelusuri untuk mendapatkan hasil diagnosa penyakit yang terdeteksi.
						</h5>
					</div>
				</div>
			</div>
		</section>
		</br></br></br></br></br></br></br></br>
		<section class="py-6 py-lg-8" id="login">
			<div class="bg-holder" style="background-image:url(<?php echo base_url('assets_home/public/assets/img/illustrations/dot.png') ?>);background-position:right bottom;background-size:auto;margin-top:50px;">
			</div>

			<div class="bg-holder" style="background-image:url(<?php echo base_url('assets_home/public/assets/img/illustrations/dot.png') ?>);background-position:left bottom;background-size:auto;margin-top:50px;">
			</div>

			<!--/.bg-holder-->
			<div class="container">
				<div class="row h-100">
				</div>
				<div class="col-12">
					<div class="card text-white bg-primary-gradient">
						<div class="row g-xl-0 align-items-center card-body p-4 p-md-4 p-lg-7">
							<div class="col-md-6"><img class="img-fluid mb-5 mb-md-0" src="<?php echo base_url('assets_home/public/assets/img/illustrations/about-1.png') ?>" width="480" alt="" /></div>
							<div class="col-md-6 text-center text-md-start">
								<h2 class="fw-bold lh-base text-center text-white">LOGIN MEMBER</h2>
								<hr class="mx-auto" style="height:2px;width:350px" />

								<form action="<?php echo base_url('Login/aksi_login') ?>" method="post">

									<div class="form-group">
										<div class="row justify-content-center">
											<div class="col-md-6 mb-2">
												<input type="text" class="form-control" name="username" placeholder="Username" required="required">
											</div>
										</div>
									</div>
									<div class="form-group">
										<div class="row justify-content-center">
											<div class="col-md-6 mb-2">
												<input type="password" class="form-control" name="password" placeholder="Password" required="required">
											</div>
										</div>
									</div>

									<div class="text-center py-3">
										<button class="btn btn-lg btn-outline-light rounded-pill" type="submit"> SIGN IN </button>
										<br>
										<p></p>
										<p>Dont have account ? <a href="<?php echo site_url('RegisterController') ?>" style="color:white">Regristration</a></p>

									</div>
									<!--/.bg-holder-->
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
			</div>
		</section>