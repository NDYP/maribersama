<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="container">
        <section class="content-header">
            <h1>
                <?= $title; ?>
            </h1>
            <ol class="breadcrumb">
                <li><a href="<?= base_url('admin/dashboard/index'); ?>"><i class="fa fa-dashboard"></i> Dashboard</a>
                </li>
                <li><a href="<?= base_url('admin/customer/index'); ?>">Karyawan</a></li>
                <li class="active"><?= $title; ?></li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <?= form_open_multipart('admin/customer/tambah') ?>
            <div class="box box-default">
                <div class="box-header with-border">
                    <a type="button" href="<?= base_url('admin/customer/index') ?>"
                        class="btn bg-green-gradient btn-social btn-flat btn-xs visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><span
                            class="fa fa-arrow-left"></span> Kembali</a>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Username</label>
                                    <input type="text" class="form-control" name="username" id="username">
                                    <?= form_error('username', '<small class="text-danger pl-1">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="text" class="form-control" name="password" id="password">
                                    <?= form_error('password', '<small class="text-danger pl-1">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Foto</label>
                                    <div>
                                        <?= form_upload('foto'); ?>
                                    </div>
                                </div>
                            </div>
                            <!-- /.form-group -->
                        </div>
                        <div class="col-md-6">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>NIK</label>
                                    <input type="text" class="form-control" name="nik">
                                    <?= form_error('nik', '<small class="text-danger pl-1">', '</small>'); ?>
                                </div>
                            </div>
                            <!-- /.form-group -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Nama Lengkap</label>
                                    <input type="text" class="form-control" name="nama_lengkap">
                                    <?= form_error('nama_lengkap', '<small class="text-danger pl-1">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Tempat</label>
                                    <input type="text" class="form-control" name="tempat_lahir">
                                    <?= form_error('tempat_lahir', '<small class="text-danger pl-1">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Tanggal Lahir</label>
                                    <input type="text" class="form-control" id="datepicker" name="tanggal_lahir">
                                    <?= form_error('tanggal_lahir', '<small class="text-danger pl-1">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <!-- radio -->
                                    <div class="form-group">
                                        <label>Jenis Kelamin</label>
                                        <br>
                                        <label>
                                            <input type="radio" name="jenis_kelamin" value="Laki-laki"
                                                class="minimal-red" checked>
                                            Laki-laki
                                        </label>
                                        <label></label>
                                        <label>
                                            <input type="radio" name="jenis_kelamin" value="Perempuan"
                                                class="minimal-red">
                                            Perempuan
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Alamat Domisili</label>
                                    <input type="text" class="form-control" name="alamat">
                                    <?= form_error('alamat', '<small class="text-danger pl-1">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="text" class="form-control" name="email">
                                    <?= form_error('email', '<small class="text-danger pl-1">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>telepon/HP/WA</label>
                                    <input type="text" class="form-control" name="no_hp">
                                    <?= form_error('no_hp', '<small class="text-danger pl-1">', '</small>'); ?>
                                </div>
                            </div>

                        </div>
                    </div>
                    <!-- /.col -->
                </div>
                <div class="box-footer">
                    <button type="submit"
                        class="btn bg-green-gradient btn-social btn-flat btn-xs visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"
                        title="simpan"><span class="fa fa-save"></span>
                        Simpan</button>
                </div>
                <!-- /.row -->
            </div>
            <?= form_close(); ?>
            <!-- SELECT2 EXAMPLE -->
        </section>
    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->