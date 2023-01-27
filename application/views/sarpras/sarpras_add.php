<section class="content-header">
    <h1>
        Menu Sarana & Prasarana
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> </a></li>
        <li>Sarana & Prasarana</li>
        <li class="active">Tambah Sarana & Prasarana</li>
    </ol>
</section>

<section class="content">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Form Tambah Data Sarana & Prasarana</h3>
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
                                <div class="col-md-6">
                                    <label for="nama">Nama Sarana & Prasarana</label>
                                    <input type="text" class="form-control" name="nama" value="<?= set_value('nama') ?>" placeholder="Contoh: Gedung/Meja Rapat" required>
                                </div>
                                <div class="col-md-4">
                                    <label for="tgl">Tanggal Kepemilikan</label>
                                    <input type="date" class="form-control" name="tgl" value="<?= set_value('tgl') ?>" required>
                                </div>
                                <div class="col-md-2">
                                    <label for="jumlah">Jumlah</label>
                                    <input type="number" class="form-control" min="1" name="jumlah" value="<?= set_value('jumlah') ?>" required>
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