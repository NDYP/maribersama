<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
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
            <form enctype="multipart/form-data" role="form" action="<?= base_url('admin/profil/ubah'); ?>" method="post" class="form-horizontal">
                <div class="col-md-4">
                    <div class="box ">
                        <div class="box-body box-profile">
                            <div class="col-sm-12">
                                <img class="profile-user-img img-responsive" src="<?= base_url('assets/foto/profil/' . $profil['logo']) ?>" alt="Logo" style="width: 100%">
                            </div>

                            <br>
                            <p class="text-red text-center">*Kosongkan jika tidak ingin diubah*</p>
                            <div class="col-sm-12">
                                <input class="form-control input-sm" type="file" class="" id="file" name="logo">
                            </div>

                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>
                <!-- /.col (left) -->
                <div class="col-md-8">
                    <div class="box ">
                        <div class="box-header with-border">
                            <a href="<?= base_url('admin/profil/index'); ?>" class="btn bg-green-gradient btn-social btn-flat btn-warning btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class="fa fa-arrow-left"></i> kembali</a>
                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->
                        <div class="box-body">
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label-left">Nama Rental</label>
                                <div class="col-sm-7">
                                    <input name="nama_rental" value="<?= $profil['nama_rental']; ?>" type="text" class="form-control input-sm" id="" placeholder="">
                                    <input name="id_profil" value="<?= $profil['id_profil']; ?>" type="hidden" class="form-control input-sm" id="" placeholder="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputPassword3" class="col-sm-3 control-label-left">Alamat</label>
                                <div class="col-sm-7">
                                    <input name="alamat" value="<?= $profil['alamat']; ?>" type="text" class="form-control input-sm" id="" placeholder="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label-left">Email</label>
                                <div class="col-sm-3">
                                    <input name="email" value="<?= $profil['email']; ?>" type="text" class="form-control input-sm" id="" placeholder="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label-left">Telepon/Wa</label>
                                <div class="col-sm-3">
                                    <input name="no_hp" value="<?= $profil['no_hp']; ?>" type="text" class="form-control input-sm" id="" placeholder="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label-left">Lokasi</label>
                                <div class="col-sm-9">
                                    <input name="lokasi" value="<?= $profil['lokasi']; ?>" type="text" class="form-control input-sm" id="" placeholder="">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label-left">Sejarah</label>
                                <div class="col-sm-9">
                                    <div class="box-body pad">
                                        <form>
                                            <textarea class="textarea" placeholder="" style="width: 100%; height: 200px; font-size: 12px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" value="<?= $profil['sejarah']; ?>" name="sejarah">
                                        <?= $profil['sejarah']; ?>
                                        </textarea>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                            <button type="submit" class="btn btn-social btn-flat btn-info btn-sm pull-left"><i class="fa fa-check"></i> Simpan</button>

                        </div>
                        <!-- /.box-footer -->
                    </div>
            </form>

        </div>

</div>
<!-- /.col (right) -->

</div>
<!-- /.row -->
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->