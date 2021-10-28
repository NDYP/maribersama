<!-- inner-apge-banner start -->
<section class="inner-page-banner bg_img overlay-3" data-background="<?= base_url('assets/depan/') ?>assets/images/inner-page-bg.jpg">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 class="page-title"><?= $title; ?></h2>
                <ol class="page-list">
                    <li><a href="<?= base_url('beranda') ?>"><i class="fa fa-home"></i> Beranda</a></li>
                    <li><a href="<?= base_url('berita') ?>"><?= $title; ?></a></li>
                    <li><?= $title1; ?></li>
                </ol>
            </div>
        </div>
    </div>
</section>
<!-- inner-apge-banner end -->

<!-- blog-details-section start -->
<section class="blog-details-section pt-120 pb-120">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="blog-details">
                    <div class="post-item-header">
                        <a href="#0" class="post-date"><?= date('d', strtotime($berita['tanggal'])); ?><br><?= date('M', strtotime($berita['tanggal'])); ?></a>
                        <h3 class="post-title"><?= $berita['judul']; ?></h3>
                    </div>
                    <div class="thumb">
                        <img src="<?= base_url('assets/foto/berita/' . $berita['foto']); ?>" alt="image">
                    </div>
                    <ul class="post-meta">
                        <li><a href="#0"><i class="fa fa-user"></i><?= $berita['id_author']; ?></a></li>
                    </ul>
                    <div class="content">
                        <p><?= $berita['isi']; ?></p>
                    </div>
                </div>
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
                                    <h6 class="post-title"><a href="#0">France Prepares to Stake Its Place in World </a></h6>
                                    <ul class="post-meta">
                                        <li><a href="#0">Tushar Khan</a></li>
                                        <li><a href="#0">renteral</a></li>
                                    </ul>
                                </li><!-- small-post-item end -->
                                <li class="small-post-item">
                                    <h6 class="post-title"><a href="#0">Genocide’s Legacy: Ation Vlage in Rwanda</a></h6>
                                    <ul class="post-meta">
                                        <li><a href="#0">Tushar Khan</a></li>
                                        <li><a href="#0">renteral</a></li>
                                    </ul>
                                </li><!-- small-post-item end -->
                                <li class="small-post-item">
                                    <h6 class="post-title"><a href="#0">Security Council Diplomats to Have Lunch With Trump</a></h6>
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
<!-- blog-details-section end -->