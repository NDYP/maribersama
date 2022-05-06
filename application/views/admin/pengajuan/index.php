<div class="content-wrapper" style="min-height: 926px;">
    <!-- Content Header (Page header) -->
    <div class="container">
        <section class="content-header">
            <h1>
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
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header">
                            <a class="btn btn-xs bg-green" type="button"
                                href="<?= base_url('admin/pengajuan/tambah'); ?>"><span class="fa fa-plus"></span>
                                Tambah</a>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <table id="example1" class="table table-bordered table-striped dataTable"
                                            role="grid" aria-describedby="example1_info">
                                            <thead>
                                                <tr role="row">
                                                    <th>No</th>

                                                    <th>Jenis (Tahun)</th>
                                                    <th>Transmisi</th>
                                                    <th>Jumlah Kursi</th>

                                                    <th>File (STNK)</th>
                                                    <th>Status</th>
                                                    <th style="width: 15%" style="width: 111.703px;">Opsi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $no = 1;
                                                foreach ($index as $x) : ?>
                                                <tr role="row" class="odd">
                                                    <td class="sorting_1"><?= $no++; ?></td>

                                                    <td>
                                                        <?= $x['jenis'] ?> (<?= $x['tahun'] ?>)
                                                    </td>
                                                    <td><?= $x['transmisi'] ?><br>
                                                    <td><?= $x['jumlah_kursi'] ?></td>
                                                    </td>
                                                    <!-- <td><?= "Rp." . number_format($x['sewa'], 2, ',', '.') ?>
                                                    </td> -->
                                                    <td>
                                                        <?php if ($x['berkas'] == NULL) : ?>
                                                        <span class="badge bg-red"><?= 'Belum Lengkap' ?></span>
                                                        <?php else : ?>
                                                        <span class="badge bg-red"><?= 'Lengkap' ?></span>
                                                        <?php endif; ?>
                                                    </td>
                                                    <td><span class="badge bg-red"><?= $x['status'] ?></span></td>
                                                    <td>
                                                        <div class="btn-group">
                                                            <button type="button"
                                                                class="btn bg-green btn-social btn-flat btn-xs"
                                                                data-toggle="dropdown"><i
                                                                    class="fa fa-arrow-circle-down"></i>
                                                                Pilih</button>
                                                            <ul class="dropdown-menu" role="menu">
                                                                <li>
                                                                    <a href="<?= base_url('admin/pengajuan/tambahberkas/' . $x['id_mobil']); ?>"
                                                                        class="btn btn-social btn-flat btn-block btn-sm"><i
                                                                            class="fa fa-plus"></i>Berkas</a>
                                                                </li>
                                                                <li>
                                                                    <a href="<?= base_url('admin/pengajuan/lihat/' . $x['id_mobil']); ?>"
                                                                        class="btn btn-social btn-flat btn-block btn-sm"><i
                                                                            class="fa fa-edit"></i>Detail</a>
                                                                </li>
                                                                <li>
                                                                    <a href="<?= base_url('admin/pengajuan/hapus/' . $x['id_mobil']); ?>"
                                                                        class="btn btn-social btn-flat btn-block btn-sm tombol-hapus"><i
                                                                            class="fa fa-trash-o"></i> Hapus</a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>
</div>