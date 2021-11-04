<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Mari Bersaudara | Administrator</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>bower_components/Ionicons/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
    folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>dist/css/skins/_all-skins.min.css">
    <!-- DataTables -->
    <link rel="stylesheet"
        href="<?= base_url('assets/'); ?>bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
    <!-- daterange picker -->
    <link rel="stylesheet"
        href="<?= base_url('assets/'); ?>bower_components/bootstrap-daterangepicker/daterangepicker.css">
    <!-- bootstrap datepicker -->
    <link rel="stylesheet"
        href="<?= base_url('assets/'); ?>bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
    <!-- iCheck for checkboxes and radio inputs -->
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>plugins/iCheck/all.css">
    <!-- Bootstrap Color Picker -->
    <link rel="stylesheet"
        href="<?= base_url('assets/'); ?>bower_components/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css">
    <!-- Bootstrap time Picker -->
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>plugins/timepicker/bootstrap-timepicker.min.css">
    <!-- Select2 -->
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>bower_components/select2/dist/css/select2.min.css">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

    <link rel="stylesheet" href="<?= base_url('assets/'); ?>plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">


    <!-- Select2 -->
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>bower_components/select2/dist/css/select2.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>dist/css/skins/_all-skins.min.css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<!-- ADD THE CLASS layout-top-nav TO REMOVE THE SIDEBAR. -->

