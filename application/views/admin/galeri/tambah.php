<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <div class="container">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                <?= $title; ?>
            </h1>
            <ol class="breadcrumb">
                <li><a href="<?= base_url('admin/beranda'); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="<?= base_url('admin/galeri'); ?>"><?= $title; ?></a></li>
            </ol>
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <form enctype="multipart/form-data" role="form" action="<?= base_url('admin/galeri/tambah'); ?>"
                    method="post" class="form-horizontal">

                    <!-- /.col (left) -->
                    <div class="col-md-12">
                        <!-- general form elements -->
                        <!-- /.box -->
                        <div class="box box-info">
                            <div class="box-header with-border">
                                <a href="<?= base_url('admin/galeri/index'); ?>"
                                    class="btn bg-blue-gradient btn-social btn-flat btn-xs visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"
                                    title="Kembali"><i class="fa fa-arrow-left"></i> Kembali</a>
                            </div>
                            <div class="box-body">
                                <div class="row">
                                    <div class="col-xs-8">
                                        <label for="">Nama Album </label>
                                        <input name="nama_album" value="<?= set_value('nama_album'); ?>" type="text"
                                            class="form-control input-sm">
                                        <?= form_error('nama_album', '<small class="text-danger pl-1">', '</small>'); ?>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-xs-4">
                                        <label for="">Thumbnail</label>
                                        <input name="thumbnail" type="file" class="form-control input-sm">
                                        <?= form_error('thumbnail', '<small class="text-danger pl-1">', '</small>'); ?>

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