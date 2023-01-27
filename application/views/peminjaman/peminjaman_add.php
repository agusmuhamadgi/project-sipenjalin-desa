<section class="content-header">
    <h1>
        Menu Transaksi Peminjaman
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> </a></li>
        <li>Transaksi</li>
        <li>Peminjaman</li>
        <li class="active">Tambah Peminjaman</li>
    </ol>
</section>

<section class="content">

    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Form Tambah Data Peminjaman</h3>
            <br>
            <small class="text-danger">Mohon masukkan data dengan benar!</small>
            <div class="pull-right">
                <?php if ($this->fungsi->user_login()->level !== 'Warga') { ?>
                    <a href="<?= site_url('peminjaman') ?>" class="btn btn-primary btn-flat btn-sm">
                        <i class="fa fa-undo"></i> Kembali
                    </a>
                <?php } else { ?>
                    <a href="<?= site_url('dashboard') ?>" class="btn btn-primary btn-flat btn-sm">
                        <i class="fa fa-undo"></i> Kembali
                    </a>
                <?php } ?>
            </div>
        </div>

        <div class="box-body">
            <div class="row">
                <form action="" method="post" autocomplete="off">
                    <div class="col-md-12">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="sarpras">Sarana Prasarana</label>
                                    <select name="sarpras" class="form-control" id="" required>
                                        <option value="">-- Pilih --</option>
                                        <?php foreach ($sarpras->result() as $key => $data) { ?>
                                            <option value="<?= $data->id_sarpras ?>"><?= $data->nama_sarpras ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label for="nama">Peminjam</label>
                                    <?php if ($this->fungsi->user_login()->level !== 'Warga') { ?>
                                        <select name="nama" class="form-control" id="" required>
                                            <option value="">-- Pilih --</option>
                                            <?php foreach ($pengguna->result() as $key => $data) { ?>
                                                <option value="<?= $data->id_pengguna ?>"><?= $data->nama_pengguna ?></option>
                                            <?php } ?>
                                        </select>
                                    <?php } else { ?>
                                        <input type="hidden" class="form-control" name="nama" value="<?= $this->fungsi->user_login()->id_pengguna ?>">
                                        <input type="text" class="form-control" value="<?= $this->fungsi->user_login()->nama_pengguna ?>" readonly>
                                    <?php } ?>
                                </div>
                                <div class="col-md-2">
                                    <label for="pinjam">Tanggal Pinjam</label>
                                    <input type="text" value="<?= set_value('pinjam') ?>" id="from" name="pinjam" class="form-control datepicker" required>
                                </div>

                                <div class="col-md-2">
                                    <label for="kembali">Tanggal Kembali</label>
                                    <input type="text" value="<?= set_value('kembali') ?>" id="to" name="kembali" class="form-control" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-3">
                                    <label for="tujuan">Kegunaan</label>
                                    <input type="text" name="tujuan" value="<?= set_value('tujuan') ?>" placeholder="Contoh: Rapat/Pertemuan" class="form-control" required>
                                </div>
                                <div class="col-md-3">
                                    <label for="jumlah">Jumlah</label>
                                    <input type="number" name="jumlah" value="<?= set_value('jumlah') ?>" placeholder="min: 1" class="form-control" required>
                                </div>
                                <div class="col-md-3">
                                    <button type="submit" class="btn btn-success btn-block btn-flat btn-sm">
                                        <i class="fa fa-check"></i> Simpan
                                    </button>
                                </div>
                                <div class="col-md-3">
                                    <button type="reset" class="btn btn-warning btn-block btn-flat btn-sm">
                                        <i class="fa fa-undo"></i> Reset
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>