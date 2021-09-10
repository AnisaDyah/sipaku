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

						<li class="nav-item"><a class="nav-link" href="index.php">HOME</a></li>
						<!-- <li class="nav-item" data-toggle="modal" data-target="#login-modal">LOGIN</li> -->
						<li class="nav-item"><a class="nav-link" href="#login">LOGIN</a></li>
					</ul>
				</div>
			</div>
		</nav>
		<section class="py-0">
			<div class="bg-holder" style="background-image:url(<?php echo base_url('assets/img/illustrations/dot.png') ?>);background-position:left;background-size:auto;margin-top:-105px;">
			</div>
			<!--/.bg-holder-->

			<div class="container position-relative">
				<div class="row align-items-center">
					<div class="col-md-5 col-lg-6 order-md-1 pt-8"><img class="img-fluid" src="<?php echo base_url('assets_home/public/assets/img/illustrations/hero-header.png') ?>" alt="" /></div>
					<div class="col-md-7 col-lg-6 text-center text-md-start pt-5 pt-md-9">
						<h1 class="mb-4 display-3 fw-bold">Virtual healthcare <br class="d-block d-lg-none d-xl-block" />for you.</h1>
						<p class="mt-3 mb-4 fs-1">Trafalgar provides progressive, and affordable<br class="d-none d-lg-block" />healthcare, accessible on mobile and online<br class="d-none d-lg-block" />for everyone</p><a class="btn btn-lg btn-primary rounded-pill hover-top" href="<?php echo site_url('DiagnosaController') ?>" role="button">Lakukan Diagnosa</a>
					</div>
				</div>
			</div>
		</section>
		<section class="py-8">
			<div class="bg-holder" style="background-image:url(assets/img/illustrations/services-bg.png);background-position:center left;background-size:auto;">
			</div>
			<!--/.bg-holder-->

			<div class="bg-holder" style="background-image:url(assets/img/illustrations/dot-2.png);background-position:center right;background-size:auto;margin-left:-180px;margin-top:20px;">
			</div>
			<!--/.bg-holder-->

			<div class="container-lg">
				<div class="row justify-content-center">
					<div class="col-3 text-center">
						<h2 class="fw-bold">Our services</h2>
						<hr class="w-25 mx-auto text-dark" style="height:2px;" />
					</div>
				</div>
				<div class="row justify-content-center">
					<div class="col-sm-9 col-xl-8 text-center">
						<p>We provide to you the best choiches for you. Adjust it to your health needs and make sure your undergo treatment with our highly qualified doctors you can consult with us which type of service is suitable for your health</p>
					</div>
				</div>
			</div>
		</section>
		<section class="py-6 py-lg-8" id="login">
			<div class="bg-holder" style="background-image:url(assets/img/illustrations/dot.png);background-position:right bottom;background-size:auto;margin-top:50px;">
			</div>
			<!--/.bg-holder-->

			<div class="container">
				<div class="row h-100">
					<div class="col-12">
						<div class="card text-white bg-primary-gradient">
							<div class="row g-xl-0 align-items-center card-body p-4 p-md-4 p-lg-7">
								<div class="col-md-6"><img class="img-fluid mb-5 mb-md-0" src="<?php echo base_url('assets_home/public/assets/img/illustrations/about-1.png') ?>" width="480" alt="" /></div>
								<div class="col-md-6 text-center text-md-start">
									<h2 class="fw-bold lh-base text-center text-white">PLEASE LOGIN !</h2>
									<hr class="mx-auto" style="height:2px;width:350px" />

									<form action="<?php echo site_url('Admin') ?>" method="post">

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
											<button class="btn btn-lg btn-outline-light rounded-pill" type="submit"> LOGIN </button>
										</div>

									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>