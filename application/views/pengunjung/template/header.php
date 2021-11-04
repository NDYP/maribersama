<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Rental - Mari Bersaudara</title>
    <!-- site favicon -->
    <link rel="shortcut icon" type="<?= base_url('assets/depan/') ?>image/png"
        href="<?= base_url('assets/depan/') ?>assets/images/favicon.jpg">
    <!-- fontawesome css link -->
    <link rel="stylesheet" href="<?= base_url('assets/depan/') ?>assets/css/fontawesome.min.css">
    <!-- bootstrap css link -->
    <link rel="stylesheet" href="<?= base_url('assets/depan/') ?>assets/css/bootstrap.min.css">
    <!-- lightcase css link -->
    <link rel="stylesheet" href="<?= base_url('assets/depan/') ?>assets/css/lightcase.css">
    <!-- animate css link -->
    <link rel="stylesheet" href="<?= base_url('assets/depan/') ?>assets/css/animate.css">
    <!-- nice select css link -->
    <link rel="stylesheet" href="<?= base_url('assets/depan/') ?>assets/css/nice-select.css">
    <!-- datepicker css link -->
    <link rel="stylesheet" href="<?= base_url('assets/depan/') ?>assets/css/datepicker.min.css">
    <!-- wickedpicker css link -->
    <link rel="stylesheet" href="<?= base_url('assets/depan/') ?>assets/css/wickedpicker.min.css">
    <!-- jquery ui css link -->
    <link rel="stylesheet" href="<?= base_url('assets/depan/') ?>assets/css/jquery-ui.min.css">
    <!-- owl carousel css link -->
    <link rel="stylesheet" href="<?= base_url('assets/depan/') ?>assets/css/owl.carousel.min.css">
    <!-- main style css link -->
    <link rel="stylesheet" href="<?= base_url('assets/depan/') ?>assets/css/main.css">
    <!-- DataTables -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.11.3/datatables.min.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">


</head>

<body>

    <!-- preloader start -->
    <div id="preloader"></div>
    <!-- preloader end -->

    <!--  header-section start  -->
    <header class="header-section">
        <div class="header-top">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-3">
                        <ul class="social-links">
                            <li><a href="#0"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#0"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#0"><i class="fa fa-linkedin"></i></a></li>
                            <li><a href="#0"><i class="fa fa-google-plus"></i></a></li>
                        </ul>
                    </div>
                    <div class="col-lg-6">
                        <ul class="header-info d-flex justify-content-center">
                            <?php foreach ($kontak as $x) : ?>
                            <li>
                                <i class="fa fa-map-marker"></i>
                                <p><?= $x['alamat'] ?></p>
                            </li>
                            <?php endforeach; ?>
                            <li>
                                <i class="fa fa-clock-o"></i>
                                <p>Sat - Fri Day 08:00 am - 5.00 pm Sunday Holyday</p>
                            </li>
                        </ul>
                    </div>
                    <div class="col-lg-3">
                        <div class="header-action d-flex align-items-center justify-content-end">

                            <div class="login-reg">
                                <?php if ($this->session->userdata('id_pengguna')) : ?>
                                <a href="<?= base_url('login/logout') ?>">Logout</a>
                                <?php else : ?>
                                <a href="<?= base_url('login/index') ?>">Login</a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-bottom">
            <div class="container">
                <nav class="navbar navbar-expand-lg p-0">
                    <a class="site-logo site-title" href="index.html"><img
                            src="<?= base_url('assets/depan/') ?>assets/images/logo1.png" alt="site-logo"><span
                            class="logo-icon"><i class="flaticon-fire"></i></span></a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="menu-toggle"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav main-menu mr-auto">

                            <li><a href="<?= base_url('beranda') ?>">Beranda</a>
                            <li><a href="<?= base_url('tentang') ?>">Tentang</a>
                            <li><a href="<?= base_url('katalog') ?>">Katalog</a>

                            <li><a href="<?= base_url('berita') ?>">Berita</a>
                            <li><a href="<?= base_url('galeri') ?>">Galeri</a>
                                <?php if ($this->session->userdata('id_pengguna')) : ?>
                            <li class="menu_has_children"><a href="#0">Akun</a>
                                <ul class="sub-menu">
                                    <li><a href="<?= base_url('akun/history') ?>">riwayat sewa</a></li>
                                    <?php if ($this->session->userdata('id_akses') == 4) : ?>
                                    <li><a href="<?= base_url('akun/pengajuan') ?>">pengajuan partner</a></li>
                                    <?php endif; ?>
                                    <li><a href="<?= base_url('login/logout') ?>">logout</a></li>
                                </ul>
                            </li>
                            <?php endif ?>
                            <li><a href="<?= base_url('kontak') ?>">Kontak</a></li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div><!-- header-bottom end -->
    </header>
    <!--  header-section end  -->