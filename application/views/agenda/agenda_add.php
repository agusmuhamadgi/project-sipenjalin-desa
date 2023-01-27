<section class="content-header">
    <h1>
        Menu Agenda
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> </a></li>
        <li>Kegiatan & Agenda</li>
        <li>Agenda</li>
        <li class="active">Tambah Agenda</li>
    </ol>
</section>

<section class="content">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Form Tambah Data Agenda</h3>
            <br>
            <small class="text-danger">Mohon masukkan data dengan benar!</small>
            <div class="pull-right">
                <a href="<?= site_url('agenda') ?>" class="btn btn-primary btn-flat btn-sm">
                    <i class="fa fa-undo"></i> Kembali
                </a>
            </div>
        </div>

        <div class="box-body">
            <div class="row">
                <form action="" method="post">
                    <div class="col-md-12">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-3">
                                    <label for="kegiatan">Kegiatan</label>
                                    <select name="kegiatan" class="form-control" required>
                                        <option value="">-- Pilih --</option>
                                        <?php $keg = $this->input->post('kegiatan') ?? $row->id_kegiatan;
                                        foreach ($kegiatan->result() as $key => $data) { ?>
                                            <option value="<?= $data->id_kegiatan ?>" <?= set_value('kegiatan') === $data->id_kegiatan ? 'selected' : null ?>><?= $data->nama_kegiatan ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label for="pj">Penanggung Jawab</label>
                                    <select name="pj" class="form-control" required>
                                        <option value="">-- Pilih --</option>
                                        <?php $pgn = $this->input->post('pj') ?? $row->id_pengguna;
                                        foreach ($pengguna->result() as $key => $data) { ?>
                                            <option value="<?= $data->id_pengguna ?>" <?= set_value('pj') === $data->id_pengguna ? 'selected' : null ?>><?= $data->nama_pengguna ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="tujuan">Tujuan</label>
                                    <input type="text" name="tujuan" value="<?= set_value('tujuan') ?>" class="form-control" placeholder="Contoh: Penyuluhan nasional" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-3">
                                    <label for="tgl">Tanggal</label>
                                    <input type="date" name="tgl" value="<?= set_value('tgl') ?>" class="form-control" required>
                                </div>
                                <div class="col-md-3">
                                    <label for="mulai">Jam Mulai</label>
                                    <input type="text" name="mulai" value="<?= set_value('mulai') ?>" placeholder="Cth: 10:00" required class="form-control">
                                </div>
                                <div class="col-md-3">
                                    <label for="selesai">Jam Selesai</label>
                                    <input type="text" name="selesai" value="<?= set_value('selesai') ?>" placeholder="Cth: 10:00" required class="form-control">
                                </div>
                                <div class="col-md-3">
                                    <label for="lokasi">Lokasi</label>
                                    <input type="text" name="lokasi" value="<?= set_value('lokasi') ?>" placeholder="Gedung Desa" required class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="hadirin">Hadirin</label>
                                    <input type="text" name="hadirin" value="<?= set_value('hadirin') ?>" placeholder="Perangkat Desa" required class="form-control">
                                </div>
                                <div class="col-md-2">
                                    <label for="status">Status</label>
                                    <select name="status" id="" class="form-control">
                                        <option value="">-- Pilih --</option>
                                        <option value="Sudah" <?= set_value('status') === 'Sudah' ? 'selected' : null ?>>Selesai</option>
                                        <option value="Belum" <?= set_value('status') === 'Belum' ? 'selected' : null ?>>Belum</option>
                                    </select>
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