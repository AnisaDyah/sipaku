<!DOCTYPE html>
<html lang="en-US" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <!-- ===============================================-->
    <!--    Document Title-->
    <!-- ===============================================-->
    <title>SIPAKU</title>


    <!-- ===============================================-->
    <!--    Favicons-->
    <!-- ===============================================-->
    <link href="<?php echo base_url('assets_home/public/assets/img/favicons/apple-touch-icon.png') ?>" rel="apple-touch-icon" sizes="180x180">
    <link href="<?php echo base_url('assets_home/public/assets/img/favicons/favicon-32x32.png') ?>" rel="icon" type="image/png" sizes="32x32">
    <link href="<?php echo base_url('assets_home/public/assets/img/favicons/favicon-16x16.png') ?>" rel="icon" type="image/png" sizes="16x16">
    <link href="<?php echo base_url('assets_home/public/assets/img/favicons/favicons.ico') ?>" rel="shortcut icon" type="image/x-icon">
    <link href="<?php echo base_url('assets_home/public/assets/img/favicons/manifest.json') ?>" rel="manifest">
    <meta content="<?php echo base_url('assets_home/public/assets/img/favicons/mstile-150x150.png') ?>" name="msapplication-TileImage">
    <meta name="theme-color" content="#ffffff">

    <link rel="stylesheet" href="<?php echo base_url('assets_home/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') ?>">
    <script src="<?php echo base_url('assets_home/public/ajax/libs/font-awesome/5.11.2/js/all.min.js') ?>" crossorigin="anonymous"></script>




    <!-- ===============================================-->
    <!--    Stylesheets-->
    <!-- ===============================================-->
    <link href="<?php echo base_url('assets_home/public/assets/css/theme.css') ?>" rel="stylesheet" />

</head>

<!-- ============================================-->

<body>
    <!-- ===============================================-->
    <!--    Main Content-->
    <!-- ===============================================-->
    <main class="main" id="top">
        <nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" data-navbar-on-scroll="data-navbar-on-scroll">
            <div class="container"><a class="navbar-brand d-flex align-items-center fw-bold fs-2" href="<?php echo base_url('Dashboard') ?>">
                    <img class="d-inline-block me-3" src="<?php echo base_url('assets_home/public/assets/img/logo.png') ?>" alt="" />SIPAKU</a>
                <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse border-top border-lg-0 mt-4 mt-lg-0" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto pt-2 pt-lg-0">

                        <li class="nav-item"><a class="nav-link" href="<?php echo base_url('Dashboard') ?>">HOME </a></li>
                        <li class="nav-item"><a class="nav-link" href="Dashboard/#tentang">TENTANG SIPAKU</a></li>

                        <!-- <li class="nav-item" data-toggle="modal" data-target="#login-modal">LOGIN</li> -->
                        <?php if ($this->session->userdata('status') != "login") { ?>
                            <li class="nav-item"><a class="nav-link" href="<?php echo base_url('Login') ?>">LOGIN </a></li>
                        <?php } else { ?>
                            <li class="nav-item"><a class="nav-link" href="<?php echo base_url('Login/logout') ?>">LOGOUT</a></li>
                        <?php } ?>

                    </ul>
                </div>
            </div>
        </nav>