<!-- inner-apge-banner start -->
<section class="inner-page-banner bg_img overlay-3"
    data-background="<?= base_url('assets/depan/') ?>assets/images/inner-page-bg.jpg">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 class="page-title">reservation</h2>
                <ol class="page-list">
                    <li><a href="<?= base_url('beranda') ?>"><i class="fa fa-home"></i> Beranda</a></li>

                    <li><a href="<?= base_url('katalog') ?>"><?= $title; ?></a></li>

                </ol>
            </div>
        </div>
    </div>
</section>
<!-- inner-apge-banner end -->

<!-- car-search-section start -->
<section class="car-search-section pt-120 pb-120">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="section-header text-center">
                    <h2 class="section-title">Katalog</h2>
                </div>
            </div>
        </div>

        <div class="row mt-70">
            <div class="col-lg-12">
                <div class="car-search-result-area list--view row mb-none-30">
                    <?php $no = 1;
                    foreach ($index as $x) : ?>
                    <div class="col-md-4 col-4">
                        <div class="car-item car-item--style2">
                            <div class="thumb bg_img"
                                data-background="<?= base_url('assets/foto/mobil/' . $x['thumbnail']); ?>"></div>
                            <div class="car-item-body">
                                <div class="content">
                                    <h4 class="title">Jumlah Kursi : <?= $x['jumlah_kursi'] ?></h4>
                                    <span class="price"></span>
                                    <span class="price"></span>
                                    <p></p>
                                </div>
                                <div class="car-item-meta">
                                    <ul class="details-list">
                                        <a href="<?= base_url('katalog/jenis/' . $x['jumlah_kursi']) ?>"
                                            class="cmn-btn">Lihat</a>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div><!-- car-item end -->
                    <?php endforeach; ?>
                </div>
                <nav class="d-pagination" aria-label="Page navigation example">
                    <!--   <ul class="pagination justify-content-center">
                       <li class="page-item active"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link" href="#">4</a></li>
                        <li class="page-item"><a class="page-link" href="#">5</a></li>

                    </ul>
                     -->
                    <?php echo $pagination; ?>
                </nav>
            </div>

        </div>
    </div>
</section>
<?php $no = 1;
foreach ($index as $x) : ?>
<div class="modal" id="modal-no<?= $x['id_mobil']; ?>" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <?php if ($this->session->userdata('id_pengguna')) : ?>
            <a href="<?= base_url('katalog/cash/' . $x['id_mobil']) ?>" class="cmn-btn">
                <center>DP
                    Cash/Tunai</center>
            </a>
            <?php else : ?>
            <a href="<?= base_url('login') ?>" class="cmn-btn">
                <center>DP
                    Cash/Tunai</center>
                <?php endif; ?>
            </a>
            <br>
            <?php if ($this->session->userdata('id_pengguna')) : ?>
            <a href="<?= base_url('katalog/cashless/' . $x['id_mobil']) ?>" class="cmn-btn">
                <center>
                    DP Transfer
                </center>
            </a>
            <?php else : ?>
            <a href="<?= base_url('login') ?>" class="cmn-btn">
                <center>DP
                    Cash/Tunai</center>
                <?php endif; ?>
            </a>

        </div>
    </div>
</div>
<?php endforeach; ?>

<!-- car-search-section end -->