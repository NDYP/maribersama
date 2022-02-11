<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <div class="container">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                <?= $title; ?>
                <small>
                    <?= $title2; ?></small>
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
                                        <th style="width: 224.844px;">ID Transaksi</th>
                                        <th style="width: 224.844px;">Pembayaran</th>
                                        <th style="width: 224.844px;">Penyewa</th>
                                        <!-- <th style="width: 224.844px;">Mobil</th> -->
                                        <!-- <th style="width: 206.484px;">Pinjam - Kembali</th> -->
                                        <!-- <th style="width: 111.703px;">Tarif/hari - Diskon (%)</th> -->
                                        <th style="width: 111.703px;">DP</th>
                                        <th style="width: 111.703px;">Status</th>
                                        <th style="width: 5%" style="width: 111.703px;">Opsi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    foreach ($index as $x) : ?>
                                    <tr role="row" class="odd">
                                        <td class="sorting_1"><?= $no++; ?></td>
                                        <td class="sorting_1"><?= $x['id_transaksi']; ?></td>
                                        <td class="sorting_1"><?= $x['va'] . ' ' . ($x['bank']); ?>
                                        </td>

                                        <td><?= $x['nama_lengkap'] ?>
                                        </td>
                                        <!-- <td><?= $x['tipe'] ?>
                                        </td> -->
                                        <!-- <td><?= $x['transaksi_alamat'] ?></td> -->
                                        <!-- <td><?= $x['tanggal_pinjam'] ?> - <?= $x['tanggal_kembali'] ?></td> -->
                                        <!-- <td><?= "Rp." . number_format($x['tarif'], 2, ',', '.') ?> -
                                                        <?= $x['diskon'] ?>%</td> -->
                                        <td><span
                                                class="badge bg-red"><?= "Rp." . number_format($x['dp'], 2, ',', '.') ?></span>
                                        </td>
                                        <td><span class="badge bg-red"><?= $x['status_transaksi'] ?></span></td>
                                        <td>
                                            <center>
                                                <div class="btn-group">
                                                    <button type="button"
                                                        class="btn bg-green btn-social btn-flat btn-xs"
                                                        data-toggle="dropdown"><i class="fa fa-arrow-circle-down"></i>
                                                        Pilih</button>
                                                    <ul class="dropdown-menu" role="menu">
                                                        <li>

                                                            <?php if ($x['status_transaksi'] == 'pending') : ?>
                                                            <a href="<?= base_url('admin/dashboard/approve/' . $x['id_transaksi']); ?>"
                                                                class="btn btn-social btn-flat btn-block btn-sm"><i
                                                                    class="fa fa-check"></i>Approve</a>
                                                            <?php elseif ($x['status_transaksi'] == 'settlement') : ?>
                                                            <a href="<?= base_url('admin/dashboard/selesai/' . $x['id_transaksi']); ?>"
                                                                class="btn btn-social btn-flat btn-block btn-sm"><i
                                                                    class="fa fa-check"></i>Selesai</a>
                                                            <?php endif; ?>
                                                        </li>
                                                        <li>
                                                            <a href="<?= base_url('admin/dashboard/lihat/' . $x['id_transaksi']); ?>"
                                                                class="btn btn-social btn-flat btn-block btn-sm"><i
                                                                    class="fa fa-list-ol"></i>Detail</a>
                                                        </li>
                                                        <li>
                                                            <a href="<?= base_url('admin/dashboard/edit/' . $x['id_transaksi']); ?>"
                                                                class="btn btn-social btn-flat btn-block btn-sm"><i
                                                                    class="fa fa-edit"></i>Ubah</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </center>
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
        <?php $id_transaksi = 1;
        foreach ($index as $z) : ?>
        <div class="modal fade" id="modal-id_transaksi<?= $z['id_transaksi']; ?>">
            <div class="modal-dialog">
                <form name="myform" onsubmit="return val()" enctype="multipart/form-data" role="form"
                    action="<?= base_url('admin/dashboard/selesai/' . $x['id_transaksi']) ?>" method="post">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span></button>
                            <h4 class="modal-title">Tambahkan denda</h4>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <input type="hidden" value="<?= $z['id_transaksi']; ?>" name="id_transaksi"
                                    class="form-control input-sm">
                                <div class="col-xs-12">
                                    <label class="">Denda (isi 0 jika tidak ada)</label>
                                    <input type="text" name="denda" value="<?= $z['denda']; ?>"
                                        class="form-control input-sm" required>
                                    <input type="hidden" name="tanggal_pinjam" value="<?= $z['tanggal_pinjam']; ?>"
                                        class="form-control input-sm" required>
                                    <input type="hidden" name="tanggal_kembali" value="<?= $z['tanggal_kembali']; ?>"
                                        class="form-control input-sm" required>
                                    <input type="hidden" name="id_mobil" value="<?= $z['id_mobil']; ?>"
                                        class="form-control input-sm" required>
                                    <input type="hidden" name="dp" value="<?= $z['dp']; ?>"
                                        class="form-control input-sm" required>
                                    <input type="hidden" name="id_mobil" value="<?= $z['id_mobil']; ?>"
                                        class="form-control input-sm" required>
                                </div>
                            </div>
                            <br>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Keluar</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
        <?php endforeach; ?>
    </div>
</div>
<!-- /.content-wrapper -->