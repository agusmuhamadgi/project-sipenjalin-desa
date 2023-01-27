<section class="content-header">
    <h1>
        Menu Transaksi Pengembalian
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> </a></li>
        <li>Transaksi</li>
        <li>Pengembalian</li>
        <li class="active">Edit Pengembalian</li>
    </ol>
</section>

<section class="content">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Form Pengembalian Data</h3>
            <br>
            <small class="text-danger">Mohon masukkan data dengan benar!</small>
            <div class="pull-right">
                <a href="<?= site_url('pengembalian') ?>" class="btn btn-primary btn-flat btn-sm">
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
                                <div class="col-md-8">
                                    <input type="hidden" name="id_pengembalian" value="<?= $row->id_pengembalian ?>">
                                    <label for="">Peminjaman</label>
                                    <input type="text" class="form-control" readonly name="pinjam" value="<?= $row->nama_pengguna ?> - <?= $row->nama_sarpras ?>" id="">
                                </div>
                                <div class="col-md-4">
                                    <label for="kondisi">Kondisi</label>
                                    <select class="form-control" name="kondisi" id="">
                                        <?php $kon = $this->input->post('kondisi') ?? $row->kondisi; ?>
                                        <option value="Baik" <?= $kon === 'Baik' ? 'selected' : null ?>>Baik</option>
                                        <option value="Rusak" <?= $kon === 'Rusak' ? 'selected' : null ?>>Rusak</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success btn-block btn-flat btn-sm">
                                <i class="fa fa-check"></i> Konfirmasi
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
</section>