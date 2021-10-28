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
        <?= form_open_multipart('admin/layanan/ubah') ?>
        <div class="box box-default">
            <div class="box-header with-border">
                <a type="button" href="<?= base_url('admin/layanan/index') ?>" class="btn bg-green btn-sm"><span
                        class="fa fa-arrow-left"></span> Kembali</a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="row">
                    <div class="col-md-4">
                        <img class="img center-block img-responsive"
                            src="<?= base_url('assets/foto/layanan/' . $layanan['foto']) ?>">
                        <!-- /.box -->
                    </div>
                    <div class="col-md-6">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Layanan</label>
                                <input type="text" class="form-control" name="nama_layanan" id="nama_layanan"
                                    value="<?= $layanan['nama_layanan'] ?>">
                                <input type="hidden" class="form-control" name="id_layanan" id="id_layanan"
                                    value="<?= $layanan['id_layanan'] ?>">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Icon</label>
                                <input type="text" class="form-control" name="icon" id="icon"
                                    value="<?= $layanan['icon'] ?>">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Ubah Foto</label>
                                <?= form_upload('foto'); ?>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>keterangan</label>
                                <textarea type="text" class="form-control" name="keterangan"
                                    id="keterangan"><?= $layanan['keterangan'] ?></textarea>
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