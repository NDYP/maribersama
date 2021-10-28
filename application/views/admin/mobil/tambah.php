<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <?= $title; ?>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?= base_url('admin/dashboard/index'); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="<?= base_url('admin/mobil/index'); ?>">Karyawan</a></li>
            <li class="active"><?= $title; ?></li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <?= form_open_multipart('admin/mobil/tambah') ?>
        <div class="box box-default">
            <div class="box-header with-border">
                <a type="button" href="<?= base_url('admin/mobil/index') ?>" class="btn bg-green btn-sm"><span class="fa fa-arrow-left"></span> Kembali</a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Pemilik</label>
                                <select name="id_pemilik" class="form-control select2" style="width: 100%;">
                                    <option selected="selected" value="">Pilih</option>
                                    <?php foreach ($pemilik as $x) : ?>
                                        <option value="<?= $x['id_pengguna'] ?>"><?= $x['nama_lengkap'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <?= form_error('id_pemilik', '<small class="text-danger pl-1">', '</small>'); ?>
                        </div>
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
                                <input type="text" class="form-control" name="jumlah_kursi" id="password">
                                <?= form_error('jumlah_kursi', '<small class="text-danger pl-1">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Transmisi</label>
                                <select name="transmisi" class="form-control select2" style="width: 100%;">
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
                                <textarea type="text" class="form-control" name="info" id="password"></textarea>
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
                        <!-- /.form-group -->
                    </div>
                    <div class="col-md-6">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Sewa (Rp)</label>
                                <input type="text" class="form-control" name="sewa">
                                <?= form_error('sewa', '<small class="text-danger pl-1">', '</small>'); ?>
                            </div>
                        </div>
                        <!-- /.form-group -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Tarif (Rp)</label>
                                <input type="text" class="form-control" name="tarif">
                                <?= form_error('tarif', '<small class="text-danger pl-1">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Diskon (%)</label>
                                <input type="text" class="form-control" name="diskon">
                                <?= form_error('diskon', '<small class="text-danger pl-1">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Status</label>
                                <select name="status" class="form-control select2" style="width: 100%;">
                                    <option selected="selected" name="status" value="">Pilih</option>
                                    <option value="tersedia" name="status">Tersedia</option>
                                </select>
                                <?= form_error('status', '<small class="text-danger pl-1">', '</small>'); ?>
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
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->