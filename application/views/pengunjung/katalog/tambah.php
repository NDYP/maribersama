<script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js"
    data-client-key="SB-Mid-client-BYWgAXMORF1cj8x_"></script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<section class="inner-page-banner bg_img overlay-3"
    data-background="<?= base_url('assets/depan/') ?>assets/images/inner-page-bg.jpg">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 class="page-title">Transaksi</h2>
                <ol class="page-list">
                    <li><a href="<?= base_url('beranda') ?>"><i class="fa fa-home"></i> Beranda</a></li>
                    <li><a href="<?= base_url('katalog') ?>">Katalog</a></li>
                    <li>Transaksi</li>
                </ol>
            </div>
        </div>
    </div>
</section>
<!-- inner-apge-banner end -->

<!-- reservation-section start -->
<section class="reservation-section pt-120 pb-120">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="reservation-details-area">
                    <div class="thumb">
                        <img src="<?= base_url('assets/foto/mobil/' . $mobil['thumbnail']); ?>" alt="images">
                    </div>
                    <div class="content">
                        <div class="content-block">
                            <h3 class="car-name"><?= $mobil['tipe'] ?> - Diskon <?= $mobil['diskon'] ?>%</h3>
                            <span class="price">Tarif <?= $mobil['tarif'] ?> per hari</span>
                            <p>Lorem ipsum dolor sit amet, urna sit sociis lacus sem turpis magna, montes euismod eros
                                nu dignsim etiam elementum sed tellus sed. Sollicitudin occaecati ut bibendum vitae
                                vehicula adipiscing, partent justo labore, maecenas at aliquam eum. Eleifend suspendisse
                                enim integer, ipsum mauris curabitur nulla ut sit, pede aenean, lacus sed. Dignissim
                                wisi turpis pharetra sapien.</p>
                        </div>

                        <form class="reservation-form" id="payment-form" method="post"
                            action="<?= site_url() ?>admin/snap/finish">
                            <div class="content-block">
                                <h3 class="title">personal information</h3>
                                <div class="row">
                                    <div class="col-lg-6 form-group">
                                        <input id="alamat" name="alamat" value="<?= set_value('alamat') ?>" type="text"
                                            placeholder="Alamat Peminjam">
                                        <input id="id_mobil" name="id_mobil" value="<?= $mobil['id_mobil']; ?>"
                                            type="hidden" placeholder="Alamat Peminjam">
                                        <input type="hidden" name="result_type" id="result-type" value="">
                                        <input type="hidden" name="result_data" id="result-data" value="">
                                        <?= form_error('alamat', '<small class="text-danger pl-1">', '</small>'); ?>
                                    </div>
                                    <div class="col-lg-6 form-group">
                                        <input id="dp" name="dp" value="<?= set_value('dp') ?>" type="text"
                                            placeholder="Jumlah DP (Nominal tanpa titik koma)">

                                    </div>
                                    <div class="form-group col-md-6">
                                        <i class="fa fa-calendar"></i>
                                        <input id="tanggal_pinjam" name="tanggal_pinjam"
                                            value="<?= set_value('tanggal_pinjam') ?>" type='text'
                                            class='form-control has-icon datepicker-here' data-language='en'
                                            placeholder="Tanggal Sewa">
                                        <?= form_error('tanggal_pinjam', '<small class="text-danger pl-1">', '</small>'); ?>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <i class="fa fa-calendar"></i>
                                        <input id="tanggal_kembali" name="tanggal_kembali"
                                            value="<?= set_value('tanggal_kembali') ?>" type='text'
                                            class='form-control has-icon datepicker-here' data-language='en'
                                            placeholder="Tanggal Pengembalian">
                                        <?= form_error('tanggal_kembali', '<small class="text-danger pl-1">', '</small>'); ?>
                                    </div>
                                    <div class="col-lg-6 form-group">
                                        <select id="opsi" name="opsi">
                                            <option name="opsi" value="">--Pilih--</option>
                                            <option name="opsi" value="ambil">Ambil</option>
                                            <option name="opsi" value="antar">Antar</option>
                                        </select>
                                        <?= form_error('opsi', '<small class="text-danger pl-1">', '</small>'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="content-block">
                                <h3 class="title">addisonal information</h3>
                                <div class="row">
                                    <div class="col-lg-12 form-group">
                                        <textarea placeholder="Write addisonal information in here"></textarea>
                                    </div>
                                    <div class="col-lg-12">
                                        <button id="pay-button" class="cmn-btn">Konfirmasi</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <script type="text/javascript">
                        $('#pay-button').click(function(event) {
                            event.preventDefault();
                            $(this).attr("disabled", "disabled");
                            var alamat = $("#alamat").val();
                            var id_mobil = $("#id_mobil").val();
                            var dp = $("#dp").val();
                            var tanggal_pinjam = $("#tanggal_pinjam").val();
                            var tanggal_kembali = $("#tanggal_kembali").val();
                            $.ajax({
                                type: 'POST',
                                url: '<?= site_url() ?>admin/snap/token',
                                data: {
                                    alamat: alamat,
                                    id_mobil: id_mobil,
                                    dp: dp,
                                    tanggal_pinjam: tanggal_pinjam,
                                    tanggal_kembali: tanggal_kembali
                                },
                                cache: false,
                                success: function(data) {
                                    //location = data;

                                    console.log('token = ' + data);

                                    var resultType = document.getElementById('result-type');
                                    var resultData = document.getElementById('result-data');

                                    function changeResult(type, data) {
                                        $("#result-type").val(type);
                                        $("#result-data").val(JSON.stringify(data));
                                        //resultType.innerHTML = type;
                                        //resultData.innerHTML = JSON.stringify(data);
                                    }

                                    snap.pay(data, {

                                        onSuccess: function(result) {
                                            changeResult('success', result);
                                            console.log(result.status_message);
                                            console.log(result);
                                            $("#payment-form").submit();
                                        },
                                        onPending: function(result) {
                                            changeResult('pending', result);
                                            console.log(result.status_message);
                                            $("#payment-form").submit();
                                        },
                                        onError: function(result) {
                                            changeResult('error', result);
                                            console.log(result.status_message);
                                            $("#payment-form").submit();
                                        }
                                    });
                                }
                            });
                        });
                        </script>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <aside class="sidebar">
                    <div class="widget widget-all-cars">
                        <h4 class="widget-title">our all cars</h4>
                        <ul class="cars-list">
                            <li><a href="#0">mistubisshi</a></li>
                            <li><a href="#0">forester subar</a></li>
                            <li><a href="#0">subary liberty</a></li>
                            <li><a href="#0">pajero range</a></li>
                            <li><a href="#0">volkswagen</a></li>
                        </ul>
                    </div>
                    <div class="widget widget-testimonial">
                        <h4 class="widget-title">testimonial</h4>
                        <div class="widget-body">
                            <div class="testimonial-slider owl-carousel">
                                <div class="testimonial-item">
                                    <div class="testimonial-item--header">
                                        <div class="thumb"><img
                                                src="<?= base_url('assets/depan/') ?>assets/images/testimonial/1.jpg"
                                                alt="image"></div>
                                        <div class="content">
                                            <h6 class="name">martin hook</h6>
                                            <span class="designation">business man</span>
                                        </div>
                                    </div>
                                    <div class="testimonial-item--body">
                                        <p>Tristique consequat, lorem sed vivamus donec eget, nulla pharetra lacinia
                                            wisi diamaliquam velit nec.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- widget end -->
                </aside>
            </div>
        </div>
    </div>
</section>