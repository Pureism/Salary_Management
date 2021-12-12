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
            <h2>Daftar Absensi Pegawai</h2>
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
                <th class="text-center">Hadir</th>
                <th class="text-center">Sakit</th>
                <th class="text-center">Izin</th>
                <th class="text-center">Alpha</th>
            </tr>
            <?php $no = 1;
            foreach ($absensi as $a) : ?>
                <tr>
                    <td class="text-center"><?php echo $no++ ?></td>
                    <td><?php echo $a->nik ?></td>
                    <td><?php echo $a->nama_pegawai ?></td>
                    <td class="text-center"><?php echo $a->jenis_kelamin ?></td>
                    <td class="text-center"><?php echo $a->nama_jabatan ?></td>
                    <td class="text-center"><?php echo $a->hadir ?></td>
                    <td class="text-center"><?php echo $a->sakit ?></td>
                    <td class="text-center"><?php echo $a->izin ?></td>
                    <td class="text-center"><?php echo $a->alpha ?></td>
                </tr>
            <?php endforeach; ?>
        </table>

        <table width="100%">
            <tr class="text-center">
                <td></td>
                <td width="200px">
                    <br><br>
                    <p>Jakarta, <?php echo date('j F Y') ?><br>Kepala Divisi Kepegawaian</p>
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