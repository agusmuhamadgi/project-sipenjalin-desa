<section class="content-header">
    <h1>
        Menu Transaksi Pengembalian
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> </a></li>
        <li>Transaksi</li>
        <li class="active">Pengembalian</li>
    </ol>
</section>

<section class="content">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Data Riwayat Pengembalian</h3>
            <div class="pull-right">
                <?php if ($this->fungsi->user_login()->level === 'Kepala Desa') { ?>
                    <a href="<?= site_url('pengembalian/print_pengembalian') ?>" target="_blank" class="btn btn-primary btn-flat btn-sm">
                        <i class="fa fa-print"></i> Unduh Pengembalian
                    </a>
                <?php } ?>
            </div>
        </div>

        <div class="box-body table-responsive">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th class="text-center">#</th>
                        <th class="text-center">Peminjaman</th>
                        <th class="text-center">Tanggal Kembali</th>
                        <th class="text-center">Keadaan</th>
                        <th class="text-center">Pencatat</th>
                        <th class="text-center">Denda</th>
                        <?php if ($this->fungsi->user_login()->level === 'Admin') { ?>
                            <th class="text-center">Aksi</th>
                        <?php } ?>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1;
                    foreach ($kembali->result() as $key => $data) {
                    ?>
                        <tr>
                            <td><?= $i++ ?></td>
                            <td><?= $data->id_peminjaman ?> - <?= $data->nama_pengguna ?> - <?= $data->nama_sarpras ?></td>
                            <td><?= $data->tgl_kembali ?></td>
                            <td><?= $data->kondisi ?></td>
                            <td><?= $data->pencatat ?></td>
                            <td><?= $data->denda ?></td>
                            <?php if ($this->fungsi->user_login()->level === 'Admin') { ?>
                                <td class="text-center">
                                    <a href="<?= site_url('pengembalian/edit/' . $data->id_pengembalian) ?>" class="btn btn-warning btn-flat btn-sm">
                                        <i class="fa fa-edit"></i> Ubah
                                    </a>
                                    <a href="<?= site_url('pengembalian/delete/' . $data->id_pengembalian) ?>" class="btn btn-danger btn-flat btn-sm">
                                        <i class="fa fa-trash"></i> Hapus
                                    </a>
                                </td>
                            <?php } ?>

                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</section>