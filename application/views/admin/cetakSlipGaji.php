<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <style type="text/css">
        body {
            font-family: Arial;
            color: black;
        }
    </style>
</head>

<body>
    <div class="mx-5 my-3">
        <center>
            <h1>PT. Sun Teknologi</h1>
            <h2>Slip Gaji Pegawai</h2>
            <hr style="width: 50% ; border-width:5px; color:red">
        </center>


        <?php foreach ($potongan as $p) {
            // Perhitungan Potongan
            $pot_gaji[] = $p->jml_potongan;
        }
        $no = 1;
        foreach ($print_slip as $ps) :
            $alpha = $ps->alpha * $pot_gaji[0];
            $potongan_lain = 0;
            foreach ($pot_gaji as $p) {
                $potongan_lain += $p;
            }
            $jml_potongan = ($alpha - $pot_gaji[0]) + $potongan_lain;
        ?>
            <br>
            <table style="width: 100%">
                <tr>
                    <td width="20%"> Nama Pegawai</td>
                    <td width="2%"> : </td>
                    <td> <?= $ps->nama_pegawai ?> </td>
                </tr>
                <tr>
                    <td> NIK </td>
                    <td> : </td>
                    <td> <?= $ps->nik ?> </td>
                </tr>
                <tr>
                    <td> Jabatan</td>
                    <td> : </td>
                    <td> <?= $ps->nama_jabatan ?> </td>
                </tr>
                <tr>
                    <td> Bulan</td>
                    <td> : </td>
                    <td> <?= $bulan ?> </td>
                </tr>
                <tr>
                    <td> Tahun</td>
                    <td> : </td>
                    <td> <?= $tahun ?> </td>
                </tr>
            </table><br><br>

            <table class="table table-striped table-bordered mt-3">
                <tr>
                    <th class="text-center" width="5%">No</th>
                    <th class="text-center">Keterangan</th>
                    <th class="text-center">Jumlah</th>
                </tr>
                <tr>
                    <td>1</td>
                    <td>Gaji Pokok</td>
                    <td>Rp. <?= number_format($ps->gaji_pokok, 0, ',', '.') ?></td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Tunjangan Transport</td>
                    <td>Rp. <?= number_format($ps->tj_transport, 0, ',', '.') ?></td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>Uang Makan</td>
                    <td>Rp. <?= number_format($ps->uang_makan, 0, ',', '.') ?></td>
                </tr>
                <tr>
                    <td>4</td>
                    <td>Potongan</td>
                    <td>Rp. <?= number_format($jml_potongan, 0, ',', '.') ?></td>
                </tr>
                <tr>
                    <th colspan="2" style="text-align: right;">Total Gaji</th>
                    <th>Rp. <?= number_format($ps->gaji_pokok + $ps->tj_transport + $ps->uang_makan - $jml_potongan, 0, '.', ',') ?></th>
                </tr>
            </table>

            <table width="100%">
                <tr>
                    <td></td>
                    <td>
                        <p>Pegawai</p>
                        <br>
                        <br>
                        <p class="font-weight"><?= $ps->nama_pegawai ?></p>
                    </td>
                    <td width="200px">
                        <br><br>
                        <p>Jakarta, <?= date("d F Y") ?> <br> Finance,</p>
                        <br>
                        <br>
                        <p>____________________</p>
                    </td>
                </tr>
            </table>
        <?php endforeach; ?>
    </div>
</body>

</html>

<script type="text/javascript">
    window.print();
</script>