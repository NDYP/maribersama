<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <?= $title; ?>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?= base_url('admin/dashboard/index'); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="<?= base_url('admin/transaksi/katalog'); ?>">Katalog</a></li>
            <li class="active"><?= $title; ?></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <?= form_open_multipart('admin/transaksi/tambah') ?>
        <div class="box box-default">
            <div class="box-header with-border">
                <a type="button" href="<?= base_url('admin/transaksi/katalog') ?>" class="btn bg-green btn-xs"><span
                        class="fa fa-arrow-left"></span> Kembali</a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Penyewa</label>
                                <select name="id_penyewa" class="form-control select2" style="width: 100%;">
                                    <?php foreach ($penyewa as $x) : ?>
                                    <option value="<?= $x['id_pengguna'] ?>" name="id_penyewa">NIK : <?= $x['nik'] ?> -
                                        Nama : <?= $x['nama_lengkap'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <?= form_error('id_penyewa', '<small class="text-danger pl-1">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Alamat</label>
                                <input type="text" value="<?= set_value('alamat'); ?>" class="form-control"
                                    name="alamat" id="password">
                                <input type="hidden" class="form-control" name="id_transaksi"
                                    value="<?= $this->uri->segment(4, 0); ?>">
                                <?= form_error('alamat', '<small class="text-danger pl-1">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Mobil</label>
                                <select name="id_mobil" class="form-control select2" style="width: 100%;">
                                    <?php foreach ($mobil as $x) : ?>
                                    <?php if ($id_mobil == $x['id_mobil']) : ?>
                                    <option value=<?= $x['id_mobil']; ?><?= set_select('id_mobil', $x['id_mobil']); ?>
                                        name=" id_mobil" selected>
                                        Tipe : <?= $x['tipe']; ?> - Jenis : <?= $x['jenis']; ?></option>
                                    <?php else : ?>
                                    <option value=<?= $x['id_mobil']; ?><?= set_select('id_mobil', $x['id_mobil']); ?>
                                        name="id_mobil">
                                        Tipe : <?= $x['tipe']; ?> - Jenis : <?= $x['jenis']; ?></option>
                                    <?php endif; ?>
                                    <?php endforeach; ?>
                                </select>
                                <?= form_error('id_penyewa', '<small class="text-danger pl-1">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <!-- radio -->
                                <div class="form-group">
                                    <label>Opsi</label>
                                    <br>
                                    <label>
                                        <input type="radio" name="opsi" value="ambil" class="minimal-red" checked>
                                        Ambil
                                    </label>
                                    <label>
                                        <input type="radio" name="opsi" value="antar" class="minimal-red">
                                        Antar
                                    </label>
                                </div>
                            </div>
                        </div>
                        <!-- /.form-group -->
                    </div>
                    <div class="col-md-6">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Tanggal Sewa</label>
                                <input value="<?= set_value('tanggal_pinjam'); ?>" type="text" class="form-control"
                                    id="datepicker" name="tanggal_pinjam">
                                <?= form_error('tanggal_pinjam', '<small class="text-danger pl-1">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Tanggal Kembali</label>
                                <input value="<?= set_value('tanggal_kembali'); ?>" type="text" class="form-control"
                                    id="datepicker1" name="tanggal_kembali">
                                <?= form_error('tanggal_kembali', '<small class="text-danger pl-1">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>DP</label>
                                <input value="<?= set_value('dp'); ?>" type="text" class="form-control" name="dp">
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.col -->
            </div>
            <div class="box-footer">
                <button type="submit" class="btn bg-green btn-xs" title="simpan"><span class="fa fa-save"></span>
                    Simpan</button>
            </div>
            <!-- /.row -->
        </div>
        <?= form_close(); ?>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->