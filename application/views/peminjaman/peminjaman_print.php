<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Print Peminjaman</title>
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
        <h4>LAPORAN SELURUH PEMINJAMAN SARANA & PRASARANA DESA RANGGO</h4>
    </div>

    <table>
        <thead>
            <tr>
                <th class="text-center">No</th>
                <th class="text-center">Peminjam</th>
                <th class="text-center">SarPras</th>
                <th class="text-center">Waktu Pinjam</th>
                <th class="text-center">Jumlah</th>
                <th class="text-center">Kegunaan</th>
                <th class="text-center">Status</th>
                <th class="text-center">Keterangan</th>
                <th class="text-center">Penanggung Jawab</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1;
            foreach ($row->result() as $key => $data) {
            ?>
                <tr>
                    <td><?= $i++ ?></td>
                    <td><?= $data->nama_pengguna ?></td>
                    <td><?= $data->nama_sarpras ?></td>
                    <td><?= $data->tgl_pinjam ?> - <?= $data->tgl_rencana_kembali ?></td>
                    <td><?= $data->jumlah_pinjam ?></td>
                    <td><?= $data->kegunaan ?></td>
                    <td>
                        <?php if ($data->status_peminjaman == 0) {  ?>
                            Ditolak
                        <?php } else if ($data->status_peminjaman == 1) {  ?>
                            Disetujui
                        <?php } else if ($data->status_peminjaman == 2) {  ?>
                            Menunggu Persetujuan
                        <?php } else if ($data->status_peminjaman == 3) {  ?>
                            Dibatalkan
                        <?php }   ?>
                    </td>
                    <td>
                        <?php if ($data->keterangan !== null) { ?>
                            <?= $data->keterangan ?>
                        <?php } else { ?>
                            -
                        <?php } ?>
                    </td>
                    <td><?= $data->penanggung_jawab ?></td>
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