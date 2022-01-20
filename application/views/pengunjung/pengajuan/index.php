<!-- inner-apge-banner start -->
<section class="inner-page-banner bg_img overlay-3"
    data-background="<?= base_url('assets/depan/') ?>assets/images/inner-page-bg.jpg">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 class="page-title">Pengajuan Partner</h2>
                <ol class="page-list">
                    <li><a href="<?= base_url('beranda') ?>"><i class="fa fa-home"></i> Beranda</a></li>
                    <li>Pengajuan Partner</li>
                </ol>
            </div>
        </div>
    </div>
</section>
<!-- inner-apge-banner end -->
<!-- login-section start -->
<section class="login-section pt-120 pb-120">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="login-block text-center">
                    <div class="login-block-inner">
                        <h3 class="title">Upload KTP </h3>
                        <form class="login-form" action="" method="POST" enctype="multipart/form-data">
                            <div class="frm-group">
                                <input type="hidden" value="<?= $this->session->userdata('id_pengguna'); ?>"
                                    name="id_pengguna">
                                <?= form_error('id_pengguna', '<small class="text-danger pl-1">', '</small>'); ?>
                                <?= form_upload('ktp') ?>
                                <?= form_error('ktp', '<small class="text-danger pl-1">', '</small>'); ?>
                            </div>
                            <div class="frm-group">
                                <input type="submit" value="ajukan">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- login-section end -->