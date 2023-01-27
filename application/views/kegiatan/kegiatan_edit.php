<section class="content-header">
    <h1>
        Menu Kegiatan
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> </a></li>
        <li>Kegiatan & Agenda</li>
        <li>Kegiatan</li>
        <li class="active">Edit Kegiatan</li>
    </ol>
</section>

<section class="content">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Form Edit Data Kegiatan</h3>
            <div class="pull-right">
                <a href="<?= site_url('kegiatan') ?>" class="btn btn-primary btn-flat btn-sm">
                    <i class="fa fa-undo"></i> Kembali
                </a>
            </div>
        </div>

        <div class="box-body">
            <div class="row">
                <form action="" method="post">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="nama">Nama Kegiatan</label>
                            <input type="hidden" name="id_kegiatan" value="<?= $row->id_kegiatan ?>">
                            <input type="text" name="nama" value="<?= $this->input->post('nama') ?? $row->nama_kegiatan ?>" class="form-control" placeholder="Masukan nama kegiatan" required>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success btn-flat btn-sm btn-block">
                                <i class="fa fa-check"></i> Simpan
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>