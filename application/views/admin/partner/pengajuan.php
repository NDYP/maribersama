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
                <li><a href="<?= base_url('admin/customer/index'); ?>">Customer</a></li>
                <li><a href="">Pengajuan</a></li>
            </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <!-- /.box-header 
                        <a class="btn btn-sm bg-green" type="button" href="<?= base_url('admin/customer/tambah'); ?>"><span class="fa fa-plus"></span> Tambah</a>
                        -->
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
                                                <th style="width: 111.703px;">Jenis Kelamin</th>
                                                <th style="width: 111.703px;">Email</th>
                                                <th style="width: 111.703px;">Daftar</th>
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
                                                        style="width: 30%;"
                                                        src="<?= base_url('assets/foto/pengguna/' . $x['foto']); ?>"
                                                        alt="">
                                                </td>
                                                <td><?= $x['nik'] ?></td>
                                                <td><?= $x['nama_lengkap'] ?></td>
                                                <td><?= $x['jenis_kelamin'] ?></td>
                                                <td><?= $x['email'] ?></td>
                                                <td><?= $x['daftar'] ?></td>
                                                <td>
                                                    <a class="btn btn-xs bg-blue" type="button"
                                                        href="<?= base_url('admin/partner/aktif/' . $x['id_pengguna']); ?>"><span
                                                            class="fa fa-check"></span> Terima</a>
                                                    <a class="btn btn-xs bg-yellow" type="button"
                                                        href="<?= base_url('admin/partner/tolak/' . $x['id_pengguna']); ?>"><span
                                                            class="fa fa-close"></span> Tolak</a>
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