<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title ?></title>
    <style type="text/css">
        body {
            font-family: Arial, Helvetica, sans-serif;
            color: black;
        }
    </style>
</head>

<body>
    <center>
        <h1>Kelompok 5</h1>
        <h2>Slip Gaji Pegawai</h2>
        <hr style="width: 50%; border-width:10px; color:black;">
    </center>

    <?php
    if ((isset($_GET['bulan']) && $_GET['bulan'] != '') && (isset($_GET['tahun']) && $_GET['tahun'] != '')) {
        echo 'true';
        $bulan = $_GET['bulan'];
        $tahun = $_GET['tahun'];
        $bulan_tahun = $bulan . $tahun;
    } else {
        echo 'false';
        $bulan = date('m');
        $tahun = date('Y');
        $bulan_tahun = $bulan . $tahun;
    }
    echo $bulan;
    ?>

    <?php
    $no = 1;
    foreach ($print_slip as $ps) : ?>
        <table>
            <tr>
                <td>Nama Pegawai</td>
                <td>:</td>
                <td><?php echo $ps->nama_pegawai; ?></td>
            </tr>
            <tr>
                <td>NIK</td>
                <td>:</td>
                <td><?php echo $ps->nik; ?></td>
            </tr>
            <tr>
                <td>Jabatan</td>
                <td>:</td>
                <td><?php echo $ps->nama_jabatan; ?></td>
            </tr>
        </table>
    <?php endforeach; ?>
</body>

</html>