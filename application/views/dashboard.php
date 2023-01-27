<section class="content-header">
  <h1>
    Overview
  </h1>
  <ol class="breadcrumb">
    <li><i class="fa fa-dashboard"></i></li>
    <li class="active">Overview</li>
  </ol>
</section>

<section class="content">
  <?php if ($this->fungsi->user_login()->level !== 'Warga') { ?>
    <div class="row">
      <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
          <span class="info-box-icon bg-aqua">
            <i class="fa fa-th"></i>
          </span>
          <div class="info-box-content">
            <span class="info-box-text">Pengguna</span>
            <span class="info-box-number"><?= $this->fungsi->count_pengguna() ?></span>
            <a href="<?= site_url("pengguna") ?>"> Lihat <i class="fa fa-angle-right"></i> </a>
          </div>
        </div>
      </div>
      <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
          <span class="info-box-icon bg-aqua">
            <i class="fa fa-th"></i>
          </span>
          <div class="info-box-content">
            <span class="info-box-text">Sarana & Prasarana</span>
            <span class="info-box-number"><?= $this->fungsi->count_sarpras() ?></span>
            <a href="<?= site_url("sarpras") ?>">Lihat <i class="fa fa-angle-right"></i></a>
          </div>
        </div>
      </div>
      <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
          <span class="info-box-icon bg-aqua">
            <i class="fa fa-th"></i>
          </span>
          <div class="info-box-content">
            <span class="info-box-text">Peminjaman</span>
            <span class="info-box-number"><?= $this->fungsi->count_peminjaman() ?></span>
            <a href="<?= site_url("peminjaman") ?>">Lihat <i class="fa fa-angle-right"></i></a>
          </div>
        </div>
      </div>
      <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
          <span class="info-box-icon bg-aqua">
            <i class="fa fa-th"></i>
          </span>
          <div class="info-box-content">
            <span class="info-box-text">Pengembalian</span>
            <span class="info-box-number"><?= $this->fungsi->count_pengembalian() ?></span>
            <a href="<?= site_url("pengembalian") ?>">Lihat <i class="fa fa-angle-right"></i></a>
          </div>
        </div>
      </div>
    </div>
  <?php } ?>
  <div class="row" style="margin: 0 8px">
    <div class="alert alert-warning alert-dismissible">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      <h4><i class="icon fa fa-warning"></i> Perhatian!</h4>
      Batas peminjaman Sarana dan Prasarana Desa Ranggo adalah 3 Hari. <br>
      Pengembalian lebih dari 3 hari dikenai denda <b>Rp 50.000,00 / Hari</b>
    </div>
  </div>
  <div class="box">
    <div class="box-header">
      <h3 class="box-title">Agenda Desa Ranggo</h3>
      <div class="pull-right">
        <?php if ($this->fungsi->user_login()->level !== 'Warga') { ?>
          <a href="<?= site_url('agenda') ?>" class="btn btn-success btn-flat btn-sm">
            Lihat Detail
          </a>
        <?php } ?>

      </div>
    </div>

    <div class="box-body table-responsive">
      <table class="table table-bordered table-striped">
        <thead>
          <tr>
            <th class="text-center">#</th>
            <th class="text-center">Tujuan</th>
            <th class="text-center">Waktu</th>
            <th class="text-center">Lokasi</th>
            <th class="text-center">Hadirin</th>
          </tr>
        </thead>
        <tbody>
          <?php $i = 1;
          foreach ($agenda->result() as $key => $data) {
          ?>
            <tr>
              <td><?= $i++ ?></td>
              <td><?= $data->tujuan ?></td>
              <td><?= $data->tgl_pelaksanaan ?>, <?= $data->waktu_mulai ?> - <?= $data->waktu_selesai ?></td>
              <td><?= $data->lokasi ?></td>
              <td><?= $data->hadirin ?></td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>

  <?php if ($this->fungsi->user_login()->level === 'Warga') { ?>
    <div class="box">
      <div class="box-header">
        <h3 class="box-title">Riwayat Peminjaman</h3>
        <div class="pull-right">
          <a href="<?= site_url('peminjaman/add') ?>" class="btn btn-success btn-flat btn-sm">
            <i class="fa fa-plus"></i> Pinjam
          </a>
        </div>
      </div>

      <div class="box-body">
        <div class="box-body table-responsive">
          <table class="table table-bordered table-striped">
            <thead>
              <tr>
                <th class="text-center">#</th>
                <th class="text-center">SarPras</th>
                <th class="text-center">Waktu Pinjam</th>
                <th class="text-center">Jumlah</th>
                <th class="text-center">Kegunaan</th>
                <th class="text-center">Status</th>
                <th class="text-center">Keterangan</th>
                <th class="text-center">Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php $i = 1;
              foreach ($pinjam->result() as $key => $data) {
              ?>
                <tr>
                  <td><?= $i++ ?></td>
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
                              <h4 class="modal-title" id="keteranganPinjamLabel">Keterangan</h4>
                            </div>
                            <div class="modal-body">
                              <p class="text-left"><?= $data->keterangan ?></p>
                            </div>
                            <div class="modal-footer">
                              <a href="" class="btn btn-default" data-dismiss="modal">Tutup</a>
                            </div>
                          </div>
                        </div>
                      </div>
                    <?php }  ?>
                  </td>
                  <td class="text-center" width="160px">
                    <?php if ($data->status_peminjaman == 2) { ?>

                      <a href="<?= site_url('peminjaman/cancel/' . $data->id_peminjaman) ?>" class="btn btn-danger btn-flat btn-sm">
                        <i class="fa fa-remove"></i> Batalkan
                      </a>
                    <?php } else { ?>
                      <a href="#" class="btn btn-danger btn-flat btn-sm disabled">
                        <i class="fa fa-remove"></i> Batalkan
                      </a>
                    <?php } ?>
                  </td>
                </tr>

              <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>

    <div class="box">
      <div class="box-header">
        <h3 class="box-title">Riwayat Pengembalian</h3>
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
                <td><?= $data->id_peminjaman ?> - <?= $data->nama_sarpras ?></td>
                <td><?= $data->tgl_kembali ?></td>
                <td><?= $data->kondisi ?></td>
                <td><?= $data->pencatat ?></td>
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
  <?php } ?>
</section>