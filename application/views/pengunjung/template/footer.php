<!-- footer-section start -->
<footer class="footer-section">
    <div class="footer-top pt-120 pb-120">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-sm-8">
                    <div class="footer-widget widget-about">
                        <div class="widget-about-content">
                            <a href="index.html" class="footer-logo"><img
                                    src="<?= base_url('assets/depan/') ?>assets/images/logo-footer.png" alt="logo"></a>
                            <?php foreach ($kontak as $x) : ?>
                            <p><?= $x['sejarah'] ?>
                            </p>
                            <?php endforeach; ?>
                            <ul class="social-links">
                                <li><a href="#0"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#0"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#0"><i class="fa fa-linkedin"></i></a></li>
                                <li><a href="#0"><i class="fa fa-google-plus"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-sm-4">
                    <div class="footer-widget widget-menu">
                        <h4 class="widget-title">our cars</h4>
                        <ul>
                            <li><a href="#0">mistubishi lancer</a></li>
                            <li><a href="#0">forester subar</a></li>
                            <li><a href="#0">mirage ange</a></li>
                            <li><a href="#0">pajero range</a></li>
                            <li><a href="#0">subaru liberty</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2 col-sm-4">
                    <div class="footer-widget widget-menu">
                        <h4 class="widget-title">useful link</h4>
                        <ul>
                            <li><a href="#0">tentang</a></li>
                            <li><a href="#0">katalog</a></li>
                            <li><a href="#0">berita</a></li>
                            <li><a href="#0">galeri</a></li>
                            <li><a href="#0">pesan</a></li>
                        </ul>
                    </div>
                </div>
                <?php foreach ($kontak as $x) : ?>
                <div class="col-lg-4 col-sm-8">
                    <div class="footer-widget widget-address">
                        <h4 class="widget-title">contact with us</h4>
                        <ul>
                            <li>
                                <i class="fa fa-map-marker"></i>
                                <span><?= $x['alamat'] ?></span>
                            </li>
                            <li>
                                <i class="fa fa-envelope"></i>
                                <span><?= $x['email'] ?></span>
                            </li>
                            <li>
                                <i class="fa fa-phone-square"></i>
                                <span><?= $x['no_hp'] ?></span>
                            </li>
                        </ul>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</footer>
<!-- footer-section end -->

<!-- scroll-to-top start -->
<div class="scroll-to-top">
    <span class="scroll-icon">
        <i class="fa fa-rocket"></i>
    </span>
</div>
<!-- scroll-to-top end -->

<!-- jquery js link -->
<script src="<?= base_url('assets/depan/') ?>assets/js/jquery-3.3.1.min.js"></script>
<!-- jquery migrate js link -->
<script src="<?= base_url('assets/depan/') ?>assets/js/jquery-migrate-3.0.0.js"></script>
<!-- bootstrap js link -->
<script src="<?= base_url('assets/depan/') ?>assets/js/bootstrap.min.js"></script>
<!-- lightcase js link -->
<script src="<?= base_url('assets/depan/') ?>assets/js/lightcase.js"></script>
<!-- wow js link -->
<script src="<?= base_url('assets/depan/') ?>assets/js/wow.min.js"></script>
<!-- nice select js link -->
<script src="<?= base_url('assets/depan/') ?>assets/js/jquery.nice-select.min.js"></script>
<!-- datepicker js link -->
<script src="<?= base_url('assets/depan/') ?>assets/js/datepicker.min.js"></script>
<script src="<?= base_url('assets/depan/') ?>assets/js/datepicker.en.js"></script>
<!-- wickedpicker js link -->
<script src="<?= base_url('assets/depan/') ?>assets/js/wickedpicker.min.js"></script>
<!-- owl carousel js link -->
<script src="<?= base_url('assets/depan/') ?>assets/js/owl.carousel.min.js"></script>
<!-- jquery ui js link -->
<script src="<?= base_url('assets/depan/') ?>assets/js/jquery-ui.min.js"></script>
<!-- main js link -->
<script src="<?= base_url('assets/depan/') ?>assets/js/main.js"></script>
<!-- DataTables -->
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.11.3/datatables.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<link rel="stylesheet" type="text/css"
    href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
<script type="text/javascript">
<?php if ($this->session->flashdata('success')) { ?>
toastr.success("<?php echo $this->session->flashdata('success'); ?>");
<?php } else if ($this->session->flashdata('error')) {  ?>
toastr.error("<?php echo $this->session->flashdata('error'); ?>");
<?php } else if ($this->session->flashdata('warning')) {  ?>
toastr.warning("<?php echo $this->session->flashdata('warning'); ?>");
<?php } else if ($this->session->flashdata('info')) {  ?>
toastr.info("<?php echo $this->session->flashdata('info'); ?>");
<?php } ?>
</script>
<script>
$(function() {
    $('#example1').DataTable()
    $('#example2').DataTable({
        'paging': true,
        'lengthChange': true,
        'searching': true,
        'ordering': true,
        'info': true,
        'autoWidth': true
    })
})
</script>
</body>


</html>