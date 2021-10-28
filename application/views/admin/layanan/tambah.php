<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <?= $title; ?>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?= base_url('admin/dashboard/index'); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="<?= base_url('admin/layanan/index'); ?>">Karyawan</a></li>
            <li class="active"><?= $title; ?></li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <?= form_open_multipart('admin/layanan/tambah') ?>
        <div class="box box-default">
            <div class="box-header with-border">
                <a type="button" href="<?= base_url('admin/layanan/index') ?>" class="btn bg-green btn-sm"><span
                        class="fa fa-arrow-left"></span> Kembali</a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="row">
                    <div class="col-md-6">

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Layanan</label>
                                <input type="text" class="form-control" value="<?= set_value('nama_layanan'); ?>"
                                    name="nama_layanan" id="nama_layanan">
                                <?= form_error('nama_layanan', '<small class="text-danger pl-1">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Icon</label>
                                <input type="text" class="form-control" name="icon" id="icon"
                                    value="<?= set_value('icon'); ?>">
                                <?= form_error('icon', '<small class="text-danger pl-1">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Foto</label>
                                <?= form_upload('foto'); ?>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>keterangan</label>
                                <textarea type="text" class="form-control" name="keterangan"
                                    id="keterangan"><?= set_value('keterangan'); ?></textarea>
                                <?= form_error('keterangan', '<small class="text-danger pl-1">', '</small>'); ?>
                            </div>
                        </div>
                        <!-- /.form-group -->
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
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->