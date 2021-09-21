<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title><?php echo $this->session->userdata("layoutSidenav"); ?></title>
    <link href="<?php echo base_url('assets/img/favicons/apple-touch-icon.png') ?>" rel="apple-touch-icon" sizes="180x180">
    <link href="<?php echo base_url('assets/img/favicons/favicon-32x32.png') ?>" rel="icon" type="image/png" sizes="32x32">
    <link href="<?php echo base_url('assets/img/favicons/favicon-16x16.png') ?>" rel="icon" type="image/png" sizes="16x16">
    <link href="<?php echo base_url('assets/img/favicons/favicons.ico') ?>" rel="shortcut icon" type="image/x-icon">
    <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/styles.css') ?>">
    <link href="<?php echo base_url('assets/css/dataTables.bootstrap4.min.css') ?>" rel="stylesheet" crossorigin="anonymous" />
    <script src="<?php echo base_url('assets/ajax/libs/font-awesome/5.11.2/js/all.min.js') ?>" crossorigin="anonymous"></script>
</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <a class="navbar-brand" href="<?php echo base_url('Admin') ?>"> <img class="d-inline-block me-3" src="<?php echo base_url('assets_home/public/assets/img/logo.png') ?>" alt="" />&nbsp;&nbsp;&nbsp;S I P A K U</a>

        <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
        <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
        </form>
        <ul class="navbar-nav ml-auto ml-md-0">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="userDropdown" href="<?php echo base_url('Login/logout') ?>" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img src="<?php echo base_url('assets/img/icon_dokter2.png') ?>" width="50" height="50">

                    <!-- <i class="fas fa-user fa-fw"></i> -->
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                    <a class="dropdown-item" href="<?php echo base_url('Login/logout') ?>">Logout</a>
                </div>

            </li>
        </ul>
    </nav>

    <!-- Navbar -->
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading">

                            <!-- menu profile quick info -->
                            <center><img src="<?php echo base_url('assets/img/icon_dokter2.png') ?>" width="100" height="100"></center>
                            <div class="profile clearfix">
                                <center>
                                    <div class="profile_info">
                                        <span><b>Welcome, <?php echo $this->session->userdata('nama') ?></b></span>
                                    </div>
                                </center>
                            </div>
                        </div>
                        <a class="nav-link" href="<?php echo base_url('Admin') ?>">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Dashboard
                        </a>
                        <a class="nav-link" href="<?php echo base_url('UserController') ?>">
                            <div class="sb-nav-link-icon"><i class="fas fa-user-circle"></i></div>
                            Users
                        </a>
                        <a class="nav-link" href="<?php echo base_url('GejalaController') ?>">
                            <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                            Gejala
                        </a>
                        <a class="nav-link" href="<?php echo base_url('PenyakitController') ?>">
                            <div class="sb-nav-link-icon"><i class="fas fa-clipboard"></i></div>
                            Penyakit Kulit
                        </a>

                        <!-- <a class="nav-link" href="<?php echo base_url('Solusi') ?>">
                                <div class="sb-nav-link-icon"><i class="fas fa-clipboard"></i></div>
                                Solusi
                            </a> -->
                        <a class="nav-link" href="<?php echo base_url('Basis') ?>">
                            <div class="sb-nav-link-icon"><i class="fas fa-database"></i></div>
                            Basis Kasus
                        </a>
                        <a class="nav-link" href="<?php echo base_url('KasusController') ?>">
                            <div class="sb-nav-link-icon"><i class="fas fa-database"></i></div>
                            Kasus Penyakit Kulit
                        </a>

                        <a class="nav-link" href="<?php echo base_url('RiwayatDiagnosaController') ?>">
                            <div class="sb-nav-link-icon"><i class="fas fa-history"></i></div>
                            Riwayat Diagnosa
                        </a>
                        <!-- <a class="nav-link" href="<?php echo base_url('Revisi') ?>">
                            <div class="sb-nav-link-icon"><i class="fas fa-question-circle"></i></div>
                            Revisi
                        </a> -->
                    </div>
                </div>
            </nav>
        </div>