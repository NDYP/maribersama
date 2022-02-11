<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <div class="container">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                <?= $title; ?>
                <small> <?= $title2; ?></small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="<?= base_url('admin/history/index'); ?>"><i class="fa fa-book"></i>
                        <?= $title; ?></a></li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <?= form_open_multipart('admin/history/ubah') ?>
            <div class="box box-default">
                <div class="box-header with-border">
                    <a type="button" href="<?= base_url('admin/history/index') ?>" class="btn bg-green btn-xs"><span
                            class="fa fa-arrow-left"></span> Kembali</a>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Penyewa</label>
                                    <select name="id_penyewa" class="form-control select2" style="width: 100%;"
                                        disabled>

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
                                        value="<?= $transaksi['alamat']; ?>" id="password" disabled>
                                    <input type="hidden" class="form-control" name="id_transaksi"
                                        value="<?= $transaksi['id_transaksi']; ?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Mobil</label>
                                    <select name="id_mobil" class="form-control select2" style="width: 100%;" disabled>

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
                                            <input type="radio" name="opsi" value="ambil" class="minimal-red" checked>
                                            Ambil
                                        </label>
                                        <label>
                                            <input type="radio" name="opsi" value="antar" class="minimal-red" disabled>
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
                                        value="<?= $transaksi['tanggal_pinjam']; ?>" disabled>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Tanggal Kembali</label>
                                    <input type="text" class="form-control" id="datepicker1" name="tanggal_kembali"
                                        value="<?= $transaksi['tanggal_kembali']; ?>" disabled>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>DP</label>
                                    <input type="text" class="form-control" name="dp" value="<?= $transaksi['dp']; ?>"
                                        disabled>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.col -->
                </div>

                <!-- /.row -->
            </div>
            <?= form_close(); ?>
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
</div>