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
            <div class="col-lg-8">
                <?php foreach ($berita as $x) : ?>
                <div class="post-item post-item--list">
                    <div class="post-item-header">
                        <a href="#0" class="post-date"> <?= date('d', strtotime($x['tanggal'])); ?><br>
                            <?= date('M', strtotime($x['tanggal'])); ?></a>
                        <h3 class="post-title"><a
                                href="<?= base_url('berita/get/' . $x['id_berita']) ?>"><?= $x['judul']; ?></a></h3>
                    </div>
                    <div class="thumb">
                        <img style="width: ;height:;" src="<?= base_url('assets/foto/berita/' . $x['foto']); ?>"
                            alt="image">
                    </div>
                    <ul class="post-meta">
                        <li><a href="#0"><i class="fa fa-user"></i><?= $x['id_author']; ?></a></li>

                    </ul>
                    <div class="content">
                        <p> <?= word_limiter($x['isi'], 10); ?></p>
                        <a href="<?= base_url('berita/get/' . $x['id_berita']) ?>" class="blog-btn">selengkapnya<i
                                class="fa fa-chevron-right"></i></a>
                    </div>
                </div><!-- post-item end -->
                <?php endforeach; ?>
                <nav class="d-pagination mt-50" aria-label="Page navigation example">
                    <ul class="pagination justify-content-start">
                        <li class="page-item active"><a class="page-link" href="#">01</a></li>
                        <li class="page-item"><a class="page-link" href="#">02</a></li>
                        <li class="page-item"><a class="page-link" href="#">03</a></li>
                        <li class="page-item"><a class="page-link" href="#">04</a></li>
                        <li class="page-item"><a class="page-link" href="#">05</a></li>
                    </ul>
                </nav>
            </div>
            <div class="col-lg-4">
                <aside class="sidebar">
                    <div class="widget widget-all-cars">
                        <h4 class="widget-title">search in here</h4>
                        <div class="widget-body">
                            <form class="widget-search-form">
                                <input type="search" name="search" id="widget-search" placeholder="Search Keyword">
                                <button class="widget-search-btn"><i class="fa fa-search"></i></button>
                            </form>
                        </div>
                    </div><!-- widget end -->
                    <div class="widget widget-new-ctg">
                        <h4 class="widget-title">news categories</h4>
                        <ul class="cars-list">
                            <li><a href="#0">car travel</a></li>
                            <li><a href="#0">best car rent</a></li>
                            <li><a href="#0">driving tips</a></li>
                            <li><a href="#0">included new car</a></li>
                            <li><a href="#0">car buy & sale</a></li>
                        </ul>
                    </div><!-- widget end -->
                    <div class="widget">
                        <h4 class="widget-title">news categories</h4>
                        <div class="widget-body">
                            <ul class="small-post-list">
                                <li class="small-post-item">
                                    <h6 class="post-title"><a href="#0">France Prepares to Stake Its Place in World </a>
                                    </h6>
                                    <ul class="post-meta">
                                        <li><a href="#0">Tushar Khan</a></li>
                                        <li><a href="#0">renteral</a></li>
                                    </ul>
                                </li><!-- small-post-item end -->
                                <li class="small-post-item">
                                    <h6 class="post-title"><a href="#0">Genocide’s Legacy: Ation Vlage in Rwanda</a>
                                    </h6>
                                    <ul class="post-meta">
                                        <li><a href="#0">Tushar Khan</a></li>
                                        <li><a href="#0">renteral</a></li>
                                    </ul>
                                </li><!-- small-post-item end -->
                                <li class="small-post-item">
                                    <h6 class="post-title"><a href="#0">Security Council Diplomats to Have Lunch With
                                            Trump</a></h6>
                                    <ul class="post-meta">
                                        <li><a href="#0">Tushar Khan</a></li>
                                        <li><a href="#0">renteral</a></li>
                                    </ul>
                                </li><!-- small-post-item end -->
                                <li class="small-post-item">
                                    <h6 class="post-title"><a href="#0">Attack in Paris Befor French Election</a></h6>
                                    <ul class="post-meta">
                                        <li><a href="#0">Tushar Khan</a></li>
                                        <li><a href="#0">renteral</a></li>
                                    </ul>
                                </li><!-- small-post-item end -->
                            </ul>
                        </div>
                    </div><!-- widget end -->
                    <div class="widget widget-archive">
                        <h4 class="widget-title">archive</h4>
                        <div class="widget-body">
                            <ul class="archive-list">
                                <li><a href="#0">january<span>2018</span></a></li>
                                <li><a href="#0">march<span>2018</span></a></li>
                                <li><a href="#0">jun<span>2018</span></a></li>
                                <li><a href="#0">Augest<span>2019</span></a></li>
                                <li><a href="#0">February<span>2019</span></a></li>
                            </ul>
                        </div>
                    </div><!-- widget end -->
                    <div class="widget widget-tags">
                        <h4 class="widget-title">news tag</h4>
                        <div class="widget-body">
                            <div class="widget-tags-list">
                                <a href="#0">driving</a>
                                <a href="#0">car renteral</a>
                                <a href="#0">travel</a>
                                <a href="#0">pajero range</a>
                                <a href="#0">driving tips</a>
                                <a href="#0">car list</a>
                            </div>
                        </div>
                    </div><!-- widget end -->
                </aside>
            </div>
        </div>
    </div>
</section>
<!-- blog-section end -->