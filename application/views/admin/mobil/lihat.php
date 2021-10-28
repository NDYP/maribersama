<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <?= $title; ?>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?= base_url('admin/dashboard/index'); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="<?= base_url('admin/mobil/index'); ?>">Karyawan</a></li>
            <li class="active"><?= $title; ?></li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">

            <div class="col-md-2">
                <!-- Profile Image -->
                <div class="box box-danger">
                    <div class="box-body box-danger">
                        <img style="width: 3cm; width:4cm;" class="img center-block img-responsive img-rounded" src="<?= base_url('assets/foto/mobil/' . $index2['thumbnail']) ?>" alt="User profile picture">
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
            <div class="col-md-9">
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#activity" data-toggle="tab">Data</a></li>
                        <li><a href="#galeri" data-toggle="tab">Berkas</a></li>
                        <li><a href="#settings" data-toggle="tab">Galeri</a></li>
                    </ul>
                    <div class="tab-content">
                        <div class="active tab-pane" id="activity">
                            <div class="box-body">
                                <form class="form-horizontal" action="<?= base_url('admin/mobil/ubah') ?>" method="post" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label for="inputName" class="col-sm-2 control-label">Pemilik</label>
                                        <div class="col-sm-3">
                                            <input type="hidden" class="form-control" placeholder="id_mobil" name="id_mobil" value="<?= $index2['id_mobil']; ?>">
                                            <input type="hidden" class="form-control" name="id_pemilik" value="<?= $index2['id_pemilik']; ?>">
                                            <input type="text" class="form-control" value="<?= $index2['nama_lengkap']; ?>" disabled>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputEmail" class="col-sm-2 control-label">Tipe</label>
                                        <div class="col-sm-3">
                                            <input type="text" class="form-control" placeholder="Tipe" name="tipe" value="<?= $index2['tipe']; ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputEmail" class="col-sm-2 control-label">Jenis</label>
                                        <div class="col-sm-3">
                                            <input type="text" class="form-control" placeholder="Jenis" name="jenis" value="<?= $index2['jenis']; ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputEmail" class="col-sm-2 control-label">Warna</label>
                                        <div class="col-sm-3">
                                            <input type="text" class="form-control" placeholder="Warna" name="warna" value="<?= $index2['warna']; ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputEmail" class="col-sm-2 control-label">Jumlah Kursi</label>
                                        <div class="col-sm-1">
                                            <input type="text" class="form-control" placeholder="Jumlah Kursi" name="jumlah_kursi" value="<?= $index2['jumlah_kursi']; ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputEmail" class="col-sm-2 control-label">Transmisi</label>
                                        <div class="col-sm-2">
                                            <select name="transmisi" class="form-control select2" style="width: 100%;">
                                                <option value="">Pilih</option>
                                                <option value="Manual" <?php if ($index2['transmisi'] === 'Manual') echo 'selected="selected"'; ?>>Manual</option>
                                                <option value="Matic" <?php if ($index2['transmisi'] === 'MAtic') echo 'selected="selected"'; ?>>Matic</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputEmail" class="col-sm-2 control-label">Sewa</label>
                                        <div class="col-sm-3">
                                            <input type="text" class="form-control" placeholder="Sewa/Bulan Ke Pemilik" name="sewa" value="<?= $index2['sewa']; ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputEmail" class="col-sm-2 control-label">Tarif</label>
                                        <div class="col-sm-3">
                                            <input type="text" class="form-control" placeholder="Taris Sewa/hari" name="tarif" value="<?= $index2['tarif']; ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputEmail" class="col-sm-2 control-label">Diskon</label>
                                        <div class="col-sm-1">
                                            <input type="text" class="form-control" placeholder="" name="diskon" value="<?= $index2['diskon']; ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputExperience" class="col-sm-2 control-label" name="gaji">Foto</label>
                                        <div class="col-sm-10">
                                            <input accept=".jpg, .jpeg, .png" title="Hanya tipe Foto " type="file" name="thumbnail"></input>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-offset-2 col-sm-10">
                                            <button type="submit" class="btn bg-green btn-xs" title="simpan"><span class="fa fa-save"></span> Simpan</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="tab-pane" id="galeri">
                            <div class="box-header">
                                <?= form_open_multipart('admin/mobil/tambahberkas') ?>

                                <!-- /.box-header -->
                                <div class="box-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Nama Berkas</label>
                                                    <input type="text" class="form-control" name="judul" id="username">
                                                    <input type="hidden" class="form-control" id="inputName" placeholder="id_pengguna" name="id_pemilik" value="<?= $index2['id_mobil']; ?>">
                                                    <?= form_error('judul', '<small class="text-danger pl-1">', '</small>'); ?>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Berkas</label>
                                                    <div>
                                                        <?= form_upload('berkas'); ?>
                                                    </div>
                                                    <?= form_error('berkas', '<small class="text-danger pl-1">', '</small>'); ?>

                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <br>
                                                <button type="submit" class="btn bg-green btn-xs" title="simpan"><span class="fa fa-save"></span> Simpan</button>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.col -->
                                </div>

                                <?= form_close(); ?>
                            </div>
                            <div class="box-body">
                                <table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
                                    <thead>
                                        <tr role="row">
                                            <th style="width: 2%" class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 177.281px;">No</th>
                                            <th style="width: 224.844px;">Judul</th>
                                            <th style="width: 206.484px;">Berkas</th>
                                            <th style="width: 152.688px;">Tanggal</th>
                                            <th style="width: 15%" style="width: 111.703px;">Opsi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1;
                                        foreach ($berkas as $x) : ?>
                                            <tr role="row" class="odd">
                                                <td class="sorting_1"><?= $no++; ?></td>
                                                <td><?= $x['judul'] ?></td>
                                                <td><?= $x['berkas'] ?></td>
                                                <td><?= $x['daftar'] ?></td>
                                                <td>
                                                    <a class="btn btn-xs bg-yellow" type="button" href="<?= base_url('admin/mobil/hapusberkas/' . $x['id_berkas']); ?>"><span class="fa fa-trash"></span> Hapus</a>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane" id="settings">
                            <div class="box-header">
                                <?= form_open_multipart('admin/mobil/tambahgaleri') ?>
                                <!-- /.box-header -->
                                <div class="box-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Foto</label>
                                                    <div>
                                                        <input type="hidden" name="id_mobil" id="" value="<?= $index2['id_mobil']; ?>">
                                                        <?= form_error('id_mobil', '<small class="text-danger pl-1">', '</small>'); ?>
                                                        <?= form_upload('foto'); ?>
                                                    </div>
                                                    <?= form_error('foto', '<small class="text-danger pl-1">', '</small>'); ?>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <br>
                                                <button type="submit" class="btn bg-green btn-xs" title="simpan"><span class="fa fa-save"></span> Simpan</button>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.col -->
                                </div>
                                <?= form_close(); ?>
                            </div>
                            <div class="box-body">
                                <table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
                                    <thead>
                                        <tr role="row">
                                            <th style="width: 2%" class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 177.281px;">No</th>
                                            <th style="width: 206.484px;">foto</th>
                                            <th style="width: 152.688px;">Tanggal Upload</th>
                                            <th style="width: 15%" style="width: 111.703px;">Opsi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1;
                                        foreach ($galeri as $x) : ?>
                                            <tr role="row" class="odd">
                                                <td class="sorting_1"><?= $no++; ?></td>
                                                <td><?= $x['foto'] ?></td>
                                                <td><?= $x['daftar'] ?></td>
                                                <td>
                                                    <a class="btn btn-xs bg-yellow" type="button" href="<?= base_url('admin/mobil/hapusgaleri/' . $x['id_galeri']); ?>"><span class="fa fa-trash"></span> Hapus</a>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- /.tab-pane -->
                    </div>
                    <!-- /.tab-content -->
                </div>
                <!-- /.nav-tabs-custom -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->