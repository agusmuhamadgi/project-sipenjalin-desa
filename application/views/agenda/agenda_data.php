<section class="content-header">
    <h1>
        Menu Agenda
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> </a></li>
        <li>Kegiatan & Agenda</li>
        <li class="active">Agenda</li>
    </ol>
</section>

<section class="content">
    <div class="box">
        <div class="box-header">
            <div class="box-title">Data Agenda</div>
            <div class="pull-right">
                <?php if ($this->fungsi->user_login()->level === 'Admin') { ?>
                    <a href="<?= site_url('agenda/add') ?>" class="btn btn-primary btn-flat btn-sm">
                        <i class="fa fa-plus"></i> Tambah Agenda
                    </a>
                <?php } elseif ($this->fungsi->user_login()->level === 'Kepala Desa') { ?>
                    <a href="<?= site_url('agenda/print_agenda') ?>" target="_blank" class="btn btn-primary btn-flat btn-sm">
                        <i class="fa fa-print"></i> Unduh Agenda
                    </a>
                <?php } ?>
            </div>
        </div>

        <div class="box-body table-responsive">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th class="text-center">#</th>
                        <th class="text-center">Agenda</th>
                        <th class="text-center">Tujuan</th>
                        <th class="text-center">Waktu</th>
                        <th class="text-center">Lokasi</th>
                        <th class="text-center">Hadirin</th>
                        <th class="text-center">Penanggung Jawab</th>
                        <th class="text-center">Status</th>
                        <th class="text-center">Notulen</th>
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
                            <td><?= $data->nama_kegiatan ?></td>
                            <td><?= $data->tujuan ?></td>
                            <td><?= $data->tgl_pelaksanaan ?>, <?= $data->waktu_mulai ?> - <?= $data->waktu_selesai ?></td>
                            <td><?= $data->lokasi ?></td>
                            <td><?= $data->hadirin ?></td>
                            <td><?= $data->nama_pengguna ?></td>
                            <td class="text-center">
                                <span class="badge <?= $data->status === 'Belum' ? 'progress-bar-secondary' : 'progress-bar-success' ?> ">
                                    <?= $data->status ?>
                                </span>
                            </td>

                            <?php if ($data->status == 'Belum') { ?>
                                <td class="text-center">
                                    -
                                </td>
                            <?php } else if ($data->status == 'Selesai' && $data->notulen == null) { ?>
                                <td class="text-center">
                                    <a href="<?= site_url('agenda/edit_notulen/' . $data->id_agenda) ?>" class="btn btn-sm btn-flat btn-default">
                                        Isi Notulen
                                    </a>
                                </td>
                            <?php } else if ($data->status == 'Selesai' && $data->notulen !== null) { ?>
                                <td class="text-center">
                                    <button type="button" class="btn btn-primary btn-sm btn-flat" data-toggle="modal" data-target="#lihatNotulen<?= $data->id_agenda ?>">
                                        Lihat
                                    </button>
                                </td>

                                <!-- Modal -->
                                <div class="modal fade" id="lihatNotulen<?= $data->id_agenda ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="exampleModalLabel">Notulen <?= $data->tujuan ?> (<?= $data->tgl_pelaksanaan ?>, <?= $data->waktu_mulai ?> - <?= $data->waktu_selesai ?>)</h4>
                                            </div>
                                            <form action="<?= site_url('agenda/edit_notulen') ?>" method="post">
                                                <div class="modal-body">
                                                    <input type="hidden" name="id_agenda" value="<?= $data->id_agenda ?>">
                                                    <div class="form-group">
                                                        <textarea name="notulen" id="" class="form-control" rows="10"><?= $data->notulen ?></textarea>
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
                            <?php } ?>

                            <?php if ($this->fungsi->user_login()->level === 'Admin') { ?>
                                <td>
                                    <a href="<?= site_url('agenda/edit/' . $data->id_agenda) ?>" class="btn btn-warning btn-flat btn-sm">
                                        <i class="fa fa-edit"></i> Ubah
                                    </a>
                                    <a href="<?= site_url('agenda/delete/' . $data->id_agenda) ?>" class="btn btn-danger btn-flat btn-sm">
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