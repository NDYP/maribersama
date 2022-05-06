<!-- inner-apge-banner start -->
<section class="inner-page-banner bg_img overlay-3"
    data-background="<?= base_url('assets/depan/') ?>assets/images/inner-page-bg.jpg">
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
<!-- counter-section start -->
<div class="counter-section bg_img overlay-main"
    data-background="<?= base_url('assets/depan/') ?>assets/images/bg1.jpg">
    <div class="container">
        <div class="row mb-none-30">
            <div class="col-lg-3 col-sm-6">
                <div class="counter-item counter-item--style2">
                    <div class="icon">
                        <i class="fa fa-car"></i>
                    </div>
                    <div class="content">
                        <span class="counter"><?= $jumlah_mobil; ?></span>
                        <span class="title">total car</span>
                    </div>
                </div>
            </div><!-- counter-item end -->
            <div class="col-lg-3 col-sm-6">
                <div class="counter-item counter-item--style2">
                    <div class="icon">
                        <i class="fa fa-smile-o"></i>
                    </div>
                    <div class="content">
                        <span class="counter"><?= $jumlah_customer; ?></span>
                        <span class="title">customer</span>
                    </div>
                </div>
            </div><!-- counter-item end -->
            <div class="col-lg-3 col-sm-6">
                <div class="counter-item counter-item--style2">
                    <div class="icon">
                        <i class="fa fa-book"></i>
                    </div>
                    <div class="content">
                        <span class="counter"><?= $jumlah_transaksi; ?></span>
                        <span class="title">transaksi</span>
                    </div>
                </div>
            </div><!-- counter-item end -->
            <div class="col-lg-3 col-sm-6">
                <div class="counter-item counter-item--style2">
                    <div class="icon">
                        <i class="fa fa-users"></i>
                    </div>
                    <div class="content">
                        <span class="counter"><?= $jumlah_partner; ?></span>
                        <span class="title">partner</span>
                    </div>
                </div>
            </div><!-- counter-item end -->
        </div>
    </div>
</div>
<!-- counter-section end -->
<!-- choose-car-section start -->
<section class="choose-car-section pt-120 pb-120">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="section-header text-center">
                    <h2 class="section-title">Mobil Rental Terbaru</h2>
                    <!-- <p>Pellentesque turpis et nonummy eu nulla. Quis gravida ultrices nam sed vel ut, vehicula
                        adipiscing quam. Nibh vestibulum tempor, magna maecenas, vehicula donec ut nonummy cras
                        suscipit.</p> -->
                </div>
            </div>
        </div>
        <div class="row mb-none-30">
            <?php $no = 1;
            foreach ($mobil as $x) : ?>
            <div class="col-lg-6">
                <div class="car-item car-item--style2">
                    <div class="thumb bg_img"
                        data-background="<?= base_url('assets/foto/mobil/' . $x['thumbnail']); ?>"></div>
                    <div class="car-item-body">
                        <div class="content">
                            <h4 class="title"><?= $x['jenis'] ?></h4>
                            <span class="price"> <?= "Rp." . number_format($x['tarif'], 2, ',', '.') ?>/hari</span>
                            <span class="price"> - <?= $x['diskon'] ?>% (Diskon)</span>
                            <p><?= $x['info']; ?></p>
                            <a href="
                                        <?php if ($this->session->userdata('id_pengguna')) : ?>
                                            <?= base_url('katalog/sewa/' . $x['id_mobil']) ?>
                                            <?php else : ?>
                                                <?= base_url('login') ?>
                                                <?php endif; ?>" class="cmn-btn">Sewa</a>
                        </div>
                        <div class="car-item-meta">
                            <ul class="details-list">
                                <li><i class="fa fa-car"></i>model <?= $x['jenis'] ?></li>
                                <li><i class="fa fa-car"></i><?= $x['jumlah_kursi'] ?> kursi</li>
                                <li><i class="fa fa-tachometer"></i><?= $x['warna']; ?></li>
                                <li><i class="fa fa-sliders"></i><?= $x['transmisi'] ?></li>
                            </ul>
                        </div>
                    </div>
                </div><!-- car-item end -->
            </div><!-- car-item end -->
            <?php endforeach; ?>

        </div>
    </div>
</section>
<!-- choose-car-section end -->
<!-- choose-us-section start -->
<section class="choose-us-section pt-120 pb-120">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="choose-us-content">
                    <h2 class="title title--border text-capitalize">Mengapa harus rental di Mari Bersaudara</h2>

                    <div class="choose-us-area">
                        <?php $no = 1;
                        foreach ($layanan as $x) : ?>
                        <div class="choose-us-item">
                            <div class="thumb bg_img"
                                data-background="<?= base_url('assets/foto/layanan/' . $x['foto']) ?>"></div>
                            <div class="content">
                                <h4 class="title"><?= $x['nama_layanan'] ?></h4>
                                <p><?= $x['keterangan'] ?>.</p>
                            </div>
                        </div><!-- choose-us-item end -->
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- choose-us-section end -->
<!-- team-section start -->
<section class="team-section pt-120 pb-120">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="section-header text-center">
                    <h2 class="section-title">Tim Mari Bersaudara</h2>
                    <!-- <p>Pellentesque turpis et nonummy eu nulla. Quis gravida ultrices nam sed vel ut, vehicula
                        adipiscing quam. Nibh vestibulum tempor, magna maecenas, vehicula donec ut nonummy cras
                        suscipit.</p> -->
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
<!-- blog-section start -->
<section class="blog-section pb-120">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="section-header text-center">
                    <h2 class="section-title">Berita Terbaru</h2>
                    <!-- <p>Pellentesque turpis et nonummy eu nulla. Quis gravida ultrices nam sed vel ut, vehicula
                        adipiscing quam. Nibh vestibulum tempor, magna maecenas, vehicula donec ut nonummy cras
                        suscipit.</p> -->
                </div>
            </div>
        </div>

        <div class="row mb-none-30"><?php foreach ($berita as $x) : ?>
            <div class="col-lg-4 col-sm-6">

                <div class="post-item shadow-none">
                    <div class="thumb">
                        <img style="width: 255px;height:268px;"
                            src="<?= base_url('assets/foto/berita/' . $x['foto']); ?>" alt="image">
                        <a href="#0" class="post-date"><?= date('d', strtotime($x['tanggal'])); ?><br>
                            <?= date('M', strtotime($x['tanggal'])); ?></a>
                    </div>
                    <div class="content">
                        <h3 class="post-title"><a
                                href="<?= base_url('berita/get/' . $x['id_berita']) ?>"><?= $x['judul']; ?></a></h3>
                        <p><?= word_limiter($x['isi'], 20); ?>
                        </p>
                        <a href="<?= base_url('berita/get/' . $x['id_berita']) ?>" class="border-btn">Baca</a>
                    </div>
                </div>

            </div><!-- post-item end -->
            <?php endforeach; ?>
        </div>

    </div>
</section>
<!-- blog-section end -->