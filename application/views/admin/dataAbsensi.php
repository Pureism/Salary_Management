<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?php echo $title ?></h1>
    </div>

    <div class="card mb-3">
        <div class="card-header bg-primary text-white">
            Filter Data Absensi Pegawai
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
                <a href="<?php echo base_url('admin/DataAbsensi/tambahAbsensi') ?>" class="btn btn-success mb-3 ml-3"><i class="fas fa-plus mr-2"></i>Tambah Absensi</a>

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
                if (count($absensi) > 0) {
                ?>
                    <a href="<?php echo base_url('admin/DataAbsensi/cetakAbsensi?bulan=' . $bulan . '&tahun=' . $tahun) ?>" class="btn btn-warning mb-3 ml-3 text-dark"><i class="fas fa-print mr-2"></i>Cetak Absensi</a>
                <?php } ?>
            </form>
        </div>
    </div>

    <?php echo $this->session->flashdata('absensi') ?>
    <div class="alert alert-info">Menampilkan data kehadiran pegawai <strong><?php echo $bulan ?> <?php echo $tahun ?></strong></div>

    <?php
    // Kondisional jika data yang dicari tidak ada
    $jml_data = count($absensi);
    if ($jml_data > 0) {
    ?>

        <!-- Table -->
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
    <?php } else { ?>
        <h4><span class="badge badge-danger"><i class="fas fa-exclamation-triangle mr-2"></i> Data bulan ini masih kosong ! </span></h4>
        <h4><span class="badge badge-warning"><i class="fas fa-exclamation-triangle mr-2"></i> Silahkan mengisi data terlebih dahulu ! </span></h4>
    <?php } ?>


</div>