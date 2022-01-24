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
                <li><a href="<?= base_url('admin/akun/index'); ?>">akun</a></li>
                <li class="active"><?= $title; ?></li>
            </ol>
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="box box-default">
                <div class="box-header with-border">
                    <a class="btn btn-xs bg-blue" href="<?= base_url('admin/akun/profil') ?>"><span
                            class="fa fa-arrow-left"></span>
                        Kembali</a>
                </div>
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="inputName" class="control-label">NIK</label>
                                    <input type="hidden" class="form-control" placeholder="" name="id_pengguna"
                                        value="<?= $akun['id_pengguna']; ?>">
                                    <input type="text" class="form-control" value="<?= $akun['nik']; ?>" name="nik">
                                    <?= form_error('nik', '<small class="text-danger pl-1">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="inputEmail" class="control-label">Jenis Kelamin</label>
                                    <div class="">
                                        <label>
                                            <input type="radio" name="jenis_kelamin" value="Laki-laki"
                                                class="minimal-red"
                                                <?php if (
                                                                                                                                $akun['jenis_kelamin'] === 'Laki-laki' || $akun['jenis_kelamin'] === 'Laki-Laki'
                                                                                                                            ) echo 'checked'; ?>>
                                            Laki-laki
                                        </label>
                                        <label></label>
                                        <label>
                                            <input type="radio" name="jenis_kelamin" value="Perempuan"
                                                class="minimal-red"
                                                <?php if ($akun['jenis_kelamin'] === 'Perempuan') echo 'checked'; ?>>
                                            Perempuan
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="inputEmail" class="control-label">Email</label>
                                    <input type="text" class="form-control" placeholder="" name="email"
                                        value="<?= $akun['email']; ?>">
                                    <?= form_error('email', '<small class="text-danger pl-1">', '</small>'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="inputEmail" class="control-label">Nama Lengkap</label>
                                    <input type="text" class="form-control" placeholder="" name="nama_lengkap"
                                        value="<?= $akun['nama_lengkap']; ?>">
                                    <?= form_error('nama_lengkap', '<small class="text-danger pl-1">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="inputEmail" class="control-label">Tanggal Lahir</label>
                                    <div class="row">
                                        <div class="col-md-7">
                                            <input type="text" class="form-control" placeholder="" name="tempat_lahir"
                                                value="<?= $akun['tempat_lahir']; ?>">
                                            <?= form_error('tempat_lahir', '<small class="text-danger pl-1">', '</small>'); ?>
                                        </div>
                                        <div class="col-md-5">
                                            <input type="text" class="form-control" id="datepicker" name="tanggal_lahir"
                                                value="<?= date('d-m-Y', strtotime($akun['tanggal_lahir'])); ?>">
                                            <?= form_error('tanggal_lahir', '<small class="text-danger pl-1">', '</small>'); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="inputEmail" class="control-label">Username</label>
                                    <?php if ($this->session->userdata('username_admin')) : ?>
                                    <input type="text" class="form-control" placeholder="" name="username"
                                        value="<?= $this->session->userdata('username_admin'); ?>">
                                    <?php else : ?>
                                    <input type="text" class="form-control" placeholder="" name="username"
                                        value="<?= $akun['username']; ?>">
                                    <?php endif; ?>
                                    <?= form_error('username', '<small class="text-danger pl-1">', '</small>'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="inputEmail" class="control-label">Alamat</label>
                                    <input type="text" class="form-control" placeholder="" name="alamat"
                                        value="<?= $akun['alamat']; ?>">
                                    <?= form_error('alamat', '<small class="text-danger pl-1">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="inputEmail" class="control-label">No.hp/WA</label>
                                    <input type="text" class="form-control" placeholder="" name="no_hp"
                                        value="<?= $akun['no_hp']; ?>">
                                    <?= form_error('no_hp', '<small class="text-danger pl-1">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="inputEmail" class="control-label">Password</label>
                                    <?php if ($this->session->userdata('password_admin')) : ?>
                                    <input type="text" class="form-control" placeholder="" name="password"
                                        value="<?= $this->session->userdata('password_admin'); ?>">
                                    <?php else : ?>
                                    <input type="text" class="form-control" placeholder="" name="password"
                                        value="<?= $akun['password']; ?>">
                                    <?php endif; ?>
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