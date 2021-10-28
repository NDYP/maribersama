<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <?= $title; ?>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?= base_url('admin/dashboard/index'); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="<?= base_url('admin/partner/index'); ?>">Karyawan</a></li>
            <li class="active"><?= $title; ?></li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-3">
                <!-- Profile Image -->
                <div class="box box-primary">
                    <div class="box-body box-profile">
                        <img class="img center-block img-responsive img-rounded"
                            src="<?= base_url('assets/foto/pengguna/' . $akun['foto']); ?>" alt="User profile picture">
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
            <div class="col-md-9">
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#activity" data-toggle="tab">Profile</a></li>
                        <li><a href="#settings" data-toggle="tab">Berkas</a></li>
                        <?php if ($this->session->userdata('id_admin')) : ?>
                        <li><a href="#mobil" data-toggle="tab">Mobil</a></li>
                        <?php endif; ?>
                    </ul>
                    <div class="tab-content">
                        <div class="active tab-pane" id="activity">
                            <div class="box-body">
                                <form class="form-horizontal" action="<?= base_url('admin/akun/ubah'); ?>" method="post"
                                    enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label for="inputEmail" class="col-sm-2 control-label">Username</label>
                                        <div class="col-sm-3">
                                            <?php if ($this->session->userdata('username_admin')) : ?>
                                            <input type="text" class="form-control" id="inputEmail"
                                                placeholder="Nama Lengkap" name="username"
                                                value="<?= $this->session->userdata('username_admin'); ?>">
                                            <?php else : ?>
                                            <input type="text" class="form-control" id="inputEmail"
                                                placeholder="Nama Lengkap" name="username"
                                                value="<?= $akun['username']; ?>">
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputEmail" class="col-sm-2 control-label">Password</label>
                                        <div class="col-sm-3">
                                            <?php if ($this->session->userdata('password_admin')) : ?>
                                            <input type="password" class="form-control" id="inputEmail"
                                                placeholder="Nama Lengkap" name="password"
                                                value="<?= $this->session->userdata('password_admin'); ?>">
                                            <?php else : ?>
                                            <input type="password" class="form-control" id="inputEmail"
                                                placeholder="Nama Lengkap" name="password"
                                                value="<?= $akun['password']; ?>">
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputName" class="col-sm-2 control-label">NIK</label>
                                        <div class="col-sm-3">
                                            <input type="text" class="form-control" id="inputName" placeholder="NIK"
                                                name="nik" value="<?= $akun['nik']; ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputEmail" class="col-sm-2 control-label">Nama Lengkap</label>
                                        <div class="col-sm-3">
                                            <input type="text" class="form-control" id="inputEmail"
                                                placeholder="Nama Lengkap" name="nama_lengkap"
                                                value="<?= $akun['nama_lengkap']; ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputEmail" class="col-sm-2 control-label">Tempat, tanggal
                                            lahir</label>
                                        <div class="col-sm-2">
                                            <input type="text" class="form-control" id="inputEmail"
                                                placeholder="Nama Lengkap" name="tempat_lahir"
                                                value="<?= $akun['tempat_lahir']; ?>">
                                        </div>
                                        <div class="col-sm-3">
                                            <input type="text" class="form-control" id="datepicker" name="tanggal_lahir"
                                                value="<?= $akun['tanggal_lahir']; ?>">
                                        </div>
                                    </div>
                                    <div class=" form-group">
                                        <label for="inputEmail" class="col-sm-2 control-label">Jenis Kelamin</label>
                                        <div class="col-sm-3">
                                            <label>
                                                <input type="radio" name="jenis_kelamin" value="Laki-laki"
                                                    class="minimal-red"
                                                    <?php if ($akun['jenis_kelamin'] == 'Laki-laki') echo 'checked'; ?>>
                                                Laki-laki
                                            </label>
                                            <label></label>
                                            <label>
                                                <input type="radio" name="jenis_kelamin" value="Perempuan"
                                                    class="minimal-red"
                                                    <?php if ($akun['jenis_kelamin'] == 'Perempuan') echo 'checked'; ?>>
                                                Perempuan
                                            </label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputEmail" class="col-sm-2 control-label">Alamat</label>
                                        <div class="col-sm-5">
                                            <input type="text" class="form-control" id="inputEmail"
                                                placeholder="Nama Lengkap" name="alamat"
                                                value="<?= $akun['alamat']; ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputEmail" class="col-sm-2 control-label">Telepon/No.Hp/WA</label>
                                        <div class="col-sm-2">
                                            <input type="text" class="form-control" id="inputEmail"
                                                placeholder="Nama Lengkap" name="no_hp" value="<?= $akun['no_hp']; ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputEmail" class="col-sm-2 control-label">Email</label>
                                        <div class="col-sm-3">
                                            <input type="text" class="form-control" id="inputEmail"
                                                placeholder="Nama Lengkap" name="email" value="<?= $akun['email']; ?>">
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
                                <?= form_open_multipart('admin/akun/berkas') ?>
                                <!-- /.box-header -->
                                <div class="box-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Nama Berkas</label>
                                                    <input type="text" class="form-control" name="judul" id="username">
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
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <button type="submit" class="btn bg-green btn-xs"
                                                        title="simpan"><span class="fa fa-save"></span> Upload</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.col -->
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
                                            <th style="width: 224.844px;">Nama Berkas</th>
                                            <th style="width: 206.484px;">File</th>
                                            <th style="width: 152.688px;">Tanggal Upload</th>
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
                                                    href="<?= base_url('admin/akun/hapusberkas/' . $x['id_berkas']); ?>"><span
                                                        class="fa fa-trash"></span> Hapus</a>
                                            </td>
                                        </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane" id="mobil">
                            <div class="box-header">
                                <?= form_open_multipart('admin/akun/mobil') ?>
                                <div class="box-header">
                                    <div class="col-md-6">
                                        <p class="text-danger"> Keterangan * : Angka tanpa tanda titik koma </p>
                                    </div>
                                </div>
                                <!-- /.box-header -->
                                <div class="box-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Tipe</label>
                                                    <input type="text" class="form-control" name="tipe" id="tipe">
                                                    <?= form_error('tipe', '<small class="text-danger pl-1">', '</small>'); ?>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Jenis</label>
                                                    <input type="text" class="form-control" name="jenis" id="password">
                                                    <?= form_error('jenis', '<small class="text-danger pl-1">', '</small>'); ?>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Warna</label>
                                                    <input type="text" class="form-control" name="warna" id="password">
                                                    <?= form_error('warna', '<small class="text-danger pl-1">', '</small>'); ?>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Jumlah Kursi</label>
                                                    <input type="text" class="form-control" name="jumlah_kursi"
                                                        id="password">
                                                    <?= form_error('jumlah_kursi', '<small class="text-danger pl-1">', '</small>'); ?>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Transmisi</label>
                                                    <select name="transmisi" class="form-control select2"
                                                        style="width: 100%;">
                                                        <option selected="selected" value="">Pilih</option>
                                                        <option value="Manual">Manual</option>
                                                        <option value="Matic">Matic</option>
                                                    </select>
                                                    <?= form_error('tansmisi', '<small class="text-danger pl-1">', '</small>'); ?>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Info Tambahan</label>
                                                    <textarea type="text" class="form-control" name="info"
                                                        id="password"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Foto</label>
                                                    <div>
                                                        <?= form_upload('thumbnail'); ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <button type="submit" class="btn bg-green btn-xs"
                                                        title="simpan"><span class="fa fa-save"></span> Ajukan</button>
                                                </div>
                                            </div>
                                            <!-- /.form-group -->
                                        </div>
                                        <div class="col-md-6">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Sewa (Rp) <text class="text-danger">*</text></label>
                                                    <input type="text" class="form-control" name="sewa">
                                                    <?= form_error('sewa', '<small class="text-danger pl-1">', '</small>'); ?>
                                                </div>
                                            </div>
                                            <!-- /.form-group -->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Tarif (Rp) <text class="text-danger">*</text></label>
                                                    <input type="text" class="form-control" name="tarif">
                                                    <?= form_error('tarif', '<small class="text-danger pl-1">', '</small>'); ?>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Diskon (%) <text class="text-danger">*</text></label>
                                                    <input type="text" class="form-control" name="diskon">
                                                    <?= form_error('diskon', '<small class="text-danger pl-1">', '</small>'); ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.col -->
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
                                            <th style="width: 224.844px;">Foto</th>
                                            <th style="width: 206.484px;">Tipe <br> Jenis</th>
                                            <th style="width: 111.703px;">Transmisi
                                                <br>Jumlah Kursi
                                            </th>
                                            <th style="width: 111.703px;">Sewa <br> Diskon</th>
                                            <th style="width: 111.703px;">Status</th>
                                            <th style="width: 15%" style="width: 111.703px;">Opsi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1;
                                        foreach ($mobil as $x) : ?>
                                        <tr role="row" class="odd">
                                            <td class="sorting_1"><?= $no++; ?></td>
                                            <td>
                                                <img class="img center-block img-responsive img-thumnail"
                                                    style="width: 3cm; height:4cm;"
                                                    src="<?= base_url('assets/foto/mobil/' . $x['thumbnail']); ?>"
                                                    alt="">
                                            </td>
                                            <td><?= $x['tipe'] ?> <br>
                                                <?= $x['jenis'] ?>
                                            </td>
                                            <td><?= $x['transmisi'] ?><br>
                                                <?= $x['jumlah_kursi'] ?></td>
                                            <td><?= $x['sewa'] ?> <br> <?= $x['diskon'] ?></td>
                                            <td><span class="badge bg-red"><?= $x['status'] ?></span></td>
                                            <td>
                                                <a class="btn btn-xs bg-yellow" type="button"
                                                    href="<?= base_url('admin/akun/editmobil/' . $x['id_mobil']); ?>"><span
                                                        class="fa fa-edit"></span> Lihat</a>
                                                <a class="btn btn-xs bg-yellow" type="button"
                                                    href="<?= base_url('admin/akun/hapusmobil/' . $x['id_mobil']); ?>"><span
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