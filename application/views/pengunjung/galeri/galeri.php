<!-- inner-apge-banner start -->
<section class="inner-page-banner bg_img overlay-3"
    data-background="<?= base_url('assets/depan/') ?>assets/images/inner-page-bg.jpg">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 class="page-title"><?= $title; ?></h2>
                <ol class="page-list">
                    <li><a href="<?= base_url('beranda') ?>"><i class="fa fa-home"></i> Beranda</a></li>
                    <li><a href="<?= base_url('galeri') ?>"><i class="fa fa-home"></i> Album</a></li>
                    <li><?= $title; ?> <?= $album['nama_album'] ?></li>
                </ol>
            </div>
        </div>
    </div>
</section>
<!-- inner-apge-banner end -->
<!-- blog-section start -->
<section class="blog-section pt-120 pb-120">
    <div class="container">
        <div class="row">
            <?php foreach ($galeri as $x) : ?>
            <div class="col-lg-4">
                <div class="post-item post-item--list">
                    <div class="thumb">
                        <img style="width: ;height:;" src="<?= base_url('assets/foto/album/galeri/' . $x['foto']); ?>"
                            alt="image">
                    </div>
                </div><!-- post-item end -->
            </div>
            <?php endforeach; ?>

        </div>
    </div>
</section>
<!-- blog-section end -->