<section class="content-header">
    <h1>
        Menu Pengguna
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> </a></li>
        <li class="active">Pengguna</li>
    </ol>
</section>

<section class="content">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Data Pengguna</h3>
            <div class="pull-right">
                <?php if ($this->fungsi->user_login()->level === 'Admin') { ?>
                    <a href="<?= site_url('pengguna/add') ?>" class="btn btn-primary btn-flat btn-sm">
                        <i class="fa fa-plus"></i> Tambah Pengguna
                    </a>
                <?php } elseif ($this->fungsi->user_login()->level === 'Kepala Desa') { ?>
                    <a href="<?= site_url('pengguna/print_pengguna') ?>" target="_blank" class="btn btn-primary btn-flat btn-sm">
                        <i class="fa fa-print"></i> Unduh Pengguna
                    </a>
                <?php } ?>
            </div>
        </div>

        <div class="box-body table-responsive">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th class="text-center">#</th>
                        <th class="text-center">NIK</th>
                        <th class="text-center">Nama</th>
                        <th class="text-center">Jenis Kelamin</th>
                        <th class="text-center">Tempat, Tanggal Lahir</th>
                        <th class="text-center">Nomor HP</th>
                        <th class="text-center">Alamat</th>
                        <th class="text-center">Jabatan</th>
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
                            <td><?= $data->NIK ?></td>
                            <td><?= $data->nama_pengguna ?></td>
                            <td><?= $data->jenis_kelamin ?></td>
                            <?php $tgl = $data->tgl_lahir;
                            $d = substr($tgl, 0, 2);
                            $m = substr($tgl, 2, 2);
                            $y = substr($tgl, 4, 4);
                            $dob = $d . '-' . $m . '-' . $y;
                            ?>
                            <td><?= $data->tempat_lahir ?>, <?= $dob ?></td>
                            <td><?= $data->no_hp ?></td>
                            <td><?= $data->alamat ?></td>
                            <td><?= $data->level ?></td>
                            <?php if ($this->fungsi->user_login()->level === 'Admin') { ?>
                                <td class="text-center" width="160px">
                                    <a href="<?= site_url('pengguna/edit/' . $data->id_pengguna) ?>" class="btn btn-warning btn-flat btn-sm">
                                        <i class="fa fa-edit"></i> Ubah
                                    </a>
                                    <a href="<?= site_url('pengguna/delete/' . $data->id_pengguna) ?>" class="btn btn-danger btn-flat btn-sm">
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