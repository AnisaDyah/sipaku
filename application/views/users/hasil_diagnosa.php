
		<section class="py-6 py-lg-8" id="diagnosa">
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

                                        <div class="text-center py-3">
                                            <hr class="mx-auto" style="height:2px;width:350px" />
										</div>
										<div class="text-center py-3">
                                            <a class="btn btn-lg btn-success rounded-pill" href="<?php echo site_url('DiagnosaController/') ?>"> Reset </a>
                                            <a class="btn btn-lg btn-warning rounded-pill" href="<?php echo site_url('DiagnosaController/cetak_diagnosa') ?>"> Cetak Hasil Diagnosa </a>
                                        </div>

									<!-- </form> -->
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>