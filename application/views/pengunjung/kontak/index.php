<!-- inner-apge-banner start -->
<section class="inner-page-banner bg_img overlay-3"
    data-background="<?= base_url('assets/depan/') ?>assets/images/inner-page-bg.jpg">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 class="page-title">Terhubung dengan kami</h2>
                <ol class="page-list">
                    <li><a href="<?= base_url('beranda'); ?>"><i class="fa fa-home"></i> Beranda</a></li>
                    <li>Kontak</li>
                </ol>
            </div>
        </div>
    </div>
</section>
<!-- inner-apge-banner end -->

<!-- contact-section start -->
<section class="contact-section pt-120 pb-120">
    <div class="container">
        <?php foreach ($kontak as $x) : ?>
        <div class="row">
            <div class="col-lg-4">
                <div class="contact-item text-center">
                    <div class="icon"><i class="fa fa-home"></i></div>
                    <div class="content">
                        <h4 class="title">office address</h4>
                        <p><?= $x['alamat']; ?></p>
                    </div>
                </div>
            </div><!-- contact-item end -->
            <div class="col-lg-4">
                <div class="contact-item text-center">
                    <div class="icon"><i class="fa fa-phone"></i></div>
                    <div class="content">
                        <h4 class="title">Phone Number</h4>
                        <p><?= $x['no_hp']; ?></p>
                    </div>
                </div>
            </div><!-- contact-item end -->
            <div class="col-lg-4">
                <div class="contact-item text-center">
                    <div class="icon"><i class="fa fa-envelope-o"></i></div>
                    <div class="content">
                        <h4 class="title">Email Address</h4>
                        <p><?= $x['email']; ?></p>
                    </div>
                </div>
            </div><!-- contact-item end -->
        </div>
        <?php endforeach; ?>
        <div class="row">
            <div class="col-lg-12">
                <div class="contact-form-area">
                    <h3 class="title">send your messages</h3>
                    <form class="contact-form" action="<?= base_url('kontak/pesan'); ?>" method="post">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="frm-group">
                                    <input type="text" name="nama" id="contact_name" placeholder="Nama*" required>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="frm-group">
                                    <input type="email" name="email" id="contact_email" placeholder="Email*" required>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="frm-group">
                                    <textarea name="pesan" placeholder="Tulis pesan anda" required></textarea>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="frm-group">
                                    <input type="submit" name="contact_submit" id="contact_submit" value="kirim pesan">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- contact-section end -->