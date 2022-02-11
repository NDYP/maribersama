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

                <li><a href="<?= base_url('admin/pengajuan/index'); ?>"><i class="fa fa-table"></i>
                        <?= $title; ?></a>
                </li>
            </ol>
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="box box-default">
                <div class="box-header with-border">
                    <a type="button" href="<?= base_url('admin/pengajuan/index') ?>" class="btn bg-green btn-xs"><span
                            class="fa fa-arrow-left"></span> Kembali</a>
                </div>
                <!-- /.box-header -->
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="inputEmail" class="control-label">Tipe</label>
                                    <input type="text" class="form-control" placeholder="Tipe" name="tipe"
                                        value="<?= set_value('tipe'); ?>">
                                    <?= form_error('tipe', '<small class="text-danger pl-1">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="inputEmail" class="control-label">Jenis</label>
                                    <input type="text" class="form-control" placeholder="Jenis" name="jenis"
                                        value="<?= set_value('jenis'); ?>">
                                    <?= form_error('jenis', '<small class="text-danger pl-1">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="inputEmail" class="control-label">Warna</label>
                                    <input type="text" class="form-control" placeholder="Warna" name="warna"
                                        value="<?= set_value('warna'); ?>">
                                    <?= form_error('warna', '<small class="text-danger pl-1">', '</small>'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="inputEmail" class="control-label">Jumlah Kursi</label>
                                    <input type="text" class="form-control" placeholder="Jumlah Kursi"
                                        name="jumlah_kursi" value="<?= set_value('jumlah_kursi'); ?>">
                                    <?= form_error('jumlah_kursi', '<small class="text-danger pl-1">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="inputEmail" class="control-label">Transmisi</label>
                                    <select name="transmisi" class="form-control select2" style="width: 100%;">
                                        <option selected="selected" value="<?= set_value('transmisi'); ?>">Pilih
                                        </option>
                                        <option value="Manual" <?= set_select('transmisi', 'Manual'); ?>>Manual
                                        </option>
                                        <option value="Matic" <?= set_select('transmisi', 'Matic'); ?>>Matic</option>
                                    </select>
                                    <?= form_error('transmisi', '<small class="text-danger pl-1">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Info Tambahan</label>
                                    <textarea type="text" class="form-control" name="info" id="password">
                                    </textarea>
                                </div>
                            </div>
                            <!-- /.box-body -->
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="inputEmail" class="control-label">Sewa</label>
                                    <input type="text" class="form-control" placeholder="Sewa/Bulan Ke Pemilik"
                                        name="sewa" value="<?= set_value('sewa'); ?>">
                                    <?= form_error('sewa', '<small class="text-danger pl-1">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="inputExperience" class="control-label" name="">Foto</label>
                                    <input accept=".jpg, .jpeg, .png" title="Hanya tipe Foto" type="file"
                                        name="thumbnail"></input>
                                    <?= form_error('thumbnail', '<small class="text-danger pl-1">', '</small>'); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="box-footer">
                        <button class="btn btn-xs bg-blue"><span class="fa fa-save"></span> Simpan</button>
                    </div>
                </form>
                <!-- /.row -->
            </div>

        </section>
        <!-- /.content -->
    </div>
</div>
<!-- /.content-wrapper -->