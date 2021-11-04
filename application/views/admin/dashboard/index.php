<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <?= $title; ?>

        </h1>

    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Info boxes -->
        <div class="row">
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-aqua"><i class="ion ion-ios-people-outline"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Customer terdaftar</span>
                        <span class="info-box-number"><?= $jumlah_customer; ?></span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-red"><i class="fa fa-users"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Partner</span>
                        <span class="info-box-number"><?= $jumlah_partner; ?></span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->

            <!-- fix for small devices only -->
            <div class="clearfix visible-sm-block"></div>

            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-green"><i class="fa fa-car"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Mobil</span>
                        <span class="info-box-number"><?= $jumlah_mobil; ?></span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-yellow"><i class="ion ion-ios-cart-outline"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Transaksi</span>
                        <span class="info-box-number"><?= $jumlah_transaksi; ?></span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->


        <!-- Main row -->
        <div class="row">
            <!-- Left col -->
            <div class="col-md-9">

                <!-- TABLE: LATEST ORDERS -->
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">Transaksi hari ini</h3>

                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                    class="fa fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i
                                    class="fa fa-times"></i></button>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped dataTable" role="grid"
                            aria-describedby="example1_info">
                            <thead>
                                <tr role="row">
                                    <th style="width: 2%" class="sorting_asc" tabindex="0" aria-controls="example1"
                                        rowspan="1" colspan="1" aria-sort="ascending"
                                        aria-label="Rendering engine: activate to sort column descending"
                                        style="width: 177.281px;">No</th>

                                    <th style="width: 224.844px;">Penyewa</th>
                                    <th style="width: 224.844px;">Mobil</th>

                                    <th style="width: 206.484px;">Pinjam - Kembali</th>

                                    <th style="width: 111.703px;">Tarif/hari - Diskon (%)</th>
                                    <th style="width: 111.703px;">DP <br> Denda <br> Bayar</th>
                                    <th style="width: 111.703px;">Status</th>
                                    <th style="width: 111.703px;">Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1;
                                foreach ($index as $x) : ?>
                                <tr role="row" class="odd">
                                    <td class="sorting_1"><?= $no++; ?></td>

                                    <td>NIK : <?= $x['nik'] ?> <br>
                                        Nama : <?= $x['nama_lengkap'] ?> <br>
                                        alamat : <?= $x['transaksi_alamat'] ?> <br>
                                        Email : <?= $x['email'] ?> <br>
                                        Telepon :<?= $x['no_hp'] ?> <br>
                                    </td>
                                    <td>Tipe :<?= $x['tipe'] ?> <br>
                                        Jenis :<?= $x['jenis'] ?>
                                    </td>
                                    <td><?= date('d/m/Y', strtotime($x['tanggal_pinjam']))  ?> -
                                        <?= date('d/m/Y', strtotime($x['tanggal_kembali']))  ?></td>
                                    <td><?= "Rp." . number_format($x['sewa'], 2, ',', '.') ?> - <?= $x['diskon'] ?>%
                                    </td>
                                    <td><span class="badge bg-red"><?= "Rp." . number_format($x['dp'], 2, ',', '.') ?>
                                            <br> <?= "Rp." . number_format($x['denda'], 2, ',', '.') ?> <br>
                                            <?= "Rp." . number_format($x['bayar'], 2, ',', '.') ?></span></td>
                                    <td><span class="badge bg-red"><?= $x['status_transaksi'] ?></span> - <span
                                            class="badge bg-red"><?= $x['opsi'] ?></span>

                                    </td>

                                    <td>
                                        <?php if ($x['status_transaksi'] == 'pengajuan') : ?>
                                        <a class="btn bg-blue btn-xs"
                                            href="<?= base_url('admin/dashboard/terima/' . $x['id_transaksi']) ?>">
                                            Terima <span class="fa fa-check"></a>
                                        <?php elseif ($x['status_transaksi'] == 'disewa') : ?>
                                        <a class="btn bg-blue btn-xs"
                                            href="<?= base_url('admin/dashboard/selesai/' . $x['id_transaksi']) ?>">
                                            Selesai <span class="fa fa-check"></a>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                        <!-- /.table-responsive -->
                    </div>
                    <!-- /.box-body -->

                    <!-- /.box-footer -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->

            <div class="col-md-3">
                <!-- Info Boxes Style 2 -->
                <div class="info-box bg-blue">
                    <span class="info-box-icon"><i class="fa fa-user"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Pengunjung Online</span>
                        <h1 class="info-box-number"><?= $pengunjung_online; ?></h1>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
                <div class="info-box bg-blue">
                    <span class="info-box-icon"><i class="fa fa-user"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Pengunjung hari ini</span>
                        <h1 class="info-box-number"><?= $pengunjung_hari_ini; ?></h1>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
                <div class="info-box bg-blue">
                    <span class="info-box-icon"><i class="fa fa-user"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Total Pengunjung</span>
                        <h1 class="info-box-number"><?= $pengunjung_total; ?></h1>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->

                <!-- /.info-box -->

            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->