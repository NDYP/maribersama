<div class="content-wrapper" style="min-height: 926px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <h1>
                <?= $title; ?>
            </h1>
            <ol class="breadcrumb">
                <li><a href="<?= base_url('admin/dashboard/index'); ?>"><i class="fa fa-dashboard"></i> Dashboard</a>
                </li>
                <li><a href="<?= base_url('admin/transaksi/index'); ?>">Transaksi</a></li>
            </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <a class="btn bg-green-gradient btn-social btn-flat btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"
                            type="button" href="<?= base_url('admin/transaksi/katalog'); ?>"><span
                                class="fa fa-plus"></span>
                            Tambah</a>
                        <a class="btn bg-green-gradient btn-social btn-flat btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"
                            type="button" data-toggle="modal" data-target="#modal-default"><span
                                class="fa fa-print"></span>
                            Laporan</a>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                            <div class="row">
                                <div class="col-sm-12">
                                    <table id="example1" class="table table-bordered table-striped dataTable"
                                        role="grid" aria-describedby="example1_info">
                                        <thead>
                                            <tr role="row">
                                                <th style="width: 2%" class="sorting_asc" tabindex="0"
                                                    aria-controls="example1" rowspan="1" colspan="1"
                                                    aria-sort="ascending"
                                                    aria-label="Rendering engine: activate to sort column descending"
                                                    style="width: 177.281px;">No</th>

                                                <th style="width: 224.844px;">Penyewa</th>
                                                <th style="width: 224.844px;">Mobil</th>
                                                <th style="width: 224.844px;">Alamat</th>
                                                <th style="width: 206.484px;">Pinjam - Kembali</th>

                                                <th style="width: 111.703px;">Tarif/hari - Diskon (%)</th>
                                                <th style="width: 111.703px;">DP</th>
                                                <th style="width: 111.703px;">Denda</th>
                                                <th style="width: 111.703px;">Bayar</th>
                                                <th style="width: 5%" style="width: 111.703px;">Opsi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no = 1;
                                            foreach ($index as $x) : ?>
                                            <tr role="row" class="odd">
                                                <td class="sorting_1"><?= $no++; ?></td>

                                                <td>NIK : <?= $x['nik'] ?> <br>
                                                    Nama : <?= $x['nama_lengkap'] ?>
                                                </td>
                                                <td><?= $x['tipe'] ?> <br>
                                                    <?= $x['jenis'] ?>
                                                </td>
                                                <td><?= $x['transaksi_alamat'] ?></td>
                                                <td><?= $x['tanggal_pinjam'] ?> - <?= $x['tanggal_kembali'] ?></td>
                                                <td><?= "Rp." . number_format($x['tarif'], 2, ',', '.') ?> -
                                                    <?= $x['diskon'] ?>%</td>
                                                <td><span
                                                        class="badge bg-red"><?= "Rp." . number_format($x['dp'], 2, ',', '.') ?></span>
                                                </td>
                                                <td><span
                                                        class="badge bg-red"><?= "Rp." . number_format($x['denda'], 2, ',', '.') ?></span>
                                                </td>
                                                <td><span
                                                        class="badge bg-red"><?= "Rp." . number_format($x['bayar'], 2, ',', '.') ?></span>
                                                </td>
                                                <td>
                                                    <center>
                                                        <a class="btn btn-xs bg-blue" type="button"
                                                            href="<?= base_url('admin/transaksi/edit/' . $x['id_transaksi']); ?>"><span
                                                                class="fa fa-eye"></span></a>
                                                        <a class="btn btn-xs bg-yellow" type="button"
                                                            href="<?= base_url('admin/transaksi/hapus/' . $x['id_transaksi']); ?>"><span
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
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        <div class="modal fade" id="modal-default">
            <div class="modal-dialog">
                <form name="myform" onsubmit="return val()" enctype="multipart/form-data" role="form"
                    action="<?= base_url('admin/transaksi/cetak') ?>" method="post">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span></button>
                            <h4 class="modal-title">Cetak laporan income dan outcome</h4>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-xs-6">
                                    <label class="">Tanggal Mulai</label>
                                    <input type="text" name="mulai" id="datepicker" class="form-control input-sm"
                                        required>
                                </div>
                                <div class="col-xs-6">
                                    <label class="">Tanggal Berakhir</label>
                                    <input type="text" name="akhir" id="datepicker1" class="form-control input-sm"
                                        required>
                                </div>
                                <br>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Keluar</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </div>
                </form>
                <!-- /.modal-content -->
            </div>
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>