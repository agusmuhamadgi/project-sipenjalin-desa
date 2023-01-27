<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Print Pengguna</title>
    <style>
        .text-center {
            text-align: center;
        }

        .text-right {
            text-align: right;
        }

        .bold-divider {
            border: 2px solid #111;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        td,
        th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            color: black;
        }
    </style>
</head>

<body>
    <div class="text-center">
        <h3>PEMERINTAH KABUPATEN DOMPU <br> KECAMATAN PAJO <br> DESA RANGGO</h3>
        <hr class="bold-divider">
        <h4>LAPORAN SELURUH PENGGUNA SIPENJALIN DESA RANGGO</h4>
    </div>

    <table>
        <thead>
            <tr>
                <th class="text-center">No</th>
                <th class="text-center">NIK</th>
                <th class="text-center">Nama</th>
                <th class="text-center">Jenis Kelamin</th>
                <th class="text-center">Tempat, Tanggal Lahir</th>
                <th class="text-center">Nomor HP</th>
                <th class="text-center">Alamat</th>
                <th class="text-center">Jabatan</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1;
            foreach ($row->result() as $key => $data) {
            ?>
                <tr>
                    <td><?= $i++ ?></td>
                    <td><?= $data->NIK ?></td>
                    <td><?= $data->nama_pengguna ?></td>
                    <td><?= $data->jenis_kelamin ?></td>
                    <?php $tgl = $data->tgl_lahir;
                    $d = substr($tgl, 0, 2);
                    $m = substr($tgl, 2, 2);
                    $y = substr($tgl, 4, 4);
                    $dob = $d . '-' . $m . '-' . $y;
                    ?>
                    <td><?= $data->tempat_lahir ?>, <?= $dob ?></td>
                    <td><?= $data->no_hp ?></td>
                    <td><?= $data->alamat ?></td>
                    <td><?= $data->level ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

    <div class="text-right" style="margin-top: 30px;">
        <?php
        $d = date("d");
        $y = date("Y");
        $m = date("m");
        if ($m == 1) {
            $m = "Januari";
        } else if ($m == 2) {
            $m = "Februari";
        } else if ($m == 3) {
            $m =  "Maret";
        } else if ($m == 4) {
            $m = "April";
        } else if ($m == 5) {
            $m = "Mei";
        } else if ($m == 6) {
            $m = "Juni";
        } else if ($m == 7) {
            $m = "Juli";
        } else if ($m == 8) {
            $m = "Agustus";
        } else if ($m == 9) {
            $m =  "September";
        } else if ($m == 10) {
            $m = "Oktober";
        } else if ($m == 11) {
            $m = "November";
        } else if ($m == 12) {
            $m = "Desember";
        } else {
            $m = "-";
        }

        ?>
        Ranggo, <?= $d . ' ' . $m . ' ' . $y ?> <br>

    </div>
    <div class="text-right" style="margin-top: 50px;">
        Kepala Desa <br>
        <?= $this->fungsi->user_login()->nama_pengguna; ?>
    </div>
</body>

</html>