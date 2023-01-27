<section class="content-header">
    <h1>
        Menu Agenda
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> </a></li>
        <li>Kegiatan & Agenda</li>
        <li>Agenda</li>
        <li class="active">Tambah Notulen</li>
    </ol>
</section>

<section class="content">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Form Tambah Data Notulen</h3>
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
                            <input type="hidden" name="id_agenda" value="<?= $row->id_agenda ?>">
                            <textarea name="notulen" id="" rows="10" class="form-control" placeholder="Contoh: Rapat berjalan dengan musyawarah untuk mufakat" autofocus></textarea>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <button type="reset" class="btn btn-warning btn-block btn-flat btn-sm">
                                        <i class="fa fa-undo"></i> Reset
                                    </button>
                                </div>
                                <div class="col-md-6">
                                    <button type="submit" class="btn btn-success btn-block btn-flat btn-sm">
                                        <i class="fa fa-check"></i> Simpan
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