<body class="hold-transition skin-red layout-top-nav">
    <div class="wrapper">
        <header class="main-header">
            <nav class="navbar navbar-static-top">
                <div class="container">
                    <div class="navbar-header">
                        <a href="<?= base_url('admin/dashboard/index'); ?>"
                            class="navbar-brand"><b>MariBersaudara</b>Rent</a>
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                            data-target="#navbar-collapse">
                            <i class="fa fa-bars"></i>
                        </button>
                    </div>
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
                        <ul class="nav navbar-nav">
                            <?php if ($this->session->userdata('username_admin')) : ?>
                            <li class="<?= $this->uri->segment(2) == 'dashboard' ? 'active' : ''; ?>"><a
                                    href="<?= base_url('admin/dashboard/index'); ?>">Dashboard <span
                                        class="sr-only"></span></a></li>

                            <li class="<?= $this->uri->segment(2) == 'transaksi' ? 'active' : ''; ?>"><a
                                    href="<?= base_url('admin/transaksi/index'); ?>">Transaksi</a></li>

                            <li
                                class="dropdown <?= $this->uri->segment(2) == 'partner' && $this->uri->segment(3) == 'pengajuan'
                                                        || $this->uri->segment(2) == 'mobil' && $this->uri->segment(3) == 'pengajuan' ? 'active' : ''; ?>">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Pengajuan <span
                                        class="caret"></span></a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="<?= base_url('admin/partner/pengajuan'); ?>">Partner</a></li>
                                    <li><a href="<?= base_url('admin/mobil/pengajuan'); ?>">Mobil</a></li>
                                </ul>
                            </li>
                            <li
                                class="dropdown <?= $this->uri->segment(2) == 'partner' && $this->uri->segment(3) == 'index'
                                                        || $this->uri->segment(2) == 'mobil' && $this->uri->segment(3) == 'index'
                                                        || $this->uri->segment(2) == 'customer' && $this->uri->segment(3) == 'index'
                                                        || $this->uri->segment(2) == 'karyawan' && $this->uri->segment(3) == 'index'
                                                        || $this->uri->segment(2) == 'admin' && $this->uri->segment(3) == 'index' ? 'active' : ''; ?>">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Master <span
                                        class="caret"></span></a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="<?= base_url('admin/partner/index'); ?>">Partner</a></li>
                                    <li><a href="<?= base_url('admin/mobil/index'); ?>">Mobil</a></li>
                                    <li><a href="<?= base_url('admin/customer/index'); ?>">Customer</a></li>
                                    <li><a href="<?= base_url('admin/karyawan/index'); ?>">Karyawan</a></li>
                                    <li><a href="<?= base_url('admin/admin/index'); ?>">Admin</a></li>
                                </ul>
                            </li>
                            <li class="dropdown <?= $this->uri->segment(2) == 'profil'
                                                        || $this->uri->segment(2) == 'layanan' ? 'active' : ''; ?>">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Setting <span
                                        class="caret"></span></a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="<?= base_url('admin/profil/index'); ?>">Profil</a></li>

                                    <li><a href="<?= base_url('admin/layanan/index'); ?>">Layanan</a></li>
                                </ul>
                            </li>
                            <li class="<?= $this->uri->segment(2) == 'galeri' ? 'active' : ''; ?>">
                                <a href="<?= base_url('admin/galeri/index'); ?>">Galeri</a>
                            </li>
                            <li class="<?= $this->uri->segment(2) == 'berita' ? 'active' : ''; ?>">
                                <a href="<?= base_url('admin/berita/index'); ?>">Berita</a>
                            </li>
                            <?php else : ?>
                            <li class="<?= $this->uri->segment(2) == 'pengajuan' ? 'active' : ''; ?>"><a
                                    href="<?= base_url('admin/pengajuan/index'); ?>">Pengajuan</a></li>
                            <li class="<?= $this->uri->segment(2) == 'history' ? 'active' : ''; ?>"><a
                                    href="<?= base_url('admin/history/index'); ?>">History</a></li>
                            <?php endif; ?>
                        </ul>
                    </div>
                    <!-- /.navbar-collapse -->
                    <!-- Navbar Right Menu -->
                    <div class="navbar-custom-menu">
                        <ul class="nav navbar-nav">
                            <?php if ($this->session->userdata('username_admin')) : ?>
                            <!-- Messages: style can be found in dropdown.less-->
                            <li class="dropdown messages-menu">
                                <!-- Menu toggle button -->
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="fa fa-envelope-o"></i>
                                    <span class="label label-success"><?= $pesan; ?></span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li class="header">Anda memeiliki <?= $pesan; ?> pesan baru</li>
                                    <li>
                                        <!-- inner menu: contains the messages -->
                                        <ul class="menu">
                                            <?php foreach ($pesan_index as $x) : ?>
                                            <li>
                                                <!-- start message -->
                                                <a href="<?= base_url('admin/pesan/index') ?>">
                                                    <div class="pull-left">
                                                        <!-- User Image -->
                                                        <img src="<?= base_url('assets/'); ?>dist/img/user2-160x160.jpg"
                                                            class="img-circle" alt="User Image">
                                                        <input type="hidden" name="id_pesan"
                                                            value="<?= $x['id_pesan'] ?>">
                                                    </div>
                                                    <!-- Message title and timestamp -->
                                                    <h4>
                                                        <?= $x['nama'] ?>
                                                        <small><i class="fa fa-clock-o"></i>
                                                            <?= $x['tanggal'] ?></small>
                                                    </h4>
                                                    <!-- The message -->
                                                    <p><?= word_limiter($x['pesan'], 5); ?></p>
                                                </a>
                                            </li>
                                            <!-- end message -->
                                            <?php endforeach; ?>
                                        </ul>
                                        <!-- /.menu -->
                                    </li>
                                    <li class="footer"><a href="<?= base_url('admin/pesan/index') ?>">See All
                                            Messages</a></li>
                                </ul>
                            </li>
                            <!-- /.messages-menu -->

                            <!-- Notifications Menu -->
                            <li class="dropdown notifications-menu">
                                <!-- Menu toggle button -->
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="fa fa-bell-o"></i>
                                    <span class="label label-warning">
                                        <?= $pengajuan_partner + $pengajuan_mobil; ?></span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li class="header">Anda memiliki <?= $pengajuan_partner + $pengajuan_mobil; ?></li>
                                    <li>
                                        <!-- Inner Menu: contains the notifications -->
                                        <ul class="menu">
                                            <li>
                                                <!-- start notification -->
                                                <a href="<?= base_url('admin/partner/pengajuan') ?>">
                                                    <i class="fa fa-users text-aqua"></i> <?= $pengajuan_partner; ?>
                                                    pengajuan partner baru
                                                </a>
                                            </li>
                                            <li>
                                                <!-- start notification -->
                                                <a href="<?= base_url('admin/mobil/pengajuan') ?>">
                                                    <i class="fa fa-users text-aqua"></i>
                                                    <?= $pengajuan_mobil; ?>
                                                    pengajuan mobil baru
                                                </a>
                                            </li>
                                            <!-- end notification -->
                                        </ul>
                                    </li>

                                </ul>
                            </li>
                            <?php endif; ?>
                            <!-- User Account Menu -->
                            <li class="dropdown user user-menu">
                                <!-- Menu Toggle Button -->
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <!-- The user image in the navbar-->
                                    <img src="<?= base_url('assets/foto/pengguna/' . $this->session->userdata('foto')); ?>"
                                        class="user-image" alt="User Image">
                                    <!-- hidden-xs hides the username on small devices so only the image appears. -->
                                    <span class="hidden-xs"><?= $this->session->userdata('nama_lengkap'); ?></span>
                                </a>
                                <ul class="dropdown-menu">
                                    <!-- The user image in the menu -->
                                    <li class="user-header">
                                        <img src="<?= base_url('assets/foto/pengguna/' . $this->session->userdata('foto')); ?>"
                                            class="img-circle" alt="User Image">
                                        <p>
                                            <?= $this->session->userdata('nama_lengkap'); ?>
                                            <small>Member since <?= $this->session->userdata('daftar'); ?></small>
                                        </p>
                                    </li>
                                    <!-- Menu Body -->

                                    <!-- Menu Footer-->
                                    <li class="user-footer">
                                        <div class="pull-left">
                                            <a href="<?= base_url('admin/akun/profil'); ?>"
                                                class="btn btn-default btn-flat">Akun</a>
                                        </div>
                                        <div class="pull-right">
                                            <a href="<?= base_url('admin/login/logout'); ?>"
                                                class="btn btn-default btn-flat">keluar</a>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <!-- /.navbar-custom-menu -->
                </div>
                <!-- /.container-fluid -->
            </nav>
        </header>