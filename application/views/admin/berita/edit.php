<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="container">
        <section class="content-header">
            <h1>
                <?= $title; ?>
                <small><?= $title2 ?></small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="<?= base_url('admin/beranda'); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="<?= base_url('admin/berita'); ?>"><?= $title; ?></a></li>
            </ol>
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <form enctype="multipart/form-data" role="form" action="<?= base_url('admin/berita/ubah'); ?>"
                    method="post" class="form-horizontal">

                    <!-- /.col (left) -->
                    <div class="col-md-12">
                        <!-- general form elements -->
                        <!-- /.box -->
                        <div class="box box-info">
                            <div class="box-header with-border">
                                <a href="<?= base_url('admin/berita/index'); ?>"
                                    class="btn bg-blue btn-social btn-flat btn-xs visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"
                                    title="Kembali"><i class="fa fa-arrow-left"></i> Kembali</a>
                            </div>
                            <div class="box-body">
                                <div class="row">
                                    <div class="col-xs-8">
                                        <label for="">Judul</label>
                                        <input value="<?= $berita['judul']; ?>" name="judul" type="text"
                                            class="form-control input-sm">
                                        <input value="<?= $berita['id_berita']; ?>" name="id_berita" type="hidden"
                                            class="form-control input-sm">
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-xs-4">
                                        <label for="">Gambar</label>
                                        <img class="img-identitas img-responsive"
                                            src="<?= base_url('assets/foto/berita/' . $berita['foto']) ?>" alt="logo"
                                            style="width: 100%">
                                        <p class="text-red text-center">*Kosongkan jika tidak ingin diubah*</p>
                                        <input name="foto" type="file" class="form-control input-sm">
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-xs-12">
                                        <button style="background-color:cornflowerblue;" type="button"
                                            class="btn btn-info btn-block btn-md"><strong>ISI ARTIKEL</strong></button>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-xs-12">
                                        <form>
                                            <textarea value="<?= $berita['isi']; ?>" class="textarea" placeholder=""
                                                style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"
                                                name="isi">
                                        <?= $berita['isi']; ?>
                                        </textarea>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- /.box-body -->
                            <div class="box-footer">
                                <button type="submit" class="btn btn-social btn-flat bg-blue btn-xs pull-left"><i
                                        class="fa fa-check"></i> Simpan</button>
                            </div>
                        </div>
                        <!-- /.box -->
                    </div>
                </form>
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>
</div>
<!-- /.content-wrapper -->