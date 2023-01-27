<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Sistem Peminjawan, Penjadwalan dan Informasi Desa Ranggo</title>
    <link rel="icon" href="<?= base_url() ?>/assets/dist/img/logo.png" type="image/x-icon">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="<?= base_url() ?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/bower_components/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/bower_components/Ionicons/css/ionicons.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/dist/css/AdminLTE.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/dist/css/skins/_all-skins.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.css">
    <style>
        .titikDua {
            width: 10%;
            text-align: center;
        }
    </style>
</head>

<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

        <header class="main-header">
            <a href="<?= base_url() ?>assets/index2.html" class="logo">
                <span class="logo-mini"><b>DR</b></span>
                <span class="logo-lg"><b>SIPENJALIN</b></span>
            </a>
            <nav class="navbar navbar-static-top">
                <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>

                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <!-- User Account: style can be found in dropdown.less -->
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <img src="<?= base_url() ?>/assets/dist/img/logo.png" class="user-image" alt="User Image">
                                <span class="hidden-xs"><?= $this->fungsi->user_login()->nama_pengguna ?></span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- User image -->
                                <li class="user-header">
                                    <img src="<?= base_url() ?>/assets/dist/img/logo.png" class="img-circle" alt="User Image">

                                    <p>
                                        <?= $this->fungsi->user_login()->nama_pengguna ?> - <?= $this->fungsi->user_login()->level ?>
                                        <small><?= $this->fungsi->user_login()->alamat ?></small>
                                    </p>
                                </li>
                                <!-- Menu Body -->
                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <div class="pull-left">
                                        <a href="#" data-toggle="modal" data-target="#modalProfile" class="btn btn-default btn-flat">Profile</a>
                                    </div>
                                    <div class="pull-right">
                                        <a href="<?= site_url('auth/logout') ?>" class="btn btn-default btn-flat">Sign out</a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>

        <aside class="main-sidebar">
            <section class="sidebar">
                <div class="user-panel">
                    <div class="pull-left image">
                        <img src="<?= base_url() ?>/assets/dist/img/logo.png" class="img-circle" alt="User Image">
                    </div>
                    <div class="pull-left info">
                        <p><?= $this->fungsi->user_login()->nama_pengguna ?></p>
                        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                    </div>
                </div>
                <ul class="sidebar-menu" data-widget="tree">
                    <li class="header">MENU UTAMA</li>
                    <li><a href="<?= base_url('dashboard') ?>"><i class="fa fa-dashboard"></i> <span>Overview</span></a></li>

                    <?php if ($this->fungsi->user_login()->level !== 'Warga') { ?>
                        <li><a href="<?= base_url('pengguna') ?>"><i class="fa fa-user"></i> <span>Pengguna</span></a></li>
                    <?php } ?>
                    <?php if ($this->fungsi->user_login()->level === 'Admin') { ?>
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-calendar"></i>
                                <span>Kegiatan & Agenda</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="<?= base_url('kegiatan') ?>"><i class="fa fa-circle-o"></i> Kegiatan</a></li>
                                <li><a href="<?= base_url('agenda') ?>"><i class="fa fa-circle-o"></i> Agenda</a></li>
                            </ul>
                        </li>
                    <?php } elseif ($this->fungsi->user_login()->level === 'Kepala Desa') { ?>
                        <li><a href="<?= base_url('agenda') ?>"><i class="fa fa-calendar"></i> <span>Agenda</span></a></li>
                    <?php } ?>
                    <?php if ($this->fungsi->user_login()->level !== 'Warga') { ?>
                        <li><a href="<?= base_url('sarpras') ?>"><i class="fa fa-user"></i> <span>Sarana & Prasarana</span></a></li>
                    <?php } ?>
                    <?php if ($this->fungsi->user_login()->level === 'Warga') { ?>
                        <li><a href="<?= base_url('peminjaman/add') ?>"><i class="fa fa-plus"></i> Pinjam</a></li>
                    <?php } else { ?>
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-laptop"></i>
                                <span>Transaksi</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="<?= base_url('peminjaman') ?>"><i class="fa fa-circle-o"></i> Peminjaman</a></li>
                                <li><a href="<?= base_url('pengembalian') ?>"><i class="fa fa-circle-o"></i> Pengembalian</a></li>
                            </ul>
                        </li>
                    <?php } ?>

                </ul>
            </section>
        </aside>

        <div class="content-wrapper">
            <?= $contents ?>
        </div>

        <footer class="main-footer">
            <div class="pull-right hidden-xs">
                <b>Version</b> 1.0.0
            </div>
            <strong>Copyright &copy; 2021 <a href="https://adminlte.io">Raras</a>.</strong> All rights
            reserved.
        </footer>

    </div>
    <!-- ./wrapper -->

    <div class="modal fade" id="modalProfile" tabindex="-1" role="dialog" aria-labelledby="modalProfileLabel">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h4 class="modal-title" id="modalProfileLabel">Profile Pengguna</h4>
                </div>
                <div class="modal-body">
                    <table>
                        <tr>
                            <th>Nomor Induk Kependudukan </th>
                            <td class="titikDua">:</td>
                            <td><?= $this->fungsi->user_login()->NIK ?></td>
                        </tr>
                        <tr>
                            <th>Nama </th>
                            <td class="titikDua">:</td>
                            <td><?= $this->fungsi->user_login()->nama_pengguna ?></td>
                        </tr>
                        <tr>
                            <th>Tempat, Tanggal Lahir </th>
                            <td class="titikDua">:</td>
                            <?php $tgl = $this->fungsi->user_login()->tgl_lahir;
                            $d = substr($tgl, 0, 2);
                            $m = substr($tgl, 2, 2);
                            $y = substr($tgl, 4, 4);
                            $dob = $d . '-' . $m . '-' . $y;
                            ?>
                            <td><?= $this->fungsi->user_login()->tempat_lahir ?>, <?= $dob ?></td>
                        </tr>
                        <tr>
                            <th>Jenis Kelamin </th>
                            <td class="titikDua">:</td>
                            <td><?= $this->fungsi->user_login()->jenis_kelamin ?></td>
                        </tr>
                        <tr>
                            <th>Nomor HP </th>
                            <td class="titikDua">:</td>
                            <td><?= $this->fungsi->user_login()->no_hp ?></td>
                        </tr>
                        <tr>
                            <th>Alamat </th>
                            <td class="titikDua">:</td>
                            <td><?= $this->fungsi->user_login()->alamat ?></td>
                        </tr>
                        <tr>
                            <th>Jabatan </th>
                            <td class="titikDua">:</td>
                            <td><?= $this->fungsi->user_login()->level ?></td>
                        </tr>
                    </table>
                </div>
                <div class="modal-footer">
                    <a data-toggle="modal" data-target="#modalEditProfile" class="btn btn-primary">Edit Data</a>
                    <a href="" class="btn btn-default" data-dismiss="modal">Tutup</a>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalEditProfile" tabindex="-1" role="dialog" aria-labelledby="modalEditProfileLabel">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h4 class="modal-title" id="modalEditProfileLabel">Edit Data Pengguna</h4>
                </div>
                <form action="<?= site_url('pengguna/edit_profile') ?>" method="post">
                    <div class="modal-body">
                        <div class="col-md-12">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4">
                                        <input type="hidden" name="id_pengguna" value="<?= $this->fungsi->user_login()->id_pengguna ?>">
                                        <label for="nik">NIK</label>
                                        <input type="text" readonly name="nik" value="<?= $this->fungsi->user_login()->NIK ?>" placeholder="contoh: 3315926608890002" class="form-control" autofocus required>
                                    </div>
                                    <div class="col-md-8">
                                        <label for="nama">Nama Pengguna</label>
                                        <input type="text" name="nama" value="<?= $this->input->post('nama') ?? $this->fungsi->user_login()->nama_pengguna ?>" placeholder="Masukan Nama Lengkap Pengguna" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="no_hp">Nomor HP</label>
                                        <input type="text" name="no_hp" value="<?= $this->input->post('no_hp') ?? $this->fungsi->user_login()->no_hp ?>" placeholder="Contoh: 089xxxxxxx" class="form-control" required>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="tempat_lahir">Tempat Lahir</label>
                                        <input type="text" name="tempat_lahir" value="<?= $this->input->post('tempat_lahir') ?? $this->fungsi->user_login()->tempat_lahir ?>" placeholder="Masukan Tempat Lahir" class="form-control" required>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="tgl_lahir">Tanggal Lahir</label>
                                        <?php $tgl = $this->fungsi->user_login()->tgl_lahir;
                                        $d = substr($tgl, 0, 2);
                                        $m = substr($tgl, 2, 2);
                                        $y = substr($tgl, 4, 4);
                                        $dob = $y . '-' . $m . '-' . $d;   ?>
                                        <input type="date" name="tgl_lahir" value="<?= $this->input->post('tgl_lahir') ?? $dob ?>" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="alamat">Alamat</label>
                                        <input type="text" value="<?= $this->input->post('alamat') ?? $this->fungsi->user_login()->alamat ?>" placeholder="Contoh: Jalan Mawar 12, RT/RW 01/01, Ranggo" name="alamat" class="form-control" required>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="jk">Jenis Kelamin</label>
                                        <select name="jk" class="form-control" required>
                                            <?php $jk = $this->input->post('jk') ?? $this->fungsi->user_login()->jenis_kelamin ?>
                                            <option value="Laki-laki" <?= $jk === 'Laki-laki' ? 'selected' : null ?>>Laki-laki</option>
                                            <option value="Perempuan" <?= $jk === 'Perempuan' ? 'selected' : null ?>>Perempuan</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="level">Jabatan</label>
                                        <input type="text" class="form-control" name="level" readonly value="<?= $this->fungsi->user_login()->level ?>" id="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Ubah</button>
                        <a href="" class="btn btn-default" data-dismiss="modal">Tutup</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- jQuery 3 -->
    <script src="<?= base_url() ?>assets/bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="<?= base_url() ?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="<?= base_url() ?>assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
    <!-- SlimScroll -->
    <script src="<?= base_url() ?>assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="<?= base_url() ?>assets/bower_components/fastclick/lib/fastclick.js"></script>
    <!-- AdminLTE App -->
    <script src="<?= base_url() ?>assets/dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="<?= base_url() ?>assets/dist/js/demo.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.full.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.sidebar-menu').tree();
            jQuery.datetimepicker.setLocale('id')
            $('#from').datetimepicker({
                timepicker: false,
                datepicker: true,
                format: 'Y-m-d',
                minDate: 0,
                lang: 'id',
                onShow: function(ct) {
                    this.setOptions({
                        maxDate: $('#to').val() ? $('#to').val() : false
                    })
                }
            })
            let fromDate = new Date($('#from').val())
            $('#to').datetimepicker({
                timepicker: false,
                datepicker: true,
                format: 'Y-m-d',
                lang: 'id',
                onShow: function(ct) {
                    this.setOptions({
                        minDate: $('#from').val() ? $('#from').val() : false
                    })
                }
            })
        })
    </script>
</body>

</html>