<!DOCTYPE html>
<html lang="zxx" class="no-js">
<head>
	<!-- Mobile Specific Meta -->
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- Favicon-->
	<link rel="shortcut icon" href="<?php echo base_url();?>assets/img/iconweb.png">
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
	<style>
    body {
		font-family: 'Varela Round', sans-serif;
	}
	.modal-login {		
		color: #636363;
		width: 350px;
		margin: 80px auto 0;
	}
	.modal-login .modal-content {
		padding: 20px;
		border-radius: 5px;
		border: none;
	}
	.modal-login .modal-header {
		border-bottom: none;   
        position: relative;
        justify-content: center;
	}
	.modal-login h4 {
		text-align: center;
		font-size: 26px;
		margin: 30px 0 -15px;
	}
	.modal-login .form-control:focus {
		border-color: #70c5c0;
	}
	.modal-login .form-control, .modal-login .btn {
		min-height: 40px;
		border-radius: 3px; 
	}
	.modal-login .close {
        position: absolute;
		top: -5px;
		right: -5px;
	}	
	.modal-login .modal-footer {
		background: #ecf0f1;
		border-color: #dee4e7;
		text-align: center;
        justify-content: center;
		margin: 0 -20px -20px;
		border-radius: 5px;
		font-size: 13px;
	}
	.modal-login .modal-footer a {
		color: #999;
	}		
	.modal-login .avatar {
		position: absolute;
		margin: 0 auto;
		left: 0;
		right: 0;
		top: -70px;
		width: 95px;
		height: 95px;
		border-radius: 50%;
		z-index: 9;
		background: #DEB887;
		padding: 15px;
		box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.1);
	}
	.modal-login .avatar img {
		width: 100%;
	}
    .modal-login .btn {
        color: #fff;
        border-radius: 4px;
		background: #8B4513;
		text-decoration: none;
		transition: all 0.4s;
        line-height: normal;
        border: none;
    }
	.modal-login .btn:hover, .modal-login .btn:focus {
		background: #FFF8DC;
		outline: none;
	}
	.trigger-btn {
		display: inline-block;
		margin: 100px auto;
	}
</style>
</head>
<body>
	
	<!-- #header -->
	<?php $this->load->view('header.php')?>
	<!-- #header -->

	<!-- Start banner Area -->
	<section class="generic-banner" style="height:200px;">
		<div class="container">
			<div class="row height align-items-center justify-content-center">
				<div class="col-lg-10">
					<div class="generic-banner-content">
						<h1 class="text-white" style="margin-top:-200px">Menu Diagnosa</h1>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- End banner Area -->

	<!-- Start menu Area -->
	<section class="menu-area section-gap" id="galeri">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="single-menu">
					<?php $error=$this->session->flashdata('message');
					if($error) {?>
					<div class="alert alert-danger alert-dismissable">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
					<?php echo $error; ?>
					</div>
					<?php }?>
						<div class="title-div justify-content-between d-flex">
							<h2>Pilih Gejala</h2>
						</div>
						<div class="card">
							<form action="<?= base_url('Hasildiagnosa/diagnosa') ?>" method="post">
								<input type="hidden" name="m" value="hasil" />
								<div class="panel panel-default">
									<div class="card-body">
										<table class="table  table-bordered table-hover table-striped text-dark">
											<thead>
												<tr>
													<th>No.</th>
													<th>Nama Gejala</th>
													<th></th>
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
										<div class="panel-footer">
											<button type="submit" class="genric-btn primary e-large">
											<span class="fas fa-check-circle"></span>
											<span style="font-size: 15px">Cek Diagnosa</span>
											</button>
										</div>
									</div>
								</div>
							</form>
						</div>					
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- End menu Area -->

	<!-- start footer Area -->
	<?php $this->load->view('footer.php')?>
	<!-- End footer Area -->

	<script src="<?php echo base_url('assets/')?>js/vendor/jquery-2.2.4.min.js"></script>
	<script src="<?php echo base_url('assets/')?>js/vendor/bootstrap.min.js"></script>
	<script src="<?php echo base_url('assets/')?>js/easing.min.js"></script>
	<script src="<?php echo base_url('assets/')?>js/hoverIntent.js"></script>
	<script src="<?php echo base_url('assets/')?>js/superfish.min.js"></script>
	<script src="<?php echo base_url('assets/')?>js/jquery.ajaxchimp.min.js"></script>
	<script src="<?php echo base_url('assets/')?>js/jquery.magnific-popup.min.js"></script>
	<script src="<?php echo base_url('assets/')?>js/owl.carousel.min.js"></script>
	<script src="<?php echo base_url('assets/')?>js/jquery.sticky.js"></script>
	<script src="<?php echo base_url('assets/')?>js/jquery.nice-select.min.js"></script>
	<script src="<?php echo base_url('assets/')?>js/parallax.min.js"></script>
	<script src="<?php echo base_url('assets/')?>js/waypoints.min.js"></script>
	<script src="<?php echo base_url('assets/')?>js/jquery.counterup.min.js"></script>
	<script src="<?php echo base_url('assets/')?>js/mail-script.js"></script>
	<script src="<?php echo base_url('assets/')?>js/main.js"></script>
</body>
</html>