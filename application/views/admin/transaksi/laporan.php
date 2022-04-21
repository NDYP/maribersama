<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Laporan</title>
    <link rel="stylesheet" href="">

    <link rel="stylesheet" href="<?= base_url('assets'); ?>/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet"
        href="<?= base_url('assets'); ?>/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/') ?>plugins/bootstrap-4.3.1/dist/css/bootstrap.min.css">
    <?php foreach ($profil as $x) : ?>
    <link rel="icon" href="<?= base_url('assets/foto/profil/' . $x['logo']) ?>" type="image/x-icon">
    <?php endforeach; ?>
</head>

<body>
    <?php foreach ($profil as $x) : ?>
    <img src="<?= base_url('assets/foto/profil/' . $x['logo']) ?>"
        style="padding:0%;position: absolute; width: 80px; height: auto;">
    <?php endforeach; ?>
    <table style="width: 100%;">
        <tr>
            <td align="center">
                <span style="line-height: 1; font-weight: bold;">
                    <font style="line-height: 0.9;" face="Arial" font size="16">
                        Rental Mari Bersaudara</font>

                </span>
                <p style="line-height: 1; margin:2px;">
                    <font face="Arial" font size=10px>
                        <br>
                        Alamat : <?php foreach ($profil as $x) : ?>
                        <?= $x['alamat']; ?>
                        <br>
                        E-mail : <?= $x['email']; ?> - Kontak : <?= $x['no_hp']; ?>

                        <?php endforeach; ?>

                </p>
            </td>
        </tr>
    </table>
    <br>
    <hr>
    <br>
    <p align="left">
        <font face="Times New Roman" font size="">
            Laporan Akhir Bulan <?= bulan(); ?> Pemasukan & Pengeluaran <br>
    </p>

    <font font-size=10px face="Times New Roman"><b>Pemasukan transaksi</b>
        <table style="font-size: 12px;" class="table-responsive" style="width: 100%; page-break-after: always;"
            border="1" cellspacing="0">
            <tr>
                <th>No.</th>
                <th>Penyewa</th>
                <th>Mobil</th>
                <th>
                    Alamat
                </th>
                <th>Pinjam - Kembali</th>

                <th>Tarif <br> dp <br> Denda <br> Bayar</th>
                <th>Pemasukan</th>
            </tr>
            <?php $no = 0;
            foreach ($pemasukan_transaksi as $x) : $no++ ?>
            <tr>
                <td>
                    <center> <?= $no; ?> </center>
                </td>
                <td>NIK : <?= $x['nik'] ?> <br>
                    Nama : <?= $x['nama_lengkap'] ?></td>
                <td><?= $x['tipe'] ?> <br>
                    <?= $x['jenis'] ?></td>
                <td>
                    <?= $x['transaksi_alamat'] ?>
                </td>
                <td><?= date('d-m-Y', strtotime($x['tanggal_pinjam'])); ?> <br> sampai <br>
                    <?= date('d-m-Y', strtotime($x['tanggal_kembali'])); ?></td>
                <td><?= "Rp." . number_format($x['tarif'], 2, ',', '.') ?> -
                    <?= $x['diskon'] ?>%
                    <br>
                    <?= "Rp." . number_format($x['dp'], 2, ',', '.') ?>
                    <br>
                    <?= "Rp." . number_format($x['denda'], 2, ',', '.') ?>
                    <br><?= "Rp." . number_format($x['bayar'], 2, ',', '.') ?>
                </td>
                <td>
                    <?= "Rp." . number_format($x['sewa'], 2, ',', '.') ?>
                </td>
            </tr>
            <?php endforeach; ?>
            <tr>
                <th align="center" colspan="6">Total Pemasukan</th>
                <td> <b>
                        <?php $no = 0;
                        foreach ($pemasukan_total as $x) : $no++ ?>
                        <?= "Rp." . number_format($x['x'], 2, ',', '.') ?>
                    </b></td>
                <?php endforeach; ?>

            </tr>
        </table>
    </font>
    <br>
    <font font-size=10px face="Times New Roman"><b>Pengeluaran gaji karyawan</b>
        <table style="font-size: 12px;" class="table-responsive" style="width: 100%; page-break-after: always;"
            border="1" cellspacing="0">
            <tr>
                <th>No.</th>
                <th>NIK</th>
                <th>Nama Lengkap</th>
                <th>
                    No. Hp
                </th>
                <th>Jabatan</th>

                <th>Gaji/Bulan</th>
            </tr>
            <?php $no = 0;
            foreach ($pengeluaran_karyawan as $x) : $no++ ?>
            <tr>
                <td>
                    <center> <?= $no; ?> </center>
                </td>
                <td><?= $x['nik'] ?></td>
                <td><?= $x['nama_lengkap'] ?></td>
                <td>
                    <?= $x['no_hp'] ?>
                </td>
                <td><?= $x['jabatan'] ?></td>
                <td><?= "Rp." . number_format($x['salary'], 2, ',', '.') ?>
                </td>
            </tr>
            <?php endforeach; ?>
            <tr>
                <th align="center" colspan="5">Total Pengeluaran Gaji</th>
                <td> <b>
                        <?php $no = 0;
                        foreach ($pengeluaran_karyawan_total as $x) : $no++ ?>
                        <?= "Rp." . number_format($x['x'], 2, ',', '.') ?>
                    </b></td>
                <?php endforeach; ?>

            </tr>
        </table>
    </font>
    <!-- <br>
    <font font-size=10px face="Times New Roman"><b>Pengeluaran sewa mobil</b>
        <table class="table-responsive" style="width: 100%; page-break-after: always;" border="1" cellspacing="0">
            <tr>
                <th>No.</th>
                <th>Pemilik</th>
                <th>Tipe</th>
                <th>
                    Jenis
                </th>
                <th>Transmisi</th>
                <th>
                    Sewa/Bulan
                </th>
            </tr>
            <?php $no = 0;
            foreach ($pengeluaran_mobil as $row) : $no++ ?>
            <tr>
                <td>
                    <center><?= $no; ?></center>
                </td>
                <td>NIK : <?= $row['nik'] ?> <br>
                    Nama Lengkap : <?= $row['nama_lengkap'] ?>
                </td>
                <td><?= $row['tipe'] ?></td>
                <td>
                    <?= $row['jenis'] ?>
                </td>
                <td><?= $row['transmisi'] ?></td>

                <td><?= "Rp." . number_format($x['sewa'], 2, ',', '.') ?></td>
            </tr>
            <?php endforeach; ?>
            <tr>
                <th align="center" colspan="5">Total Biaya Sewa</th>
                <td><b> <?php $no = 0;
                        foreach ($pengeluaran_mobil_total as $x) : $no++ ?>

                        <?= "Rp." . number_format($x['x'], 2, ',', '.') ?></td>
                <?php endforeach; ?></b></td>
            </tr>
        </table>
    </font> -->

    <br>
    <br>




    <table class="table-responsive" style="width: 100%; page-break-after: always;" border="" cellspacing="0">
        <tr>
            <td></td>
            <td>
                <p align="left">
                    <font face="Times New Roman" font size="">
                        Palangkaraya, <?= tanggal(); ?><br>
                </p>
            </td>
        </tr>
        <tr>
            <td width="350">
                <font face="Times New Roman" font size="">Bendahara <br>Rental Mari Bersaudara<br> <br>
                    <br><br><br>
                    <p>Frakerson</p>
            </td>
            <td align="left">
                <font face="Times New Roman" font size="">Owner <br>Rental Mari Bersaudara<br> <br> <br><br><br>
                    <p>Ibnu Singgih Hengsuguswo, ST</p>
            </td>
        </tr>
    </table>

</body>

</html>