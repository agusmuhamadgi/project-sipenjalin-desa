<section class="content-header">
    <h1>
        Menu Transaksi Peminjaman
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> </a></li>
        <li>Transaksi</li>
        <li class="active">Peminjaman</li>
    </ol>
</section>

<section class="content">
    <?php if ($this->fungsi->user_login()->level === 'Admin') { ?>
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Data Sarpras</h3>
                <div class="pull-right">
                    <a href="<?= site_url('sarpras') ?>" class="btn btn-primary btn-flat btn-sm">
                        Lihat Detail
                    </a>
                </div>
            </div>
            <div class="box-body table-responsive">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th class="text-center">Nama Sarana Prasarana</th>
                            <th class="text-center">Jumlah Tersedia</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1;
                        foreach ($sarpras->result() as $key => $data) {
                        ?>
                            <tr>
                                <td><?= $i++ ?></td>
                                <td><?= $data->nama_sarpras ?></td>
                                <td><?= $data->stok_tersedia ?> pcs</td>
                            </tr>
                        <?php  } ?>
                    </tbody>
                </table>
            </div>
        </div>
    <?php } ?>

    <?php if ($this->fungsi->user_login()->level !== 'Warga') { ?>
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Data Peminjaman</h3>
                <div class="pull-right">
                    <?php if ($this->fungsi->user_login()->level === 'Admin') { ?>
                        <a href="<?= site_url('peminjaman/add') ?>" class="btn btn-primary btn-flat btn-sm">
                            <i class="fa fa-plus"></i> Tambah Peminjaman
                        </a>
                    <?php } elseif ($this->fungsi->user_login()->level === 'Kepala Desa') { ?>
                        <a href="<?= site_url('peminjaman/print_peminjaman') ?>" target="_blank" class="btn btn-primary btn-flat btn-sm">
                            <i class="fa fa-print"></i> Unduh Peminjaman
                        </a>
                    <?php } ?>
                </div>
            </div>


            <div class="box-body table-responsive">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th class="text-center">Peminjam</th>
                            <th class="text-center">SarPras</th>
                            <th class="text-center">Waktu Pinjam</th>
                            <th class="text-center">Jumlah</th>
                            <th class="text-center">Kegunaan</th>
                            <th class="text-center">Status</th>
                            <th class="text-center">Keterangan</th>
                            <th class="text-center">Penanggung Jawab</th>
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
                                <td><?= $data->nama_pengguna ?></td>
                                <td><?= $data->nama_sarpras ?></td>
                                <td><?= $data->tgl_pinjam ?> - <?= $data->tgl_rencana_kembali ?></td>
                                <td><?= $data->jumlah_pinjam ?></td>
                                <td><?= $data->kegunaan ?></td>
                                <td class="text-center">
                                    <?php if ($data->status_peminjaman == 0) { ?>
                                        <span class="badge progress-bar-danger">
                                            Ditolak
                                        </span>
                                    <?php } elseif ($data->status_peminjaman == 1) { ?>
                                        <span class="badge progress-bar-success">
                                            Disetujui
                                        </span>
                                    <?php } elseif ($data->status_peminjaman == 2) { ?>
                                        <span class="badge progress-bar-warning">
                                            Menunggu
                                        </span>
                                    <?php } elseif ($data->status_peminjaman == 3) { ?>
                                        <span class="badge progress-bar-secondary">
                                            Dibatalkan
                                        </span>
                                    <?php } ?>

                                    </span>
                                </td>
                                <td class="text-center">
                                    <?php if ($data->status_peminjaman == 2 || $data->status_peminjaman == 1) { ?>
                                        -
                                    <?php } elseif ($data->status_peminjaman == 0 || $data->status_peminjaman == 3) { ?>
                                        <button data-toggle="modal" data-target="#keteranganPinjam<?= $data->id_peminjaman ?>" class="btn btn-primary btn-flat btn-sm">
                                            <i class="fa fa-sticky-note"></i>
                                        </button>
                                        <div class="modal fade" id="keteranganPinjam<?= $data->id_peminjaman ?>" tabindex="-1" role="dialog" aria-labelledby="keteranganPinjamLabel">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                        <h4 class="modal-title" id="keteranganPinjamLabel">Keterangan</h4>
                                                    </div>
                                                    <form action="<?= site_url('peminjaman/edit_keterangan/') ?>" method="post">
                                                        <div class="modal-body">
                                                            <input type="hidden" name="id_peminjaman" value="<?= $data->id_peminjaman ?>">
                                                            <div class="form-group">
                                                                <textarea name="keteranganpinjam" id="" rows="10" class="form-control"><?= $data->keterangan ?></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <a href="" class="btn btn-default" data-dismiss="modal">Close</a>
                                                            <?php if ($this->fungsi->user_login()->level === 'Admin') { ?>
                                                                <button type="submit" class="btn btn-primary">Simpan</button>
                                                            <?php } ?>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    <?php }  ?>
                                </td>
                                <td>
                                    <?php if ($data->penanggung_jawab == null) { ?>
                                        -
                                    <?php } elseif ($data->penanggung_jawab !== null) { ?>
                                        <?= $data->penanggung_jawab ?>
                                    <?php } ?>
                                </td>
                                <?php if ($this->fungsi->user_login()->level === 'Admin') { ?>
                                    <td class="text-center" width="160px">
                                        <?php if ($data->status_peminjaman == 2) { ?>
                                            <a href="<?= site_url('peminjaman/accept/' . $data->id_peminjaman) ?>" class="btn btn-success btn-flat btn-sm">
                                                <i class="fa fa-check"></i> Setujui
                                            </a>
                                            <a href="<?= site_url('peminjaman/reject/' . $data->id_peminjaman) ?>" class="btn btn-danger btn-flat btn-sm">
                                                <i class="fa fa-exclamation"></i> Tolak
                                            </a>
                                        <?php } else if ($data->status_peminjaman == 1) { ?>
                                            <a href="<?= site_url('pengembalian/add/' . $data->id_peminjaman) ?>" class="btn btn-primary btn-flat btn-sm">
                                                <i class="fa fa-check"></i> Kembali
                                            </a>
                                        <?php } else { ?>
                                            <a href="<?= site_url('peminjaman/accept/' . $data->id_peminjaman) ?>" class="btn btn-success btn-flat btn-sm disabled">
                                                <i class="fa fa-check"></i> Setujui
                                            </a>
                                            <a href="<?= site_url('peminjaman/reject/' . $data->id_peminjaman) ?>" class="btn btn-danger btn-flat btn-sm disabled">
                                                <i class="fa fa-exclamation"></i> Tolak
                                            </a>
                                        <?php } ?>
                                    </td>
                                <?php } ?>

                            </tr>

                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    <?php } ?>

</section>