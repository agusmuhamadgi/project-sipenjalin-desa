<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Sistem Peminjawan, Penjadwalan dan Informasi Desa Ranggo</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="<?= base_url() ?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/bower_components/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/bower_components/Ionicons/css/ionicons.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/dist/css/AdminLTE.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/iCheck/square/blue.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <span>Selamat datang di, </span>
            <span><b>SIPENJALIN RANGGO</b></span>
        </div>
        <div class="login-box-body">
            <p class="login-box-msg">Silahkan melakukan login</p>

            <form action="<?= base_url('auth/process') ?>" method="post">
                <div class="form-group has-feedback">
                    <input type="text" class="form-control" name="nik" placeholder="Nomor Induk Kependudukan" autofocus required>
                </div>
                <div class="form-group has-feedback">
                    <input type="password" class="form-control" name="ttl" placeholder="Tanggal lahir (contoh: 15061999)" required>
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <button type="submit" name="login" class="btn btn-primary btn-block">Masuk</button>
                    </div>
                </div>
            </form>

            <br>
            <span>Tidak dapat masuk?</span>
            <a href="register.html" class="text-center"><b>Hubungi Admin</b></a>

        </div>
    </div>

    <script src="<?= base_url() ?>assets/bower_components/jquery/dist/jquery.min.js"></script>
    <script src="<?= base_url() ?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="<?= base_url() ?>assets/plugins/iCheck/icheck.min.js"></script>
    <script>
        $(function() {
            $('input').iCheck({
                checkboxClass: 'icheckbox_square-blue',
                radioClass: 'iradio_square-blue',
                increaseArea: '20%' /* optional */
            });
        });
    </script>
</body>

</html>