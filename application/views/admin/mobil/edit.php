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
                <li><a href="<?= base_url('admin/mobil/index'); ?>">Karyawan</a></li>
                <li class="active"><?= $title; ?></li>
            </ol>
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="box box-default">
                <div class="box-header with-border">
                    <a class="btn btn-xs bg-blue" href="<?= base_url('admin/mobil/index') ?>"><span
                            class="fa fa-arrow-left"></span>
                        Kembali</a>
                </div>
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="inputName" class="control-label">Pemilik</label>
                                    <input type="hidden" class="form-control" placeholder="id_mobil" name="id_mobil"
                                        value="<?= $mobil['id_mobil']; ?>">
                                    <input type="hidden" class="form-control" name="id_pemilik"
                                        value="<?= $mobil['id_pemilik']; ?>">
                                    <input type="text" class="form-control" value="<?= $mobil['nama_lengkap']; ?>"
                                        disabled>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="inputEmail" class="control-label">Tipe</label>
                                    <input type="text" class="form-control" placeholder="Tipe" name="tipe"
                                        value="<?= $mobil['tipe']; ?>">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="inputEmail" class="control-label">Jenis</label>
                                    <input type="text" class="form-control" placeholder="Jenis" name="jenis"
                                        value="<?= $mobil['jenis']; ?>">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="inputEmail" class="control-label">Warna</label>
                                    <input type="text" class="form-control" placeholder="Warna" name="warna"
                                        value="<?= $mobil['warna']; ?>">
                                </div>

                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="inputEmail" class="control-label">Jumlah Kursi</label>
                                    <input type="text" class="form-control" placeholder="Jumlah Kursi"
                                        name="jumlah_kursi" value="<?= $mobil['jumlah_kursi']; ?>">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="inputEmail" class="control-label">Transmisi</label>
                                    <select name="transmisi" class="form-control select2" style="width: 100%;">
                                        <option value="">Pilih</option>
                                        <option value="Manual"
                                            <?php if ($mobil['transmisi'] === 'Manual') echo 'selected="selected"'; ?>>
                                            Manual</option>
                                        <option value="Matic"
                                            <?php if ($mobil['transmisi'] === 'MAtic') echo 'selected="selected"'; ?>>
                                            Matic</option>
                                    </select>
                                </div>

                            </div>
                            <!-- /.box-body -->
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="inputEmail" class="control-label">Sewa</label>
                                    <input type="text" class="form-control" placeholder="Sewa/Bulan Ke Pemilik"
                                        name="sewa" value="<?= $mobil['sewa']; ?>">
                                </div>

                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="inputEmail" class="control-label">Tarif</label>
                                    <input type="text" class="form-control" placeholder="Taris Sewa/hari" name="tarif"
                                        value="<?= $mobil['tarif']; ?>">
                                </div>

                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="inputEmail" class="control-label">Diskon</label>
                                    <input type="text" class="form-control" placeholder="" name="diskon"
                                        value="<?= $mobil['diskon']; ?>">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="inputExperience" class="control-label" name="gaji">Foto</label>
                                    <input accept=".jpg, .jpeg, .png" title="Hanya tipe Foto " type="file"
                                        name="thumbnail"></input>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="box-footer">
                        <button class="btn btn-xs bg-blue"><span class="fa fa-save"></span> Simpan</button>
                    </div>
                </form>
                <!-- /.box -->
            </div>
        </section>
        <!-- /.content -->
        <!-- /.content -->
    </div>
</div>

<!-- /.content-wrapper -->