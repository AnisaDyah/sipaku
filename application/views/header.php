	<!-- #header -->
	<header id="header">
		<div class="container">
			<div class="row align-items-center justify-content-between d-flex">
				<div id="logo">
					<a href="">
					<img src="<?php echo base_url('assets/img/iconweb.png')?>" style="margin-left: 20px;height: 50px; width: 50px" alt="" title="">
					</a>
				</div>
				<nav id="nav-menu-container">
					<ul class="nav-menu sf-js-enabled sf-arrows" style="touch-action: pan-y;">
						<li><a href="/Sipako/#beranda"><i class="fas fa-home">&nbsp;</i>BERANDA</a></li>
						<li><a href="/Sipako/#galeri"><i class="fas fa-images">&nbsp;</i>GALERI</a></li>
						<li><a href="/Sipako/#info"><i class="fas fa-info-circle"></i>&nbsp; INFORMASI</a></li>
						<li>
<a class="btn" data-toggle="modal" data-target="#login-modal" style="border-radius: 30px; background-color: #FFFACD; color: black; ">
						<i class="fas fa-user">&nbsp;</i> LOGIN </a>
						</li>
						<!-- <li>
							<a href="<?php echo site_url()?>Login" class="btn" style="border-radius: 30px; background-color: #f4b200; color: black; " >LOGIN</a>
						</li> -->
					</ul>
				</nav>
			</div>
		</div>	
	</header>
	<!-- #header -->

		<!-- Modal Login -->
		<div id="login-modal" class="modal fade">
		<div class="modal-dialog modal-login">
			<div class="modal-content">
				<div class="modal-header">
					<div class="avatar">
					<img src="<?php echo base_url('assets/img/avatar.png')?>" alt="Avatar">
					</div>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">
					<form action="<?php echo site_url('Admin')?>" method="post">
					<div class="form-group">
						<input type="text" class="form-control" name="username" placeholder="Username" required="required">
					</div>
					<div class="form-group">
						<input type="password" class="form-control" name="password" placeholder="Password" required="required">
					</div>
					<div class="form-group">
						<button type="submit" class="btn btn-primary btn-lg btn-block login-btn">Login</button>
					</div>
					</form>
				</div>
			</div>
		</div>
	</div>