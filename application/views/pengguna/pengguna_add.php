<section class="content-header">
  <h1>
    Menu Pengguna
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> </a></li>
    <li>Pengguna</li>
    <li class="active">Tambah Pengguna</li>
  </ol>
</section>

<section class="content">
  <div class="box">
    <div class="box-header">
      <h3 class="box-title">Form Tambah Data Pengguna</h3>
      <br>
      <small class="text-danger">Mohon masukkan data dengan benar!</small>
      <div class="pull-right">
        <a href="<?= site_url('pengguna') ?>" class="btn btn-primary btn-flat btn-sm">
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
                  <label for="nik">Nomor Induk Kependudukan</label>
                  <input type="text" name="nik" value="<?= set_value('nik') ?>" placeholder="contoh: 3315926608890002" class="form-control" autofocus required>
                </div>
                <div class="col-md-8">
                  <label for="nama">Nama Pengguna</label>
                  <input type="text" name="nama" value="<?= set_value('nama') ?>" placeholder="Masukan Nama Lengkap Pengguna" class="form-control" required>
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="row">
                <div class="col-md-4">
                  <label for="no_hp">Nomor HP</label>
                  <input type="text" name="no_hp" value="<?= set_value('no_hp') ?>" placeholder="Contoh: 089xxxxxxx" class="form-control" required>
                </div>
                <div class="col-md-4">
                  <label for="tempat_lahir">Tempat Lahir</label>
                  <input type="text" name="tempat_lahir" value="<?= set_value('tempat_lahir') ?>" placeholder="Masukan Tempat Lahir" class="form-control" required>
                </div>
                <div class="col-md-4">
                  <label for="tgl_lahir">Tanggal Lahir</label>
                  <input type="date" name="tgl_lahir" value="<?= set_value('tgl_lahir') ?>" class="form-control" required>
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="row">
                <div class="col-md-4">
                  <label for="alamat">Alamat</label>
                  <input type="text" value="<?= set_value('alamat') ?>" placeholder="Contoh: Jalan Mawar 12, RT/RW 01/01, Ranggo" name="alamat" class="form-control" required>
                </div>
                <div class="col-md-4">
                  <label for="jk">Jenis Kelamin</label>
                  <select name="jk" class="form-control" required>
                    <option value="">-- Pilih --</option>
                    <option value="Laki-laki" <?= set_value('jk') === 'Laki-laki' ? 'selected' : null ?>>Laki-laki</option>
                    <option value="Perempuan" <?= set_value('jk') === 'Perempuan' ? 'selected' : null ?>>Perempuan</option>
                  </select>
                </div>
                <div class="col-md-4">
                  <label for="level">Level Akses</label>
                  <select name="level" class="form-control" required>
                    <option value="">-- Pilih --</option>
                    <option value="Admin" <?= set_value('level') === 'Admin' ? 'selected' : null ?>>Admin</option>
                    <option value="Warga" <?= set_value('level') === 'Warga' ? 'selected' : null ?>>Warga</option>
                  </select>
                </div>
              </div>
            </div>
            <div class="form-group pull-right">
              <button type="submit" class="btn btn-success btn-flat btn-sm">
                <i class="fa fa-check"></i> Simpan
              </button>
              <button type="reset" class="btn btn-warning btn-flat btn-sm">
                <i class="fa fa-undo"></i> Reset
              </button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>