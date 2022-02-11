<!-- Main content -->
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
        <section class="content">
            <div class="box box-default">
                <div class="box-header with-border">
                    <a href="<?= base_url('admin/pengajuan/index') ?>" class="btn btn-xs bg-blue"><span
                            class="fa fa-arrow-left"></span>
                        Kembali</a>
                </div>
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Nama File</label>
                                    <input name="judul" value="<?= set_value('judul'); ?>" type="text"
                                        class="form-control" id="exampleInputEmail1" placeholder="isi ...">
                                    <input name="id_pemilik" value="<?= $index2['id_mobil']; ?>" type="hidden"
                                        class="form-control" id="exampleInputEmail1" placeholder="isi ...">
                                    <?= form_error('judul', '<small class="text-danger pl-1">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">File PDF</label>
                                    <input name="berkas" type="file" class="form-control" id="exampleInputEmail1"
                                        placeholder="isi ...">
                                    <?= form_error('berkas', '<small class="text-danger pl-1">', '</small>'); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="box-footer">
                        <button class="btn btn-xs bg-blue"><span class="fa fa-save"></span> Simpan</button>
                    </div>
                    <!-- /.box-body -->
                </form>
            </div>
            <!-- /.box -->
        </section>
    </div>
</div>
<!-- /.content -->