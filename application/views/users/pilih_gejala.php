<section class="py-6 py-lg-8">
	<div class="bg-holder" style="background-image:url(<?php echo base_url('assets_home/public/assets/img/illustrations/dot.png') ?>);background-position:right top;background-size:auto;margin-top:50px;">
	</div>
	<div class="bg-holder" style="background-image:url(<?php echo base_url('assets_home/public/assets/img/illustrations/dot.png') ?>);background-position:left top;background-size:auto;margin-top:50px;">
	</div>
	<div class="bg-holder" style="background-image:url(<?php echo base_url('assets_home/public/assets/img/bgs.png') ?>);background-position:center top;background-size:auto;margin-bottom:100px;opacity: 0.5;">
	</div>
	<div class="bg-holder" style="background-image:url(<?php echo base_url('assets_home/public/assets/img/illustrations/dot.png') ?>);background-position:right bottom;background-size:auto;margin-bottom:50px;">
	</div>
	<div class="bg-holder" style="background-image:url(<?php echo base_url('assets_home/public/assets/img/dk.png') ?>);background-position:left bottom;background-size:auto 45%;margin-bottom:100px;opacity: 0.5;">
	</div>
	<div class="bg-holder" style="background-image:url(<?php echo base_url('assets_home/public/assets/img/illustrations/article-bg.png') ?>);background-position:right center;background-size:auto;">
	</div>
	<div class="bg-holder" style="background-image:url(<?php echo base_url('assets_home/public/assets/img/illustrations/dot-2.png') ?>);background-position:center right;background-size:auto;margin-left:-180px;margin-top:20px;">
	</div>

	<!--/.bg-holder-->

	<div class="container">
		<div class="row h-100">
			<div class="col-12">
				<div class="card text-white bg-primary-gradient">
					<div class="row g-xl-0 align-items-center card-body p-2 p-md-4 p-lg-4">
						<div class="col-md-12 text-center text-md-start">
							<?php
							if ($this->session->flashdata('notif')) {
							?>
								<div class="alert alert-danger alert-dismissible fade show" role="alert">
									<?= $this->session->flashdata('notif') ?>
									<!-- <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button> -->
									<!-- <button type="button" class="btn btn-lg btn-warning rounded-pill" data-dismiss="alert" aria-label="Close">
										<span aria-hidden="true">&times;</span> -->
									</button>
								</div>
							<?php
							}
							?>
							<h4 class="fw-bold lh-base text-center text-white">Jawablah pertanyaan ini sesuai yang anda rasakan !</h4>
							<hr class="mx-auto" style="height:2px;width:350px" />

							<form action="<?= base_url('DiagnosaController/diagnosa') ?>" method="post">

								<div class="form-group">
									<div class="row justify-content-center">
										<div class="col-md-6 mb-2 text-left">

											<!-- <input type="text" class="form-control" name="username" placeholder="Username" required="required"> -->
											<!-- <h3 class="fw-bold lh-base text-center text-white">Apakah Kulit Anda <?= $nama_gejala ?></h3> -->
											<table class="table table-light table-striped table-bordered">
												<thead class="table-secondary">
													<tr>
														<th>No.</th>
														<th>Nama Gejala</th>
														<th>Chek</th>
													</tr>
												</thead>
												<?php foreach ($data as $v) : ?>
													<tr>
														<td><?= $v['id_gejala']; ?></td>
														<td><?= $v['nama_gejala']; ?></td>
														<td><input type="checkbox" name="gejala[]" id="gejala[]" value=<?= $v['id_gejala']; ?> /></td>
													</tr>
												<?php endforeach; ?>
											</table>

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
                                            <a class="btn btn-lg btn-warning rounded-pill" href="<?php echo site_url('DiagnosaController/cek_diagnosa/1/' . $id_gejala) ?>"> Ya </a>
                                            <a class="btn btn-lg btn-danger rounded-pill" href="<?php echo site_url('DiagnosaController/cek_diagnosa/0/' . $id_gejala) ?>"> Tidak </a>
                                        </div>
                                        <div class="text-center py-3">
                                            <hr class="mx-auto" style="height:2px;width:350px" />
										</div> -->
								<div class="text-center py-3">
									<button type="submit" class="btn btn-lg btn-warning rounded-pill hover-top">
										<span class="fas fa-check-circle"></span>
										<span style="font-size: 15px">Cek Diagnosa</span>
									</button>
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