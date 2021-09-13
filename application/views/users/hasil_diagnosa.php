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
		<section class="py-6 py-lg-8" id="login">
			<div class="bg-holder" style="background-image:url(assets/img/illustrations/dot.png);background-position:right bottom;background-size:auto;margin-top:50px;">
			</div>
			<!--/.bg-holder-->

			<div class="container">
				<div class="row h-100">
					<div class="col-12">
						<div class="card text-white bg-primary-gradient">
							<div class="row g-xl-0 align-items-center card-body p-4 p-md-4 p-lg-7">
								<!-- <div class="col-md-6"><img class="img-fluid mb-5 mb-md-0" src="<?php echo base_url('assets_home/public/assets/img/illustrations/about-1.png') ?>" width="480" alt="" /></div> -->
								<div class="col-md-12 text-center text-md-start">
									<h4 class="fw-bold lh-base text-center text-white">Hasil Diagnosa </h4>
									<hr class="mx-auto" style="height:2px;width:350px" />

									<!-- <form action="<?php echo site_url('Admin') ?>" method="post"> -->

										<div class="form-group">
											<div class="row justify-content-center">
												<div class="col-md-8 mb-2">
                                                    <!-- <input type="text" class="form-control" name="username" placeholder="Username" required="required"> -->
                                                    <h5 class="fw-bold lh-base text-white">Berdasarkan gejala yang anda rasakan  :</h5>
                                                    <?php foreach ($gejala_selected as $ge) {?>
                                                        <span>-> <?= $ge['nama_gejala'] ;?></span></br>
                                                    <?php } ?>
                                                    <h4 class="fw-bold lh-base text-white">Penyakit kulit yang anda alami adalah : <?= $nama_penyakit ?></h4>
                                                    <h5 class="fw-bold lh-base text-white">Dengan Prosentase Kemungkinan Sebesar :  <?= $perhitungan_fc ?> %</h5>
                                                    <h5 class="fw-bold lh-base text-white">Saran Pengobatan yang harus dilakukan adalah  : <br/> <?= $saran_pengobatan ?></h5>
												</div>
											</div>
										</div>
										<!-- <div class="form-group">
											<div class="row justify-content-center">
												<div class="col-md-6 mb-2">
													<input type="password" class="form-control" name="password" placeholder="Password" required="required">
												</div>
											</div>
										</div> -->

										<!-- <div class="text-center py-3">
                                            <a class="btn btn-lg btn-warning rounded-pill" href="<?php echo site_url('DiagnosaController/cek_diagnosa/1/'.$id_gejala) ?>"> Ya </a>
                                            <a class="btn btn-lg btn-danger rounded-pill" href="<?php echo site_url('DiagnosaController/cek_diagnosa/0/'.$id_gejala) ?>"> Tidak </a>
                                        </div> -->
                                        <div class="text-center py-3">
                                            <hr class="mx-auto" style="height:2px;width:350px" />
										</div>

									<!-- </form> -->
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>