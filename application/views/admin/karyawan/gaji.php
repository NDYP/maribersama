<!-- Main content -->
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
                <li><a href="<?= base_url('admin/karyawan/index'); ?>">Karyawan</a></li>
                <li class="active"><?= $title; ?></li>
            </ol>
        </section>
        <section class="content">
            <div class="box box-default">
                <div class="box-header with-border">
                    <a href="<?= base_url('admin/karyawan/index') ?>" class="btn btn-xs bg-blue"><span
                            class="fa fa-arrow-left"></span>
                        Kembali</a>
                </div>
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Pilih Bulan</label>
                                    <input value="<?= set_value('bulan'); ?>" type="text" class="form-control"
                                        id="datepicker1" name="bulan">
                                    <input name="id_pengguna" value="<?= $karyawan['id_pengguna']; ?>" type="hidden"
                                        class="form-control" id="exampleInputEmail1" placeholder="isi ...">
                                    <input name="gaji" value="<?= $karyawan['salary']; ?>" type="hidden"
                                        class="form-control" id="exampleInputEmail1" placeholder="isi ...">
                                    <?= form_error('id_pengguna', '<small class="text-danger pl-1">', '</small>'); ?>
                                    <?= form_error('bulan', '<small class="text-danger pl-1">', '</small>'); ?>
                                    <?= form_error('gaji', '<small class="text-danger pl-1">', '</small>'); ?>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="box-footer">
                        <button class="btn btn-xs bg-blue"><span class="fa fa-save"></span> Simpan</button>
                    </div>
                    <!-- /.box-body -->
                </form>
            </div>

    </div>
    <!-- /.box -->
    </section>
</div>
</div>
<!-- /.content -->