<style>
th {
    text-align: center;
}
</style>
<div class="content-wrapper" style="min-height: 926px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <?= $title; ?>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?= base_url('admin/beranda/index'); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="<?= base_url('admin/pesan/index'); ?>"><?= $title; ?></a></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <a href="<?= base_url('admin/pesan/tambah'); ?>"
                            class="btn btn-social btn-flat bg-green btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i
                                class="fa fa-plus-circle"></i> Tambah pesan</a>
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
                                                <th>nama</th>
                                                <th>email</th>
                                                <th>isi</th>
                                                <th>tanggal</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no = 0;
                                            foreach ($pesan_index as $x) :
                                                $no++; ?>
                                            <tr role="row" class="odd">
                                                <td style="text-align: center;"><?= $no; ?></td>
                                                <td style="text-align: center;">
                                                    <a href="<?= base_url('admin/pesan/hapus/' . $x['id_pesan']); ?>"
                                                        class="btn btn-danger btn-sm btn-flat" title="Hapus"><i
                                                            class="fa fa-trash"></i></a>
                                                    <?php if ($x['status'] == 'read') : ?>
                                                    <a title="unread"
                                                        href="<?= base_url('admin/pesan/unread/' . $x['id_pesan']); ?>"
                                                        class="btn bg-purple btn-sm btn-flat"><i
                                                            class="fa fa-unlock"></i></a>
                                                    <?php else : ?>
                                                    <a title="read"
                                                        href="<?= base_url('admin/pesan/read/' . $x['id_pesan']); ?>"
                                                        class="btn bg-purple btn-sm btn-flat"><i
                                                            class="fa fa-lock"></i></a>
                                                    <?php endif; ?>
                                                </td>
                                                <td><?= $x['nama']; ?><?= $x['status']; ?></td>
                                                <td><?= $x['email']; ?></td>
                                                <td><?= $x['pesan']; ?></td>
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