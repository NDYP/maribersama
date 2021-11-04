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
                        <!-- Date range -->
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>laporan:</label>

                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <input name="" type="text" class="form-control pull-right" id="reservation">
                                </div>
                                <!-- /.input group -->
                            </div>
                        </div>
                        <!-- /.form group -->
                        <div class="col-md-12">
                            <a class="btn btn-xs bg-green" type="button"
                                href="<?= base_url('admin/history/laporan'); ?>"><span class="fa fa-print"></span>
                                Pdf</a>
                        </div>
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

                                                <th style="width: 111.703px;">Sewa - Diskon (%)</th>
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
                                                <td><?= "Rp." . number_format($x['sewa'], 2, ',', '.') ?> -
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
                                                            href="<?= base_url('admin/history/lihat/' . $x['id_transaksi']); ?>"><span
                                                                class="fa fa-eye"></span></a>
                                                        <a class="btn btn-xs bg-yellow" type="button"
                                                            href="<?= base_url('admin/history/hapus/' . $x['id_transaksi']); ?>"><span
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
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>