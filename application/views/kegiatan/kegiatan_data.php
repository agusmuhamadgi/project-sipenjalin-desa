<section class="content-header">
    <h1>
        Menu Kegiatan
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> </a></li>
        <li>Kegiatan & Agenda</li>
        <li class="active">Kegiatan</li>
    </ol>
</section>

<section class="content">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Data Kegiatan</h3>
            <div class="pull-right">
                <a href="<?= site_url('kegiatan/add') ?>" class="btn btn-primary btn-flat btn-sm">
                    <i class="fa fa-plus"></i> Tambah Kegiatan
                </a>
            </div>
        </div>

        <div class="box-body table-responsive">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th class="text-center">#</th>
                        <th class="text-center">Nama Kegiatan</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1;
                    foreach ($row->result() as $key => $data) {
                    ?>
                        <tr>
                            <td><?= $i++ ?></td>
                            <td><?= $data->nama_kegiatan ?></td>
                            <td class="text-center">
                                <a href="<?= site_url('kegiatan/edit/' . $data->id_kegiatan) ?>" class="btn btn-warning btn-flat btn-sm">
                                    <i class="fa fa-edit"></i> Ubah
                                </a>
                                <a href="<?= site_url('kegiatan/delete/' . $data->id_kegiatan) ?>" class="btn btn-danger btn-flat btn-sm">
                                    <i class="fa fa-trash"></i> Hapus
                                </a>
                            </td>
                        </tr>
                </tbody>
            <?php } ?>
            </table>
        </div>
    </div>
</section>