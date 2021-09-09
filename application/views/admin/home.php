<!DOCTYPE html>
<html lang="en">
<!-- Header -->
<?php $this->load->view('admin/template/header.php') ?>
<!-- End Header -->

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <a class="navbar-brand" href="#">S I P A K U</a>
        <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
        <!-- Navbar -->
        <?php $this->load->view('admin/template/navbar.php') ?>
        <!-- End Navbar -->
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <!-- Sidebar -->
                <?php $this->load->view('admin/template/sidebar.php') ?>
                <!-- End Sidebar -->
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4"></h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                        <div class="content" style="text-align: center;">
                            <!-- <h2>Welcome <?php echo $this->session->userdata("nama"); ?></h2> -->
                            <img src="assets/img/admin.png" class="img-fluid" alt="hd" width="1100">
                        </div>
                        <div class="content" style="text-align: center;">
                            <h1>SISTEM PAKAR PENYAKIT KULIT</h1>
                        </div>
                        </br>

                        <div class="row">
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-primary text-white mb-4">
                                    <div class="card-body">Hama dan Penyakit</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="<?php echo base_url('Hamapenyakit') ?>">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-warning text-white mb-4">
                                    <div class="card-body">Gejala</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="<?php echo base_url('Gejala') ?>">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-success text-white mb-4">
                                    <div class="card-body">Basis Kasus</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="<?php echo base_url('Basis') ?>">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-danger text-white mb-4">
                                    <div class="card-body">Riwayat Diagnosa</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="<?php echo base_url('Riwayatdiagnosa') ?>">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                </main>
                <!-- footer -->
                <?php $this->load->view('admin/template/footer.php') ?>
                <!-- end footer -->