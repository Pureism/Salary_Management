<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center mb-4">
        <a href="<?php echo base_url('admin/DataAbsensi') ?>" class="btn btn-md btn-primary-outline mr-2"><i class="fas fa-arrow-left"></i></a>
        <h1 class="h3 mb-0 text-gray-800"><?php echo $title ?></h1>
    </div>

    <div class="card mb-3">
        <div class="card-header bg-primary text-white">
            Tambah Data Absensi Pegawai
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

                <button type="submit" class="btn btn-primary mb-3 ml-auto"><i class="fas fa-eye mr-2"></i>Generate</button>
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

    <div class="alert alert-info">Menampilkan data kehadiran pegawai <strong><?php echo $bulan ?> <?php echo $tahun ?></strong></div>

    <form action="" method="POST">
        <?php
        // Kondisional jika data yang dicari tidak ada
        $jml_data = count($input_absensi);
        if ($jml_data > 0) {
        ?>
            <button class="btn btn-success mb-3" type="submit" name="submit" value="submit"><i class="fas fa-save mr-2"></i>Simpan Absensi</button>

            <!-- Table -->
            <table class="table table-bordered table-striped mb-5">
                <tr>
                    <th class="text-center">No</th>
                    <th class="text-center">NIK</th>
                    <th class="text-center">Nama Pegawai</th>
                    <th class="text-center">Jenis Kelamin</th>
                    <th class="text-center">Jabatan</th>
                    <th class="text-center" width="8%">Hadir</th>
                    <th class="text-center" width="8%">Sakit</th>
                    <th class="text-center" width="8%">Izin</th>
                    <th class="text-center" width="8%">Alpha</th>
                </tr>
                <?php $no = 1;
                foreach ($input_absensi as $a) : ?>
                    <tr>
                        <input type="hidden" name="bulan[]" class="form-control" value="<?php echo $bulan_tahun ?>">
                        <input type="hidden" name="nik[]" class="form-control" value="<?php echo $a->nik ?>">
                        <input type="hidden" name="nama_pegawai[]" class="form-control" value="<?php echo $a->nama_pegawai ?>">
                        <input type="hidden" name="jenis_kelamin[]" class="form-control" value="<?php echo $a->jenis_kelamin ?>">
                        <input type="hidden" name="nama_jabatan[]" class="form-control" value="<?php echo $a->nama_jabatan ?>">

                        <td class="text-center"><?php echo $no++ ?></td>
                        <td><?php echo $a->nik ?></td>
                        <td><?php echo $a->nama_pegawai ?></td>
                        <td class="text-center"><?php echo $a->jenis_kelamin ?></td>
                        <td class="text-center"><?php echo $a->nama_jabatan ?></td>
                        <td><input type="number" name="hadir[]" value="0" class="form-control"></td>
                        <td><input type="number" name="sakit[]" value="0" class="form-control"></td>
                        <td><input type="number" name="izin[]" value="0" class="form-control"></td>
                        <td><input type="number" name="alpha[]" value="0" class="form-control"></td>
                    </tr>
                <?php endforeach; ?>
            </table>
        <?php } else { ?>
            <h4><span class="badge badge-primary"><i class="fas fa-info mr-2"></i> Data bulan ini sudah diisi ! </span></h4>
        <?php } ?>
    </form>

</div>