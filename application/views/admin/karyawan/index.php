<div class="content-wrapper" style="min-height: 926px;">
    <!-- Content Header (Page header) -->
    <div class="container">
        <section class="content-header">
            <h1>
                <h1>
                    <?= $title; ?>
                    <small><?= $title2; ?></small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="<?= base_url('admin/dashboard/index'); ?>"><i class="fa fa-dashboard"></i>
                            Dashboard</a>
                    </li>
                    <li><a href="<?= base_url('admin/karyawan/index'); ?>">Karyawan</a></li>
                </ol>
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header">
                            <a class="btn btn-xs bg-green" type="button"
                                href="<?= base_url('admin/karyawan/tambah'); ?>"><span class="fa fa-plus"></span>
                                Tambah</a>
                            <a class="btn bg-green-gradient btn-social btn-flat btn-xs visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"
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
                                                    <th style="width: 224.844px;">Foto</th>
                                                    <th style="width: 206.484px;">NIK</th>
                                                    <th style="width: 152.688px;">Nama</th>
                                                    <th style="width: 111.703px;">Jabatan</th>
                                                    <th style="width: 111.703px;">Gaji</th>
                                                    <th style="width: 15%" style="width: 111.703px;">Opsi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $no = 1;
                                                foreach ($index as $x) : ?>
                                                <tr role="row" class="odd">
                                                    <td class="sorting_1"><?= $no++; ?></td>
                                                    <td>
                                                        <img class="img center-block img-responsive img-thumnail"
                                                            src="<?= base_url('assets/foto/pengguna/' . $x['foto']); ?>"
                                                            alt="">
                                                    </td>
                                                    <td><?= $x['nik'] ?></td>
                                                    <td><?= $x['nama_lengkap'] ?></td>
                                                    <td><?= $x['jabatan'] ?></td>
                                                    <td><span
                                                            class="badge bg-red"><?= "Rp." . number_format($x['salary'], 2, ',', '.') ?></span>
                                                    </td>
                                                    <td>
                                                        <div class="btn-group">
                                                            <button type="button"
                                                                class="btn bg-green btn-social btn-flat btn-xs"
                                                                data-toggle="dropdown"><i
                                                                    class="fa fa-arrow-circle-down"></i>
                                                                Pilih</button>
                                                            <ul class="dropdown-menu" role="menu">
                                                                <li>
                                                                    <a href="<?= base_url('admin/karyawan/gaji/' . $x['id_pengguna']); ?>"
                                                                        class="btn btn-social btn-flat btn-block btn-sm"><i
                                                                            class="fa fa-dollar"></i>Gaji</a>
                                                                </li>
                                                                <li>
                                                                    <a href="<?= base_url('admin/karyawan/tambahberkas/' . $x['id_pengguna']); ?>"
                                                                        class="btn btn-social btn-flat btn-block btn-sm"><i
                                                                            class="fa fa-plus"></i>Berkas</a>
                                                                </li>
                                                                <li>
                                                                    <a href="<?= base_url('admin/karyawan/lihat/' . $x['id_pengguna']); ?>"
                                                                        class="btn btn-social btn-flat btn-block btn-sm"><i
                                                                            class="fa fa-list-ol"></i>Detail</a>
                                                                </li>
                                                                <li>
                                                                    <a href="<?= base_url('admin/karyawan/edit/' . $x['id_pengguna']); ?>"
                                                                        class="btn btn-social btn-flat btn-block btn-sm"><i
                                                                            class="fa fa-edit"></i>Ubah</a>
                                                                </li>
                                                                <li>
                                                                    <a href="<?= base_url('admin/karyawan/hapus/' . $x['id_pengguna']); ?>"
                                                                        class="btn btn-social btn-flat btn-block btn-sm tombol-hapus"><i
                                                                            class="fa fa-trash-o"></i> Hapus</a>
                                                                </li>
                                                            </ul>
                                                        </div>
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
        <div class="modal fade" id="modal-default">
            <div class="modal-dialog">
                <form name="myform" onsubmit="return val()" enctype="multipart/form-data" role="form"
                    action="<?= base_url('admin/karyawan/cetak') ?>" method="post">
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
    </div>
</div>