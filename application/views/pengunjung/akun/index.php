<!-- inner-apge-banner start -->
<section class="inner-page-banner bg_img overlay-3"
    data-background="<?= base_url('assets/depan/') ?>assets/images/inner-page-bg.jpg">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 class="page-title">reservation</h2>
                <ol class="page-list">
                    <li><a href="index.html"><i class="fa fa-home"></i> Home</a></li>
                    <li><a href="#0">car list</a></li>
                    <li>reservation</li>
                </ol>
            </div>
        </div>
    </div>
</section>
<!-- inner-apge-banner end -->

<!-- car-search-section start -->
<section class="car-search-section pt-120 pb-120">
    <div class="container">
        <div class="feature-content">
            <h2 class="title title--border"><?= $title; ?></h2>
        </div>
        <div class="row mt-70">
            <div class="col-lg-12">
                <div class="content-wrapper" style="min-height: 926px;">
                    <table id="example1" class="table table-bordered table-striped dataTable" role="grid"
                        aria-describedby="example1_info">
                        <thead>
                            <tr role="row">
                                <th style="width: 2%" class="sorting_asc" tabindex="0" aria-controls="example1"
                                    rowspan="1" colspan="1" aria-sort="ascending"
                                    aria-label="Rendering engine: activate to sort column descending"
                                    style="width: 177.281px;">No</th>


                                <th style="width: 224.844px;">Mobil</th>
                                <th style="width: 224.844px;">Alamat</th>
                                <th style="width: 206.484px;">Pinjam - Kembali</th>
                                <th style="width: 111.703px;">Sewa - Diskon (%)</th>
                                <th style="width: 111.703px;">DP</th>
                                <th style="width: 111.703px;">Denda</th>
                                <th style="width: 111.703px;">Bayar</th>
                                <th style="width: 5%" style="width: 111.703px;">Opsi
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            foreach ($index as $x) : ?>
                            <tr role="row" class="odd">
                                <td class="sorting_1"><?= $no++; ?></td>


                                <td>Tipe : <?= $x['tipe'] ?> <br>
                                    Jenis : <?= $x['jenis'] ?>
                                </td>
                                <td><?= $x['transaksi_alamat'] ?></td>
                                <td><?= $x['tanggal_pinjam'] ?> -
                                    <?= $x['tanggal_kembali'] ?></td>
                                <td><?= $x['sewa'] ?> - <?= $x['diskon'] ?>%</td>
                                <td><span class="badge bg-red"><?= $x['dp'] ?></span>
                                </td>
                                <td><span class="badge bg-red"><?= $x['denda'] ?></span>
                                </td>
                                <td><span class="badge bg-red"><?= $x['bayar'] ?></span>
                                </td>
                                <td>
                                    <center>

                                        <a class="btn btn-xs bg-yellow" type="button"
                                            href="<?= base_url('akun/hapus/' . $x['id_transaksi']); ?>"><span
                                                class="fa fa-trash"></span></a>
                                    </center>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</section>
<!-- car-search-section end -->