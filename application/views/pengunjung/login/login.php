<!-- inner-apge-banner start -->
<section class="inner-page-banner bg_img overlay-3"
    data-background="<?= base_url('assets/depan/') ?>assets/images/inner-page-bg.jpg">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 class="page-title">login</h2>
                <ol class="page-list">
                    <li><a href="<?= base_url('beranda') ?>"><i class="fa fa-home"></i> Beranda</a></li>
                    <li>login</li>
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
                        <h3 class="title">Masukkan Akun Anda </h3>
                        <form class="login-form" action="<?= base_url('login'); ?>" method="post">
                            <div class="frm-group">
                                <input type="text" name="username" id="f-name" placeholder="Username">
                                <?= form_error('username', '<small class="text-danger pl-1">', '</small>'); ?>
                            </div>
                            <div class="frm-group">
                                <input type="password" name="password" id="pass" placeholder="Password">
                                <?= form_error('password', '<small class="text-danger pl-1">', '</small>'); ?>
                            </div>
                            <div class="frm-group">
                                <input type="submit" value="login account">
                            </div>
                        </form>
                        <p><a href="<?= base_url('login/registrasi') ?>">Belum Memiliki Akun?</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- login-section end -->