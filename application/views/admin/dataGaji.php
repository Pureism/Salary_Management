<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?php echo $title ?></h1>
    </div>

    <div class="card mb-3">
        <div class="card-header bg-primary text-white">
            Filter Data Gaji Pegawai
        </div>
        <div class="card-body">
            <form class="form-inline">
                <div class="form-group mb-2">
                    <label for="">Bulan</label>
                    <select class="form-control ml-3" name="bulan">
                        <option value="">--Pilih Bulan--</option>
                        <option value="01">Januari</option>
                        <option value="02">Februari</option>
                        <option value="03">Maret</option>
                        <option value="04">April</option>
                        <option value="05">Mei</option>
                        <option value="06">Juni</option>
                        <option value="07">Juli</option>
                        <option value="08">Agustus</option>
                        <option value="09">September</option>
                        <option value="10">Oktober</option>
                        <option value="11">November</option>
                        <option value="12">Desember</option>
                    </select>
                </div>
                <div class="form-group ml-5 mb-2">
                    <label for="">Tahun</label>
                    <select class="form-control ml-3" name="tahun">
                        <option value="">--Pilih Tahun--</option>
                        <?php $tahun = date('Y');
                        for ($i = $tahun - 4; $i <= $tahun; $i++) { ?>
                            <option value="<?php echo $i ?>"><?php echo $i ?></option>
                        <?php } ?>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary mb-3 ml-auto"><i class="fas fa-filter mr-2"></i>Filter Data</button>

                <?php
                // Filter untuk menampilkan bulan dan tahun
                if ((isset($_GET['bulan']) && $_GET['bulan'] != '') && (isset($_GET['tahun']) && $_GET['tahun'] != '')) {
                    $bulan = $_GET['bulan'];
                    $bulan = date("F", mktime(0, 0, 0, $bulan, 10));
                    $tahun = $_GET['tahun'];
                    $bulan_tahun = $bulan . $tahun;
                } else {
                    $bulan = date('F');
                    $tahun = date('Y');
                    $bulan_tahun = $bulan . $tahun;
                }

                // Kondisional jika data yang dicari tidak ada
                if (count($gaji) > 0) {
                ?>
                    <a href="<?php echo base_url('admin/DataPenggajian/cetakGaji?bulan=' . $bulan . '&tahun=' . $tahun) ?>" class="btn btn-warning text-dark mb-3 ml-3"><i class="fas fa-print mr-2"></i>Cetak Daftar Gaji</a>
                <?php } ?>
            </form>
        </div>
    </div>

    <?php
    // Filter untuk menampilkan bulan dan tahun
    if ((isset($_GET['bulan']) && $_GET['bulan'] != '') && (isset($_GET['tahun']) && $_GET['tahun'] != '')) {
        $bulan = $_GET['bulan'];
        $bulan = date("F", mktime(0, 0, 0, $bulan, 10));
        $tahun = $_GET['tahun'];
        $bulan_tahun = $bulan . $tahun;
    } else {
        $bulan = date('F');
        $tahun = date('Y');
        $bulan_tahun = $bulan . $tahun;
    }
    ?>

    <div class="alert alert-info">Menampilkan data gaji pegawai <strong><?php echo $bulan ?> <?php echo $tahun ?></strong></div>

    <?php
    // Kondisional jika data yang dicari tidak ada
    $jml_data = count($gaji);
    if ($jml_data > 0) {
    ?>

        <div class="table-responsive">
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
                foreach ($gaji as $g) :
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
        <?php } else { ?>
            <h4><span class="badge badge-danger"><i class="fas fa-exclamation-triangle mr-2"></i> Data bulan ini masih kosong ! </span></h4>
            <h4><span class="badge badge-warning"><i class="fas fa-exclamation-triangle mr-2"></i> Silahkan mengisi data absensi terlebih dahulu ! </span></h4>
        <?php } ?>
        </div>


</div>