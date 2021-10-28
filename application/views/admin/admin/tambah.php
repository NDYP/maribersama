<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <?= $title; ?>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?= base_url('admin/dashboard/index'); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="<?= base_url('admin/admin/index'); ?>">Karyawan</a></li>
            <li class="active"><?= $title; ?></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <?= form_open_multipart('admin/admin/tambah') ?>
        <div class="box box-default">
            <div class="box-header with-border">
                <a type="button" href="<?= base_url('admin/admin/index') ?>" class="btn bg-green btn-sm"><span class="fa fa-arrow-left"></span> Kembali</a>
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
                                        <input type="radio" name="jenis_kelamin" value="Laki-laki" class="minimal-red" checked>
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
                <button type="submit" class="btn bg-green btn-sm" title="simpan"><span class="fa fa-save"></span> Simpan</button>
            </div>
            <!-- /.row -->
        </div>
        <?= form_close(); ?>
        <!-- SELECT2 EXAMPLE -->
        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title">Select2</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email address</label>
                            <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email address</label>
                            <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                        </div>
                        <div class="form-group">
                            <label>Minimal</label>
                            <select class="form-control select2" style="width: 100%;">
                                <option selected="selected">Pilih</option>
                                <option>Alaska</option>
                                <option>California</option>
                                <option>Delaware</option>
                                <option>Tennessee</option>
                                <option>Texas</option>
                                <option>Washington</option>
                            </select>
                        </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email address</label>
                            <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Password</label>
                            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputFile">File input</label>
                            <input type="file" id="exampleInputFile">
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.box-body -->

            </div>
            <div class="box-footer">
                Visit <a href="https://select2.github.io/">Select2 documentation</a> for more examples and information about
                the plugin.
            </div>
        </div>
        <!-- /.box -->

        <div class="row">
            <div class="col-md-6">
                <div class="box box-info">
                    <div class="box-header">
                        <h3 class="box-title">Color & Time Picker</h3>
                    </div>
                    <div class="box-body">
                        <!-- Color Picker -->
                        <div class="form-group">
                            <label>Color picker:</label>
                            <input type="text" class="form-control my-colorpicker1">
                        </div>
                        <!-- /.form group -->

                        <!-- Color Picker -->
                        <div class="form-group">
                            <label>Color picker with addon:</label>

                            <div class="input-group my-colorpicker2">
                                <input type="text" class="form-control">

                                <div class="input-group-addon">
                                    <i></i>
                                </div>
                            </div>
                            <!-- /.input group -->
                        </div>
                        <!-- /.form group -->

                        <!-- time Picker -->
                        <div class="bootstrap-timepicker">
                            <div class="form-group">
                                <label>Time picker:</label>

                                <div class="input-group">
                                    <input type="text" class="form-control timepicker">

                                    <div class="input-group-addon">
                                        <i class="fa fa-clock-o"></i>
                                    </div>
                                </div>
                                <!-- /.input group -->
                            </div>
                            <!-- /.form group -->
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->

            </div>
            <!-- /.col (left) -->
            <div class="col-md-6">
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Date picker</h3>
                    </div>
                    <div class="box-body">
                        <!-- Date -->
                        <div class="form-group">
                            <label>Date:</label>

                            <div class="input-group date">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                <input type="text" class="form-control pull-right" id="datepicker">
                            </div>
                            <!-- /.input group -->
                        </div>
                        <!-- /.form group -->

                        <!-- Date range -->
                        <div class="form-group">
                            <label>Date range:</label>

                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                <input type="text" class="form-control pull-right" id="reservation">
                            </div>
                            <!-- /.input group -->
                        </div>
                        <!-- /.form group -->

                        <!-- Date and time range -->
                        <div class="form-group">
                            <label>Date and time range:</label>

                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-clock-o"></i>
                                </div>
                                <input type="text" class="form-control pull-right" id="reservationtime">
                            </div>
                            <!-- /.input group -->
                        </div>
                        <!-- /.form group -->

                        <!-- Date and time range -->
                        <div class="form-group">
                            <label>Date range button:</label>

                            <div class="input-group">
                                <button type="button" class="btn btn-default pull-right" id="daterange-btn">
                                    <span>
                                        <i class="fa fa-calendar"></i> Date range picker
                                    </span>
                                    <i class="fa fa-caret-down"></i>
                                </button>
                            </div>
                        </div>
                        <!-- /.form group -->

                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->

                <!-- iCheck -->
                <div class="box box-success">
                    <div class="box-header">
                        <h3 class="box-title">iCheck - Checkbox &amp; Radio Inputs</h3>
                    </div>
                    <div class="box-body">
                        <!-- Minimal style -->

                        <!-- checkbox -->
                        <div class="form-group">
                            <label>
                                <input type="checkbox" class="minimal" checked>
                            </label>
                            <label>
                                <input type="checkbox" class="minimal">
                            </label>
                            <label>
                                <input type="checkbox" class="minimal" disabled>
                                Minimal skin checkbox
                            </label>
                        </div>

                        <!-- radio -->
                        <div class="form-group">
                            <label>
                                <input type="radio" name="r1" class="minimal" checked>
                            </label>
                            <label>
                                <input type="radio" name="r1" class="minimal">
                            </label>
                            <label>
                                <input type="radio" name="r1" class="minimal" disabled>
                                Minimal skin radio
                            </label>
                        </div>

                        <!-- Minimal red style -->

                        <!-- checkbox -->
                        <div class="form-group">
                            <label>
                                <input type="checkbox" class="minimal-red" checked>
                            </label>
                            <label>
                                <input type="checkbox" class="minimal-red">
                            </label>
                            <label>
                                <input type="checkbox" class="minimal-red" disabled>
                                Minimal red skin checkbox
                            </label>
                        </div>

                        <!-- radio -->
                        <div class="form-group">
                            <label>
                                <input type="radio" name="r2" class="minimal-red" checked>
                            </label>
                            <label>
                                <input type="radio" name="r2" class="minimal-red">
                            </label>
                            <label>
                                <input type="radio" name="r2" class="minimal-red" disabled>
                                Minimal red skin radio
                            </label>
                        </div>

                        <!-- Minimal red style -->

                        <!-- checkbox -->
                        <div class="form-group">
                            <label>
                                <input type="checkbox" class="flat-red" checked>
                            </label>
                            <label>
                                <input type="checkbox" class="flat-red">
                            </label>
                            <label>
                                <input type="checkbox" class="flat-red" disabled>
                                Flat green skin checkbox
                            </label>
                        </div>

                        <!-- radio -->
                        <div class="form-group">
                            <label>
                                <input type="radio" name="r3" class="flat-red" checked>
                            </label>
                            <label>
                                <input type="radio" name="r3" class="flat-red">
                            </label>
                            <label>
                                <input type="radio" name="r3" class="flat-red" disabled>
                                Flat green skin radio
                            </label>
                        </div>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        Many more skins available. <a href="http://fronteed.com/iCheck/">Documentation</a>
                    </div>
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col (right) -->
        </div>
        <!-- /.row -->

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->