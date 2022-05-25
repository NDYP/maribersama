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
            Laporan Pengeluaran Gaji Karyawan <?= date('M Y', strtotime($bulan1)); ?> sampai
            <?= date('M Y', strtotime($bulan2)); ?> <br>
    </p>

    <font font-size=10px face="Times New Roman"><b>Pengeluaran gaji karyawan</b>
        <table style="font-size: 14px;" class="table-responsive"
            style="width: 100%; page-break-after: always; padding:50px;margin:10px" border="1" cellspacing="0">
            <tr>
                <th>No.</th>
                <th style="width: 100%; padding-left:50px;padding-right:50px;">NIK
                </th>
                <th style="width: 100%; padding-left:50px;padding-right:50px;">Nama</th>
                <th style=" width: 100%; padding-left:50px;padding-right:50px;">
                    Kontak
                </th>
                <th style="width: 100%; padding-left:50px;padding-right:50px;">
                    Jabatan</th>

                <th style="width: 100%; padding-left:30px;padding-right:30px;">
                    Gaji/Bulan</th>
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
                <td><?= "Rp." . number_format($x['gaji'], 2, ',', '.') ?>
                </td>
            </tr>
            <?php endforeach; ?>
            <tr>
                <th align="center" colspan="5">Total</th>
                <td> <b>
                        <?php $no = 0;
                        foreach ($pengeluaran_karyawan_total as $x) : $no++ ?>
                        <?= "Rp." . number_format($x['x'], 2, ',', '.') ?>
                    </b></td>
                <?php endforeach; ?>

            </tr>
        </table>
    </font>


    <br>
    <br>




    <table class="table-responsive" style="width: 100%; page-break-after: none;" border="" cellspacing="0">
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
                    <p>Meltha</p>
            </td>
            <td align="left">
                <font face="Times New Roman" font size="">Owner <br>Rental Mari Bersaudara<br> <br> <br><br><br>
                    <p>Meltha</p>
            </td>
        </tr>
    </table>

</body>

</html>