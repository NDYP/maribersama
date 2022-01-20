<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <div class="container">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                <?= $title; ?>
                <small><?= $title2; ?></small>

            </h1>
            <ol class="breadcrumb">
                <li><a href="<?= base_url('admin/dashboard/index'); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="<?= base_url('admin/customer/index'); ?>">Customer</a></li>
                <li class="active"><?= $title; ?></li>
            </ol>
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="box box-default">
                <div class="box-header with-border">
                    <a class="btn btn-xs bg-blue" href="<?= base_url('admin/customer/index') ?>"><span
                            class="fa fa-arrow-left"></span>
                        Kembali</a>
                </div>
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="inputName" class="control-label">NIK</label>
                                    <input type="text" class="form-control" value="<?= set_value('nik'); ?>" name="nik">
                                    <?= form_error('nik', '<small class="text-danger pl-1">', '</small>'); ?>

                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="inputEmail" class="control-label">Jenis Kelamin</label>
                                    <div class="">
                                        <label>
                                            <input type="radio" name="jenis_kelamin" value="Laki-Laki"
                                                <?= set_select('jenis_kelamin', 'Laki-Laki'); ?> class="minimal-red"
                                                checked>
                                            Laki-laki
                                        </label>
                                        <label></label>
                                        <label>
                                            <input type="radio" name="jenis_kelamin" value="Perempuan"
                                                <?= set_select('jenis_kelamin', 'Perempuan'); ?> class="minimal-red">
                                            Perempuan
                                        </label>
                                    </div>

                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="inputEmail" class="control-label">Email</label>
                                    <input type="text" class="form-control" name="email"
                                        value="<?= set_value('email'); ?>">
                                    <?= form_error('email', '<small class="text-danger pl-1">', '</small>'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="inputEmail" class="control-label">Nama Lengkap</label>
                                    <input type="text" class="form-control" name="nama_lengkap"
                                        value="<?= set_value('nama_lengkap'); ?>">
                                    <?= form_error('nama_lengkap', '<small class="text-danger pl-1">', '</small>'); ?>
                                </div>

                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="inputEmail" class="control-label">Tanggal Lahir</label>
                                    <div class="row">
                                        <div class="col-md-7">
                                            <input type="text" class="form-control" name="tempat_lahir"
                                                value="<?= set_value('tempat_lahir'); ?>">
                                            <?= form_error('tempat_lahir', '<small class="text-danger pl-1">', '</small>'); ?>
                                        </div>
                                        <div class="col-md-5">
                                            <input type="text" class="form-control" id="datepicker" name="tanggal_lahir"
                                                value="">
                                            <?= form_error('tanggal_lahir', '<small class="text-danger pl-1">', '</small>'); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="inputEmail" class="control-label">Username</label>
                                    <input type="text" class="form-control" name="username"
                                        value="<?= set_value('username'); ?>">
                                    <?= form_error('username', '<small class="text-danger pl-1">', '</small>'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="inputEmail" class="control-label">Alamat</label>
                                    <input type="text" class="form-control" name="alamat"
                                        value="<?= set_value('alamat'); ?>">
                                    <?= form_error('alamat', '<small class="text-danger pl-1">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="inputEmail" class="control-label">No.hp/WA</label>
                                    <input type="text" class="form-control" name="no_hp"
                                        value="<?= set_value('no_hp'); ?>">
                                    <?= form_error('no_hp', '<small class="text-danger pl-1">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="inputEmail" class="control-label">Password</label>
                                    <input type="text" class="form-control" name="password"
                                        value="<?= set_value('password'); ?>">
                                    <?= form_error('password', '<small class="text-danger pl-1">', '</small>'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="inputExperience" class="control-label" name="">Foto</label>
                                    <input accept=".jpg, .jpeg, .png" title="Hanya tipe Foto " type="file"
                                        name="foto"></input>
                                </div>
                            </div>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <div class="box-footer">
                        <button type="submit" class="btn btn-xs bg-blue"><span class="fa fa-save"></span>
                            Simpan</button>
                    </div>
                </form>
            </div>


            <!-- /.box -->
    </div>
    </section>
    <!-- /.content -->
    <!-- /.content -->
</div>
</div>

<!-- /.content-wrapper -->