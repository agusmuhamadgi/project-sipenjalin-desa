<section class="content-header">
    <h1>
        Menu Sarana & Prasarana
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> </a></li>
        <li>Sarana & Prasarana</li>
        <li class="active">Edit Sarana & Prasarana</li>
    </ol>
</section>

<section class="content">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Form Edit Data Sarana & Prasarana</h3>
            <br>
            <small class="text-danger">Mohon masukkan data dengan benar!</small>
            <div class="pull-right">
                <a href="<?= site_url('sarpras') ?>" class="btn btn-primary btn-flat btn-sm">
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
                                <div class="col-md-4">
                                    <input type="hidden" name="id_sarpras" value="<?= $row->id_sarpras ?>">
                                    <label for="nama">Nama Sarana & Prasarana</label>
                                    <input type="text" class="form-control" name="nama" value="<?= $this->input->post('nama') ?? $row->nama_sarpras ?>" placeholder="Contoh: Gedung/Meja Rapat" required>
                                </div>
                                <div class="col-md-4">
                                    <label for="tgl">Tanggal Kepemilikan</label>
                                    <input type="date" class="form-control" name="tgl" value="<?= $this->input->post('tgl') ?? $row->tgl_kepemilikan ?>" required>
                                </div>
                                <div class="col-md-2">
                                    <label for="jumlah">Jumlah</label>
                                    <input type="number" class="form-control" min="1" name="jumlah" value="<?= $this->input->post('jumlah') ?? $row->jumlah ?>" required>
                                </div>
                                <div class="col-md-2">
                                    <label for="stok">Stok</label>
                                    <input type="number" class="form-control" min="1" name="stok" value="<?= $this->input->post('stok') ?? $row->stok_tersedia ?>" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <button type="submit" class="btn btn-success btn-block btn-flat btn-sm">
                                        <i class="fa fa-check"></i> Simpan
                                    </button>
                                </div>
                                <div class="col-md-6">
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