<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <?= $title; ?>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?= base_url('admin/dashboard/index'); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="<?= base_url('admin/karywan/index'); ?>">Karyawan</a></li>
            <li class="active"><?= $title; ?></li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <?= form_open_multipart('admin/karyawan/tambah') ?>
        <div class="box box-default">
            <div class="box-header with-border">
                <a type="button" href="<?= base_url('admin/karyawan/index') ?>" class="btn bg-green btn-sm"><span
                        class="fa fa-arrow-left"></span> Kembali</a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>NIK</label>
                                <input type="text" class="form-control" value="<?= set_value('nik'); ?>" name="nik">
                                <?= form_error('nik', '<small class="text-danger pl-1">', '</small>'); ?>
                            </div>
                        </div>
                        <!-- /.form-group -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Nama Lengkap</label>
                                <input value="<?= set_value('nama_lengkap'); ?>" type="text" class="form-control"
                                    name="nama_lengkap">
                                <?= form_error('nama_lengkap', '<small class="text-danger pl-1">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Tempat</label>
                                <input value="<?= set_value('tempat_lahir'); ?>" type="text" class="form-control"
                                    name="tempat_lahir">
                                <?= form_error('tempat_lahir', '<small class="text-danger pl-1">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Tanggal Lahir</label>
                                <input value="<?= set_value('tanggal_lahir'); ?>" type="text" class="form-control"
                                    id="datepicker" name="tanggal_lahir">
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
                                        <input type="radio" name="jenis_kelamin" value="Laki-laki" class="minimal-red"
                                            checked>
                                        Laki-laki
                                    </label>
                                    <label></label>
                                    <label>
                                        <input type="radio" name="jenis_kelamin" value="Perempuan" class="minimal-red">
                                        Perempuan
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Alamat Domisili</label>
                                <input value="<?= set_value('alamat'); ?>" type="text" class="form-control"
                                    name="alamat">
                                <?= form_error('alamat', '<small class="text-danger pl-1">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Email</label>
                                <input value="<?= set_value('email'); ?>" type="text" class="form-control" name="email">
                                <?= form_error('email', '<small class="text-danger pl-1">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>telepon/HP/WA</label>
                                <input value="<?= set_value('no_hp'); ?>" type="text" class="form-control" name="no_hp">
                                <?= form_error('no_hp', '<small class="text-danger pl-1">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Jabatan</label>
                                <input value="<?= set_value('jabatan'); ?>" type="text" class="form-control"
                                    name="jabatan">
                                <?= form_error('jabatan', '<small class="text-danger pl-1">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Salary</label>
                                <input value="<?= set_value('salary'); ?>" type="text" class="form-control"
                                    name="salary">
                                <?= form_error('salary', '<small class="text-danger pl-1">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Foto</label>
                                <div>
                                    <?= form_upload('foto'); ?>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <!-- /.col -->
            </div>
            <div class="box-footer">
                <button type="submit" class="btn bg-green btn-sm" title="simpan"><span class="fa fa-save"></span>
                    Simpan</button>
            </div>
            <!-- /.row -->
        </div>
        <?= form_close(); ?>
        <!-- SELECT2 EXAMPLE -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->