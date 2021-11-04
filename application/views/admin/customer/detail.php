<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <?= $title; ?>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?= base_url('admin/dashboard/index'); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="<?= base_url('admin/customer/index'); ?>">Customer</a></li>
            <li class="active"><?= $title; ?></li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-4">
                <!-- Profile Image -->
                <div class="box box-danger">
                    <div class="box-body box-profile">
                        <img class="img center-block img-responsive img-rounded"
                            src="<?= base_url('assets/foto/pengguna/' . $index2['foto']) ?>" alt="User profile picture">
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
            <div class="col-md-8">
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#activity" data-toggle="tab">Profile</a></li>
                        <li><a href="#settings" data-toggle="tab">Berkas</a></li>
                    </ul>
                    <div class="tab-content">
                        <div class="active tab-pane" id="activity">
                            <div class="box-header with-border">
                                <a type="button" href="<?= base_url('admin/customer/index') ?>"
                                    class="btn bg-green btn-xs"><span class="fa fa-arrow-left"></span> Kembali</a>
                            </div>
                            <div class="box-body">
                                <form class="form-horizontal" action="<?= base_url('admin/customer/ubah') ?>"
                                    method="post" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label for="inputEmail" class="col-sm-2 control-label">Username</label>
                                        <div class="col-sm-3">
                                            <input type="text" class="form-control" id="inputEmail"
                                                placeholder="Nama Lengkap" name="username"
                                                value="<?= $index2['username']; ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputEmail" class="col-sm-2 control-label">Password</label>
                                        <div class="col-sm-3">
                                            <input type="text" class="form-control" id="inputEmail"
                                                placeholder="Nama Lengkap" name="password"
                                                value="<?= $index2['password']; ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputName" class="col-sm-2 control-label">NIK</label>
                                        <div class="col-sm-3">
                                            <input type="hidden" class="form-control" id="inputName"
                                                placeholder="id_pengguna" name="id_pengguna"
                                                value="<?= $index2['id_pengguna']; ?>">
                                            <input type="text" class="form-control" id="inputName" placeholder="NIK"
                                                name="nik" value="<?= $index2['nik']; ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputEmail" class="col-sm-2 control-label">Nama Lengkap</label>
                                        <div class="col-sm-3">
                                            <input type="text" class="form-control" id="inputEmail"
                                                placeholder="Nama Lengkap" name="nama_lengkap"
                                                value="<?= $index2['nama_lengkap']; ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputEmail" class="col-sm-2 control-label">Tempat, tanggal
                                            lahir</label>
                                        <div class="col-sm-2">
                                            <input type="text" class="form-control" id="inputEmail"
                                                placeholder="Nama Lengkap" name="tempat_lahir"
                                                value="<?= $index2['tempat_lahir']; ?>">
                                        </div>
                                        <div class="col-sm-3">
                                            <input type="text" class="form-control" id="datepicker" name="tanggal_lahir"
                                                value="<?= $index2['tanggal_lahir']; ?>">
                                        </div>
                                    </div>
                                    <div class=" form-group">
                                        <label for="inputEmail" class="col-sm-2 control-label">Jenis Kelamin</label>
                                        <div class="col-sm-3">
                                            <label>
                                                <input type="radio" name="jenis_kelamin" value="Laki-laki"
                                                    class="minimal-red"
                                                    <?php if ($index2['jenis_kelamin'] === 'Laki-laki') echo 'checked'; ?>>
                                                Laki-laki
                                            </label>
                                            <label></label>
                                            <label>
                                                <input type="radio" name="jenis_kelamin" value="Perempuan"
                                                    class="minimal-red"
                                                    <?php if ($index2['jenis_kelamin'] === 'Perempuan') echo 'checked'; ?>>
                                                Perempuan
                                            </label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputEmail" class="col-sm-2 control-label">Alamat</label>
                                        <div class="col-sm-5">
                                            <input type="text" class="form-control" id="inputEmail"
                                                placeholder="Nama Lengkap" name="alamat"
                                                value="<?= $index2['alamat']; ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputEmail" class="col-sm-2 control-label">Telepon/No.Hp/WA</label>
                                        <div class="col-sm-2">
                                            <input type="text" class="form-control" id="inputEmail"
                                                placeholder="Nama Lengkap" name="no_hp"
                                                value="<?= $index2['no_hp']; ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputEmail" class="col-sm-2 control-label">Email</label>
                                        <div class="col-sm-3">
                                            <input type="text" class="form-control" id="inputEmail"
                                                placeholder="Nama Lengkap" name="email"
                                                value="<?= $index2['email']; ?>">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="inputExperience" class="col-sm-2 control-label"
                                            name="gaji">Foto</label>
                                        <div class="col-sm-10">
                                            <input accept=".jpg, .jpeg, .png" title="Hanya tipe Foto " type="file"
                                                name="foto"></input>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-offset-2 col-sm-10">
                                            <button type="submit" class="btn bg-green btn-xs" title="simpan"><span
                                                    class="fa fa-save"></span> Simpan</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="tab-pane" id="settings">
                            <div class="box-header">
                                <?= form_open_multipart('admin/customer/tambahberkas') ?>
                                <div class="box-header with-border">
                                    <a type="button" href="<?= base_url('admin/customer/index') ?>"
                                        class="btn bg-green btn-xs"><span class="fa fa-arrow-left"></span> Kembali</a>
                                </div>
                                <!-- /.box-header -->
                                <div class="box-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Nama Berkas</label>
                                                    <input type="text" class="form-control" name="judul" id="username">
                                                    <input type="hidden" class="form-control" name="id_pemilik"
                                                        value="<?= $index2['id_pengguna']; ?>">
                                                    <?= form_error('judul', '<small class="text-danger pl-1">', '</small>'); ?>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Berkas</label>
                                                    <div>
                                                        <?= form_upload('berkas'); ?>
                                                    </div>
                                                    <?= form_error('berkas', '<small class="text-danger pl-1">', '</small>'); ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.col -->
                                </div>
                                <div class="box-footer">
                                    <button type="submit" class="btn bg-green btn-xs" title="simpan"><span
                                            class="fa fa-save"></span> Simpan</button>
                                </div>
                                <!-- /.row -->
                                <?= form_close(); ?>
                            </div>
                            <div class="box-body">
                                <table id="example1" class="table table-bordered table-striped dataTable" role="grid"
                                    aria-describedby="example1_info">
                                    <thead>
                                        <tr role="row">
                                            <th style="width: 2%" class="sorting_asc" tabindex="0"
                                                aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending"
                                                aria-label="Rendering engine: activate to sort column descending"
                                                style="width: 177.281px;">No</th>
                                            <th style="width: 224.844px;">Judul</th>
                                            <th style="width: 206.484px;">Berkas</th>
                                            <th style="width: 152.688px;">Tanggal</th>
                                            <th style="width: 15%" style="width: 111.703px;">Opsi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1;
                                        foreach ($berkas as $x) : ?>
                                        <tr role="row" class="odd">
                                            <td class="sorting_1"><?= $no++; ?></td>
                                            <td><?= $x['judul'] ?></td>
                                            <td><?= $x['berkas'] ?></td>
                                            <td><?= $x['daftar'] ?></td>
                                            <td>
                                                <a class="btn btn-xs bg-yellow" type="button"
                                                    href="<?= base_url('admin/customer/hapusberkas/' . $x['id_berkas']); ?>"><span
                                                        class="fa fa-trash"></span> Hapus</a>
                                            </td>
                                        </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- /.tab-pane -->
                    </div>
                    <!-- /.tab-content -->
                </div>
                <!-- /.nav-tabs-custom -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->