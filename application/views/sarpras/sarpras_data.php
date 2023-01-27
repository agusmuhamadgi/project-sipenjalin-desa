<section class="content-header">
    <h1>
        Menu Sarana & Prasarana
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> </a></li>
        <li class="active">Sarana & Prasarana</li>
    </ol>
</section>

<section class="content">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Data Sarana & Prasarana</h3>
            <div class="pull-right">
                <?php if ($this->fungsi->user_login()->level === 'Admin') { ?>
                    <a href="<?= site_url('sarpras/add') ?>" class="btn btn-primary btn-flat btn-sm">
                        <i class="fa fa-plus"></i> Tambah SarPras
                    </a>
                <?php } ?>

            </div>
        </div>

        <div class="box-body table-reponsive">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th class="text-center">#</th>
                        <th class="text-center">Nama Sarana Prasarana</th>
                        <th class="text-center">Tanggal Kepemilikan</th>
                        <th class="text-center">Jumlah Awal Dimiliki</th>
                        <th class="text-center">Tersedia</th>
                        <?php if ($this->fungsi->user_login()->level === 'Admin') { ?>
                            <th class="text-center">Aksi</th>
                        <?php } ?>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1;
                    foreach ($row->result() as $key => $data) {
                    ?>
                        <tr>
                            <td><?= $i++ ?></td>
                            <td><?= $data->nama_sarpras ?></td>
                            <?php $tgl = $data->tgl_kepemilikan;
                            $trim = str_replace('-', '', $tgl);
                            $d = substr($trim, 6, 2);
                            $m = substr($trim, 4, 2);
                            $y = substr($trim, 0, 4);
                            $formatedTgl = $d . '-' . $m . '-' . $y;
                            ?>
                            <td><?= $formatedTgl ?></td>
                            <td><?= $data->jumlah ?> pcs</td>
                            <td><?= $data->stok_tersedia ?> pcs</td>
                            <?php if ($this->fungsi->user_login()->level === 'Admin') { ?>
                                <td class="text-center" width="160px">
                                    <a href="<?= site_url('sarpras/edit/' . $data->id_sarpras) ?>" class="btn btn-warning btn-flat btn-sm">
                                        <i class="fa fa-edit"></i> Ubah
                                    </a>
                                    <a href="<?= site_url('sarpras/delete/' . $data->id_sarpras) ?>" class="btn btn-danger btn-flat btn-sm">
                                        <i class="fa fa-trash"></i> Hapus
                                    </a>
                                </td>
                            <?php } ?>

                        </tr>
                    <?php  } ?>
                </tbody>
            </table>
        </div>
    </div>
</section>