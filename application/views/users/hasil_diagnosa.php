<section class="py-6 py-lg-8" id="diagnosa">
	<div class="bg-holder" style="background-image:url(<?php echo base_url('assets_home/public/assets/img/illustrations/dot.png') ?>);background-position:right bottom;background-size:auto;margin-top:50px;">
	</div>
	<div class="bg-holder" style="background-image:url(<?php echo base_url('assets_home/public/assets/img/illustrations/dot.png') ?>);background-position:left top;background-size:auto;margin-top:50px;">
	</div>
	<div class="bg-holder" style="background-image:url(<?php echo base_url('assets_home/public/assets/img/illustrations/dot.png') ?>);background-position:left bottom;background-size:auto;margin-top:50px;">
	</div>
	<div class="bg-holder" style="background-image:url(<?php echo base_url('assets_home/public/assets/img/illustrations/dot-2.png') ?>);background-position:center right;background-size:auto;margin-left:-180px;margin-top:20px;">
	</div>
	<div class="bg-holder" style="background-image:url(<?php echo base_url('assets_home/public/assets/img/illustrations/services-bg.png') ?>);background-position:center left;background-size:auto;">
	</div>
	<div class="bg-holder" style="background-image:url(<?php echo base_url('assets_home/public/assets/img/illustrations/services-bg.png') ?>);background-position:top right;background-size:auto;">
	</div>

	<!--/.bg-holder-->
	<div class="container">
		<div class="row h-100">
			<div class="col-12">
				<div class="row g-xl-0 align-items-center card-body p-4 p-md-4 p-lg-7">
					<div class="col-md-12 text-center text-md-start">
						<h1 class="fw-bold lh-base text-center text-black">Hasil Diagnosa </h1>
						<!-- <hr class="mx-auto" style="height:2px;width:350px" /> -->
						<!--  -->
						<!-- <form action="<?php echo site_url('Admin') ?>" method="post"> -->
						<!--  -->
						<!-- <div class="form-group"> -->
						<!-- <div class="row justify-content-center"> -->
						<!-- <div class="col-md-8 mb-2"> -->
						<!-- <input type="text" class="form-control" name="username" placeholder="Username" required="required"> -->
						<!-- <h5 class="fw-bold lh-base text-black">Berdasarkan gejala yang anda rasakan :</h5> -->
						<!-- <?php foreach ($gejala_selected as $ge) { ?> -->
						<!-- <span>-> <?= $ge['nama_gejala']; ?></span></br> -->
						<!-- <?php } ?> -->
						<!-- <h4 class="fw-bold lh-base text-black">Penyakit kulit yang anda alami adalah : <?= $nama_penyakit ?></h4> -->
						<!-- <h5 class="fw-bold lh-base text-black">Dengan Prosentase Kemungkinan Sebesar : <?= $perhitungan_fc ?> %</h5> -->
						<!-- <h5 class="fw-bold lh-base text-black">Saran Pengobatan yang harus dilakukan adalah : <br /> <?= $solusi ?></h5> -->
						<!-- </div> -->
						<!-- </div> -->
						<!-- </div> -->
						<div class="row justify-content-center h-100 pt-6 g-4">
							<div class="col-sm-12 col-md-6">
								<div class="card h-100 w-100 shadow rounded-lg p-3 p-md-2 p-lg-3 p-xl-5">
									<div class="card-body text-center text-md-start">
										<div class="py-3">
											<center><img class="img-fluid" src="<?php echo base_url('assets_home/public/assets/img/illustrations/details-info.png') ?>" height="150" alt="" /></center>
										</div>
										<div class="py-3">
											<center>
												<h3 class="fw-bold card-title">Berdasarkan Gejala</h3>
											</center>
											</br>
											<h5 class="card-text">

												<?php foreach ($gejala_selected as $ge) { ?>
													<li class="fw-bold lh-base text-black"> <?= $ge['nama_gejala']; ?></li>
												<?php } ?>
											</h5>
										</div>
									</div>
								</div>
							</div>
							<div class="col-sm-12 col-md-6">
								<div class="card h-100 w-100 shadow rounded-lg p-3 p-md-2 p-lg-3 p-xl-5">
									<div class="card-body text-center text-md-start">
										<div class="py-3">
											<center><img class="img-fluid" src="<?php echo base_url('assets_home/public/assets/img/illustrations/consultation.png') ?>" height="150" alt="" /></center>
										</div>
										<div class="py-3">
											<center>
												<h3 class="fw-bold card-title">Penyakit Kulit Anda</h3>
											</center>
											</br>
											<center>
												<h4 class="card-text fw-bold lh-base text-black"><?= $nama_penyakit ?></h4>
											</center>
										</div>
									</div>
								</div>
							</div>
							<div class="col-sm-12 col-md-6">
								<div class="card h-100 w-100 shadow rounded-lg p-3 p-md-2 p-lg-3 p-xl-5">
									<div class="card-body text-center text-md-start">
										<div class="py-3">
											<center><img class="img-fluid" src="<?php echo base_url('assets_home/public/assets/img/illustrations/tracking.png') ?>" height="150" alt="" /></center>
										</div>
										<div class="py-3">
											<center>
												<h3 class="fw-bold card-title">Prosentase Kemungkinan</h3>
											</center>
											</br>
											<center>
												<h4 class="card-text fw-bold lh-base text-black"><?= $perhitungan_fc ?> %</h4>
											</center>

										</div>
									</div>
								</div>
							</div>
							<div class="col-sm-12 col-md-6">
								<div class="card h-100 w-100 shadow rounded-lg p-3 p-md-2 p-lg-3 p-xl-5">
									<div class="card-body text-center text-md-start">
										<div class="py-3">
											<center><img class="img-fluid" src="<?php echo base_url('assets_home/public/assets/img/illustrations/emergency-care.png') ?>" height="150" alt="" /></center>
										</div>
										<div class="py-3">
											<center>
												<h3 class="fw-bold card-title">Saran Pengobatan</h3>
											</center>
											</br>
											<center>
												<p class="card-text  lh-base text-black"><?= $solusi ?></p>
											</center>
										</div>
									</div>
								</div>
							</div>
							<div class="text-center py-4">
								<div class="text-center py-3">
									<hr class="mx-auto" style="height:6px;width:950px" />
								</div>
								<div class="text-center py-3">
									<a class="btn btn-lg btn-outline-primary rounded-pill hover-top" href="<?php echo site_url('DiagnosaController/') ?>"> Reset </a>
									<a class="btn btn-lg btn-outline-warning rounded-pill hover-top" href="<?php echo site_url('DiagnosaController/cetak_diagnosa') ?>"> Cetak Hasil Diagnosa </a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
</section>