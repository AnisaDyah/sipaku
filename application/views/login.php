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


									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>