<style>
th {
    text-align: center;
}
</style>
<div class="content-wrapper" style="min-height: 926px;">
    <!-- Content Header (Page header) -->
    <div class="container">
        <section class="content-header">
            <h1>
                <?= $title; ?>
            </h1>
            <ol class="breadcrumb">
                <li><a href="<?= base_url('admin/beranda/index'); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="<?= base_url('admin/galeri/index'); ?>"><?= $title; ?></a></li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header">
                            <a href="<?= base_url('admin/galeri/tambah'); ?>"
                                class="btn bg-green-gradient btn-social btn-flat btn-xs visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i
                                    class="fa fa-plus-circle"></i> Tambah Album</a>
                            <a href="<?= base_url('admin/galeri/tambahgaleri'); ?>"
                                class="btn bg-green-gradient btn-social btn-flat btn-xs visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i
                                    class="fa fa-plus-circle"></i> Tambah Galeri</a>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <table id="example2" class="table table-bordered table-striped dataTable"
                                            role="grid" aria-describedby="example1_info">
                                            <thead>
                                                <tr role="row">
                                                    <th>No.</th>
                                                    <th>Opsi</th>
                                                    <th>Thumbnail</th>
                                                    <th>Nama Album</th>
                                                    <th>Publish</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $no = 0;
                                                foreach ($album as $x) :
                                                    $no++; ?>
                                                <tr role="row" class="odd">
                                                    <td style="text-align: center;"><?= $no; ?></td>
                                                    <td style="text-align: center;">
                                                        <a title="Edit"
                                                            href="<?= base_url('admin/galeri/detail/' . $x['id_album']); ?>"
                                                            class="btn btn-warning btn-flat btn-sm"><i
                                                                class="fa fa-list"></i></a>
                                                        <a title="Hapus"
                                                            href="<?= base_url('admin/galeri/hapus/' . $x['id_album']); ?>"
                                                            class="btn btn-danger btn-flat btn-sm"><i
                                                                class="fa fa-trash-o"></i></a>
                                                        <?php if ($x['status'] == 'Aktif') : ?>
                                                        <a title="Nonaktifkan"
                                                            href="<?= base_url('admin/galeri/nonaktif/' . $x['id_album']); ?>"
                                                            class="btn bg-purple btn-flat btn-sm"><i
                                                                class="fa fa-lock"></i>
                                                        </a>
                                                        <?php else : ?>
                                                        <a title="Aktifkan"
                                                            href="<?= base_url('admin/galeri/aktif/' . $x['id_album']); ?>"
                                                            class="btn bg-purple btn-flat btn-sm"><i
                                                                class="fa fa-unlock"></i></a>
                                                        <?php endif; ?>
                                                    </td>
                                                    <td style="text-align: center;">
                                                        <img src="<?= base_url('assets/foto/album/' . $x['thumbnail']); ?>"
                                                            alt="" style="width: auto; max-width: 100px; height: auto;">
                                                    </td>
                                                    <td><?= $x['nama_album']; ?></td>
                                                    <td style="text-align: center;"><?= $x['tanggal']; ?></td>
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