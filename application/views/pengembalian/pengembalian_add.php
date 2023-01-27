<section class="content-header">
    <h1>
        Menu Transaksi Pengembalian
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> </a></li>
        <li>Transaksi</li>
        <li>Pengembalian</li>
        <li class="active">Tambah Pengembalian</li>
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
                                    <label for="">Peminjaman</label>
                                    <input type="hidden" id="tglKembali" value="<?= $pinjam->tgl_rencana_kembali ?>" class="form-control">

                                    <select name="pinjam" id="selectedPeminjaman" class="form-control">
                                        <option value="<?= $pinjam->id_peminjaman ?>">
                                            <?= $pinjam->id_peminjaman ?> - <?= $pinjam->nama_pengguna ?> - <?= $pinjam->nama_sarpras ?>
                                        </option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label for="kondisi">Kondisi</label>
                                    <select class="form-control" name="kondisi" id="" onchange="checkDenda()">
                                        <option value="">-- Pilih --</option>
                                        <option value="Baik">Baik</option>
                                        <option value="Rusak">Rusak</option>
                                    </select>
                                </div>
                                <script>
                                    function checkDenda() {
                                        var today = new Date()
                                        var tglKembali = new Date(document.getElementById('tglKembali').value)
                                        var total = 0

                                        var selisih = today.getTime() - tglKembali.getTime()
                                        var diff = selisih / (1000 * 3600 * 24)
                                        console.log(1, diff)
                                        if (diff <= 0) {
                                            total = 0
                                        } else {
                                            total = Math.ceil(diff) * 50000
                                        }
                                        document.getElementById('denda').value = total

                                    }
                                </script>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="denda">Denda</label>
                                    <input type="text" name="denda" class="form-control" id="denda" readonly>
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