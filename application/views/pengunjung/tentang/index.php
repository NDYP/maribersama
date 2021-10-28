<!-- inner-apge-banner start -->
<section class="inner-page-banner bg_img overlay-3" data-background="<?= base_url('assets/depan/') ?>assets/images/inner-page-bg.jpg">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 class="page-title"><?= $title; ?></h2>
                <ol class="page-list">
                    <li><a href="<?= base_url('beranda') ?>"><i class="fa fa-home"></i> Beranda</a></li>
                    <li><?= $title; ?></li>
                </ol>
            </div>
        </div>
    </div>
</section>
<!-- inner-apge-banner end -->

<!-- features-section start -->
<section class="features-section pt-120 pb-120">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="car-search-area car-search-area--style2">
                    <h3 class="title">Belum memiliki akun?</h3>
                    <form role="form" action="<?= base_url('tentang/registrasi'); ?>" method="post" class="car-search-form">
                        <div class="row">
                            <div class="form-group col-xl-6">
                                <i class="fa fa-user"></i>
                                <input name="username" class="form-control has-icon" type="text" placeholder="Username" required>
                                <?= form_error('username', '<small class="text-danger pl-1">', '</small>'); ?>
                            </div>
                            <div class="form-group col-xl-6">
                                <i class="fa fa-lock"></i>
                                <input name="password" type="text" class="form-control has-icon" placeholder="Password" required>
                                <?= form_error('password', '<small class="text-danger pl-1">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-xl-12">
                                <input name="nik" class="form-control has-icon" type="text" placeholder="NIK" required>
                                <?= form_error('nik', '<small class="text-danger pl-1">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-xl-12">
                                <input name="nama_lengkap" class="form-control has-icon" type="text" placeholder="Nama" required>
                                <?= form_error('nama_lengkap', '<small class="text-danger pl-1">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-12 form-group">
                                <select name="jenis_kelamin">
                                    <option name="jenis_kelamin" value="" selected="">Jenis Kelamin</option>
                                    <option name="jenis_kelamin" value="Laki-Laki">Laki-Laki</option>
                                    <option name="jenis_kelamin" value="Perempuan">Perempuan</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-xl-6">
                                <i class="fa fa-map-marker"></i>
                                <input name="tempat_lahir" class="form-control has-icon" type="text" placeholder="Tempat" required>
                                <?= form_error('tempat_lahir', '<small class="text-danger pl-1">', '</small>'); ?>
                            </div>
                            <div class="form-group col-xl-6">
                                <i class="fa fa-calendar"></i>
                                <input name="tanggal_lahir" type="text" class="form-control has-icon datepicker-here" data-language="en" placeholder="Tanggal Lahir" required>
                                <?= form_error('tanggal_lahir', '<small class="text-danger pl-1">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-xl-6">
                                <i class="fa fa-phone"></i>
                                <input name="no_hp" class="form-control has-icon" type="text" placeholder="Telepon/WA" required>
                                <?= form_error('no_hp', '<small class="text-danger pl-1">', '</small>'); ?>
                            </div>
                            <div class="form-group col-xl-6">
                                <i class="fa fa-envelope"></i>
                                <input name="email" type="text" class="form-control has-icon datepicker-here" data-language="en" placeholder="Email" required>
                                <?= form_error('email', '<small class="text-danger pl-1">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-xl-12">
                                <i class="fa fa-map-marker"></i>
                                <input name="alamat" class="form-control has-icon" type="text" placeholder="Alamat" required>
                                <?= form_error('alamat', '<small class="text-danger pl-1">', '</small>'); ?>
                            </div>
                        </div>
                        <button type="submit" class="cmn-btn">Daftar</button>
                    </form>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="feature-content">
                    <h2 class="title title--border">Layanan Unggulan</h2>
                    <p>Pellentesque turpis et nonummy eu nulla. Quis gravida ultrices nam sed vel ut, vehicula adipiscing quam. Nibh vestibulum tempor, magna maecenas, vehicula donec ut nonummy cras suscipit.</p>
                </div>
                <div class="row">
                    <?php $no = 1;
                    foreach ($layanan as $x) : ?>
                        <div class="col-sm-6">
                            <div class="feature-item">
                                <div class="feature-item-header">
                                    <i class="fa <?= $x['icon'] ?>"></i>
                                    <h5 class="title"><?= $x['nama_layanan'] ?></h5>
                                </div>
                                <div class="feature-item-body">
                                    <p><?= $x['keterangan'] ?> </p>
                                </div>
                            </div>
                        </div><!-- feature-item end -->
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- features-section end -->

<!-- call-action-section start -->
<section class="call-action-section">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-5">
                <div class="call-action-img text-lg-left text-center">
                    <img src="<?= base_url('assets/depan/') ?>assets/images/elements/call-action-personj.png" alt="image">
                </div>
            </div>
            <?php foreach ($index as $x) : ?>
                <div class="col-lg-7">
                    <div class="call-cation-content">
                        <h3 class="top-title">Hubungi Kami</h3>
                        <span class="call-number"><?= $x['no_hp']; ?></span>
                        <p>Pellentesque turpis et nonummy eu nulla. Quis gravida ultrices nam sed vel ut, ve adiping quam. Nibh vestibulum tempor, magna maecenas, vehicula donec ut nonummy crascipit. Amet aliquam ut elit semper urna metus, pede.</p>
                        <a href="<?= base_url('kontak'); ?>" class="cmn-btn">kontak</a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<!-- call-action-section end -->


<!-- company-char-section start -->
<section class="company-char-section pt-120 pb-120">
    <?php foreach ($index as $x) : ?>
        <div class="container">
            <div class="row mb-50">
                <div class="col-lg-6">
                    <div class="company-char-content">
                        <h2 class="title title--border text-capitalize">Sejarah Kami</h2>
                        <p><?= $x['sejarah']; ?></p>
                        <blockquote>
                            <p><?= $x['sejarah']; ?></p>
                        </blockquote>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="company-char-thumb">
                        <img src="<?= base_url('assets/foto/profil/' . $x['logo']) ?>" alt="image">
                    </div>
                </div>
            </div>
            <div class="row mb-none-30">
                <div class="col-lg-6 col-sm-6">
                    <div class="text-item">
                        <h3 class="title">Visi</h3>
                        <p><?= $x['visi']; ?></p>
                    </div>
                </div><!-- text-item end -->
                <div class="col-lg-6 col-sm-6">
                    <div class="text-item">
                        <h3 class="title">Misi</h3>
                        <p><?= $x['misi']; ?></p>
                    </div>
                </div><!-- text-item end -->
            </div>
        </div>
    <?php endforeach; ?>
</section>
<!-- company-char-section end -->

<!-- team-section start -->
<section class="team-section pb-120">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="section-header text-center">
                    <h2 class="section-title">Tim Mari Bersaudara</h2>
                    <p> Augue urna molestie mi adipiscing vulputate pede sedmassa Praesquam massa, sodales velit turpis in tellu.</p>
                </div>
            </div>
        </div>
        <div class="row mb-none-30">
            <?php $no = 1;
            foreach ($karyawan as $x) : ?>

                <div class="col-lg-3 col-sm-6">
                    <div class="team-item team-item--style2">
                        <div class="thumb">
                            <img src="<?= base_url('assets/foto/pengguna/' . $x['foto']); ?>" alt="image">
                        </div>
                        <div class="content">
                            <h5 class="name"><?= $x['nama_lengkap'] ?></h5>
                            <span class="designation"><?= $x['jabatan'] ?></span>
                            <ul class="details-list">
                                <li><a href=""><?= $x['email'] ?></a></li>
                                <li><a href=""><?= $x['no_hp'] ?></a></li>

                            </ul>
                        </div>
                    </div>
                </div><!-- team-item end -->
            <?php endforeach; ?>
        </div>
    </div>
</section>
<!-- team-section end -->