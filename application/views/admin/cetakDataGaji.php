<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title ?></title>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            color: black;
        }
    </style>
</head>

<body>
    <div class="mx-5 my-3">

        <center>
            <h1>Kelompok 5</h1>
            <h2>Daftar Gaji Pegawai</h2>
        </center>

        <?php
        if ((isset($_GET['bulan']) && $_GET['bulan'] != '') && (isset($_GET['tahun']) && $_GET['tahun'] != '')) {
            $bulan = $_GET['bulan'];
            $tahun = $_GET['tahun'];
            $bulan_tahun = $bulan . $tahun;
        } else {
            $bulan = date('m');
            $tahun = date('Y');
            $bulan_tahun = $bulan . $tahun;
        }
        ?>

        <table class="mt-5 mb-4">
            <tr>
                <td>Bulan</td>
                <td> : </td>
                <td><?php echo $bulan ?></td>
            </tr>
            <tr>
                <td>Tahun</td>
                <td> : </td>
                <td><?php echo $tahun ?></td>
            </tr>
        </table>

        <table class="table table-bordered table-striped">
            <tr>
                <th class="text-center">No</th>
                <th class="text-center">NIK</th>
                <th class="text-center">Nama Pegawai</th>
                <th class="text-center">Jenis Kelamin</th>
                <th class="text-center">Jabatan</th>
                <th class="text-center">Gaji Pokok</th>
                <th class="text-center">Tj. Transport</th>
                <th class="text-center">Uang Makan</th>
                <th class="text-center">Potongan</th>
                <th class="text-center">Total Gaji</th>
            </tr>

            <?php foreach ($potongan as $p) {
                // Perhitungan Potongan
                $pot_gaji[] = $p->jml_potongan;
            }
            $no = 1;
            foreach ($cetak_gaji as $g) :
                $alpha = $g->alpha * $pot_gaji[0];
                $potongan = 0;
                foreach ($pot_gaji as $p) {
                    $potongan += $p;
                }
                $potongan = ($alpha - $pot_gaji[0]) + $potongan; ?>

                <tr>
                    <td class="text-center"><?php echo $no++ ?></td>
                    <td><?php echo $g->nik ?></td>
                    <td><?php echo $g->nama_pegawai ?></td>
                    <td><?php echo $g->jenis_kelamin ?></td>
                    <td><?php echo $g->nama_jabatan ?></td>
                    <td><?php echo 'Rp ' . number_format($g->gaji_pokok, 0, '.', ',') ?></td>
                    <td><?php echo 'Rp ' . number_format($g->tj_transport, 0, '.', ',') ?></td>
                    <td><?php echo 'Rp ' . number_format($g->uang_makan, 0, '.', ',') ?></td>
                    <td><?php echo 'Rp ' . number_format($potongan, 0, '.', ',') ?></td>
                    <td><?php echo 'Rp ' . number_format($g->gaji_pokok + $g->tj_transport + $g->uang_makan - $potongan, 0, '.', ',') ?></td>
                </tr>
            <?php endforeach; ?>
        </table>

        <table width="100%">
            <tr class="text-center">
                <td></td>
                <td width="200px">
                    <br><br>
                    <p>Jakarta, <?php echo date('j F Y') ?><br>Kepala Divisi Keuangan</p>
                    <br><br>
                    <p>_______________________________</p>

                </td>
            </tr>
        </table>
    </div>
</body>

</html>

<script type="text/javascript">
    window.print();
</script>