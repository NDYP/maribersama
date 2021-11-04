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
<!-- blog-section start -->
<section class="blog-section pt-120 pb-120">
    <div class="container">
        <div class="row">
            <?php foreach ($album as $x) : ?>
            <div class="col-lg-4">
                <div class="post-item post-item--list">
                    <div class="post-item-header">
                        <a href="#0" class="post-date"> <?= date('d', strtotime($x['tanggal'])); ?><br>
                            <?= date('M', strtotime($x['tanggal'])); ?></a>
                        <h3 class="post-title"><a
                                href="<?= base_url('galeri/get/' . $x['id_album']) ?>"><?= $x['nama_album']; ?></a></h3>
                    </div>
                    <div class="thumb">
                        <img style="width: ;height:;" src="<?= base_url('assets/foto/album/' . $x['thumbnail']); ?>"
                            alt="image">
                    </div>
                    <div class="content">
                        <a href="<?= base_url('galeri/get/' . $x['id_album']) ?>" class="blog-btn">Lihat<i
                                class="fa fa-chevron-right"></i></a>
                    </div>
                </div><!-- post-item end -->
            </div>

            <?php endforeach; ?>


        </div>
        <div class="row">
            <div class="col-lg-12">
                <nav class="d-pagination" aria-label="Page navigation example">
                    <?php echo $pagination; ?>
                </nav>
            </div>
        </div>
    </div>
</section>
<!-- blog-section end -->