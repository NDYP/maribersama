<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <div class="container">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                <?= $title; ?>
                <small><?= date('d-m-Y h:i:s', strtotime($transaksi['tanggal_transaksi'])); ?></small>

            </h1>
            <ol class="breadcrumb">
                <li><a href="<?= base_url('admin/dashboard/index'); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="<?= base_url('admin/admin/index'); ?>">History</a></li>
                <li class="active"><?= $title; ?></li>
            </ol>
        </section>
        <!-- Main content -->
        <!-- Main content -->
        <section class="content">

            <div class="box box-default">
                <div class="box-header with-border">
                    <a href="<?= base_url('admin/dashboard/index') ?>" class="btn btn-xs bg-blue"><span
                            class="fa fa-arrow-left"></span>
                        Kembali</a>
                </div>

                <div class="box-body">
                    <div class="row">
                        <div class="col-md-12">
                            <!-- <center>
                                <?php if ($transaksi['thumbnail']) : ?>
                                <a href="<?= base_url('admin/transaksi/download/' . $transaksi['id_mobil']); ?>">

                                    <img class="img center-block img-responsive profile-user-img"
                                        src="<?= base_url('assets/foto/mobil/' . $transaksi['thumbnail']); ?>" alt=""
                                        style="width: auto;max-height: 500px;max-width: 500px; vertical-align: left;">
                                </a>
                                <?php else : ?>
                                <img class="img center-block img-responsive profile-user-img"
                                    src="<?= base_url('assets/foto/profil.png') ?>" alt=""
                                    style="width: auto;max-height: 500px;max-width: 500px; vertical-align: left;">
                                <?php endif; ?>
                            </center> -->
                            <table id="" class="table table-striped dataTable" role="grid"
                                aria-describedby="example1_info">
                                <tbody>
                                    <tr>
                                        <th>ID Transaksi</th>
                                        <th> : </th>
                                        <td><?= $transaksi['id_transaksi'] ?></td>
                                        <td></td>
                                        <th>Alamat</th>
                                        <th> : </th>
                                        <td><?= $transaksi['transaksi_alamat'] ?></td>
                                        <td></td>
                                        <th>DP</th>
                                        <th> : </th>
                                        <td><?= "Rp." . number_format($transaksi['dp'], 2, ',', '.') ?></td>
                                    </tr>
                                    <tr>
                                        <th>VA Pembayaran DP</th>
                                        <th> : </th>
                                        <td><?= $transaksi['bank'] ?> - <?= $transaksi['va'] ?></td>
                                        <td></td>
                                        <th>Tanggal Kembali</th>
                                        <th> : </th>
                                        <td><?= date('d-m-Y', strtotime($transaksi['tanggal_kembali'])); ?></td>
                                        <td></td>
                                        <th>Denda</th>
                                        <th> : </th>
                                        <td><?= "Rp." . number_format($transaksi['denda'], 2, ',', '.') ?></td>
                                    </tr>
                                    <tr>
                                        <th>Penyewa</th>
                                        <th> : </th>
                                        <td><?= $transaksi['nama_lengkap'] ?></td>
                                        <td></td>
                                        <th>Tanggal Pinjam</th>
                                        <th> : </th>
                                        <td><?= date('d-m-Y', strtotime($transaksi['tanggal_pinjam'])); ?></td>
                                        <td></td>
                                        <th>Bayar</th>
                                        <th> : </th>
                                        <td><?= "Rp." . number_format($transaksi['bayar'], 2, ',', '.') ?></td>
                                    </tr>
                                    <tr>
                                        <th>Mobil</th>
                                        <th> : </th>
                                        <td><?= $transaksi['jenis'] ?></td>
                                        <td></td>
                                        <th>Opsi</th>
                                        <th> : </th>
                                        <td><?= $transaksi['opsi'] ?></td>
                                        <td></td>
                                        <th>PDF</th>
                                        <th> : </th>
                                        <td><a href="<?= $transaksi['pdf_url'] ?>">Link</a></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->

        </section>
        <!-- /.content -->
        <!-- /.content -->
    </div>
</div>
<!-- /.content-wrapper -->