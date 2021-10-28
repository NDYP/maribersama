<div class="content-wrapper" style="min-height: 926px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <?= $title; ?>

        </h1>
        <ol class="breadcrumb">
            <li><a href="<?= base_url('admin/beranda'); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="<?= base_url('admin/profil'); ?>"><?= $title; ?></a></li>

        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-6">
                <div class="box ">
                    <div class="box-header with-border">
                        <?php foreach ($index as $x) : ?>
                            <a href="<?= base_url('admin/profil/edit/' . $x['id_profil']); ?>" class="btn btn-social btn-flat bg-green-gradient btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-edit"></i> Edit Profil</a>
                            <a href="<?= base_url('admin/profil/editvisi/' . $x['id_profil']); ?>" class="btn btn-social btn-flat bg-green-gradient btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-edit"></i> Edit Visi</a>
                            <a href="<?= base_url('admin/profil/editmisi/' . $x['id_profil']); ?>" class="btn btn-social btn-flat bg-green-gradient btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-edit"></i> Edit Misi</a>
                    </div>
                    <div class="box-body">
                        <div class="box-body bg-identitas">
                            <center>
                                <img class="img-identitas img-responsive" src="<?= base_url('assets/foto/profil/' . $x['logo']) ?>" alt="logo" style="width: 50%">
                            </center>
                        </div>
                        <hr>
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover">
                                <tbody>

                                    <tr>
                                        <th style="background-color:orange;" colspan="3" class="subtitle_head"><strong>Profil</strong></th>
                                    </tr>
                                    <tr>
                                        <td width="300">Nama Rental</td>
                                        <td width="1">:</td>
                                        <td> <?= $x['nama_rental']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Alamat</td>
                                        <td>:</td>
                                        <td> <?= $x['alamat']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Email</td>
                                        <td>:</td>
                                        <td> <?= $x['email']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Telepon/WA</td>
                                        <td>:</td>
                                        <td> <?= $x['no_hp']; ?></td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- /.box -->
            </div>
            <div class="col-xs-6">
                <div class="box ">

                    <div class="box-body">
                        <div class="box-header with-border">
                            <h2 class="text-center">Sejarah</h3>
                        </div>
                        <div class="box-body">

                            <?= $x['sejarah']; ?>
                        </div>
                        <hr>
                        <div class="box-header with-border">
                            <h2 class="text-center">Visi</h3>
                        </div>
                        <div class="box-body">
                            <?= $x['visi']; ?>
                        </div>
                        <hr>
                        <div class="box-header with-border">
                            <h2 class="text-center">Misi</h3>
                        </div>
                        <div class="box-body">

                            <?= $x['misi']; ?>
                        </div>
                    <?php endforeach; ?>

                    </div>
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>