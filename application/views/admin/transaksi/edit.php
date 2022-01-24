<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="container">
        <section class="content-header">
            <h1>
                <?= $title; ?>
            </h1>
            <ol class="breadcrumb">
                <li><a href="<?= base_url('admin/dashboard/index'); ?>"><i class="fa fa-dashboard"></i> Dashboard</a>
                </li>
                <li><a href="<?= base_url('admin/transaksi/katalog'); ?>">Katalog</a></li>
                <li class="active"><?= $title; ?></li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <?= form_open_multipart('admin/transaksi/ubah') ?>
            <div class="box box-default">
                <div class="box-header with-border">
                    <a type="button" href="<?= base_url('admin/transaksi/index') ?>" class="btn bg-green btn-xs"><span
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
                                        <?php if ($transaksi['id_penyewa'] == $x['id_pengguna']) : ?>
                                        <option value="<?= $x['id_pengguna'] ?>" name="id_penyewa" selected>NIK :
                                            <?= $x['nik'] ?> -
                                            Nama : <?= $x['nama_lengkap'] ?></option>
                                        <?php else : ?>
                                        <option value="<?= $x['id_pengguna'] ?>" name="id_penyewa">NIK :
                                            <?= $x['nik'] ?> -
                                            Nama : <?= $x['nama_lengkap'] ?></option>
                                        <?php endif; ?>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Alamat</label>
                                    <input type="text" class="form-control" name="alamat"
                                        value="<?= $transaksi['alamat']; ?>" id="password">
                                    <input type="hidden" class="form-control" name="id_transaksi"
                                        value="<?= $transaksi['id_transaksi']; ?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Mobil</label>
                                    <select name="id_mobil" class="form-control select2" style="width: 100%;">

                                        <?php foreach ($mobil as $x) : ?>
                                        <?php if ($transaksi['id_mobil'] == $x['id_mobil']) : ?>
                                        <option value="<?= $x['id_mobil']; ?>" name="id_mobil" selected>
                                            Tipe : <?= $x['tipe']; ?> - Jenis : <?= $x['jenis']; ?></option>
                                        <?php else : ?>
                                        <option value="<?= $x['id_mobil']; ?>" name="id_mobil">
                                            Tipe : <?= $x['tipe']; ?> - Jenis : <?= $x['jenis']; ?></option>
                                        <?php endif; ?>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <!-- radio -->
                                    <div class="form-group">
                                        <label>Opsi</label>
                                        <br>
                                        <label>
                                            <input type="radio" name="opsi" value="ambil" class="minimal-red"
                                                <?php if ($transaksi['opsi'] === 'ambil') echo 'checked'; ?>>
                                            Ambil
                                        </label>
                                        <label>
                                            <input type="radio" name="opsi" value="antar" class="minimal-red"
                                                <?php if ($transaksi['opsi'] === 'antar') echo 'checked'; ?>>
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
                                    <input type="text" class="form-control" id="datepicker" name="tanggal_pinjam"
                                        value="<?= $transaksi['tanggal_pinjam']; ?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Tanggal Kembali</label>
                                    <input type="text" class="form-control" id="datepicker1" name="tanggal_kembali"
                                        value="<?= $transaksi['tanggal_kembali']; ?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>DP</label>
                                    <input type="text" class="form-control" name="dp" value="<?= $transaksi['dp']; ?>">
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
</div>
<!-- /.content-wrapper -->