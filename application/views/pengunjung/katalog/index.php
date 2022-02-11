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
        <!--  <div class="row">
            <div class="col-lg-12">
                <div class="car-search-filter-area">
                    <div class="car-search-filter-form-area">
                        <form class="car-search-filter-form">
                            <div class="row justify-content-between">
                                <div class="col-lg-4 col-md-5 col-sm-6">
                                    <div class="cart-sort-field">
                                        <span class="caption">Sort by : </span>
                                        <select>
                                            <option>Pajero Range</option>
                                            <option>Toyota Axio</option>
                                            <option>Lancer</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-7 col-md-7 col-sm-6 d-flex">
                                    <input type="text" name="car_search" id="car_search" placeholder="Search what you want........">
                                    <button class="search-submit-btn">Search</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="view-style-toggle-area">
                        <button class="view-btn list-btn active"><i class="fa fa-bars"></i></button>
                        <button class="view-btn grid-btn"><i class="fa fa-th-large"></i></button>
                    </div>
                </div>
            </div>
        </div> -->
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
                                    <h4 class="title"><?= $x['tipe'] ?></h4>
                                    <span class="price">Sewa
                                        <?= "Rp." . number_format($x['tarif'], 2, ',', '.') ?>/hari</span>
                                    <span class="price"> - <?= $x['diskon'] ?>% (Diskon)</span>
                                    <p>Aliquam sollicitudin dolores tristiquvel ornare, vitae aenean.</p>
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
<!-- car-search-section end -->