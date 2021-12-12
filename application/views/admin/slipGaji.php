<div class="container-fluid">
    <div class="card mx-auto my-auto" style="width: 35%;">
        <div class="card-header bg-primary text-white text-center font-weight-bold">
            Laporan Slip Gaji
        </div>

        <form action="<?php echo base_url('admin/SlipGaji/cetakSlipGaji') ?>" method="POST">
            <div class="card-body">
                <div class="form-group row">
                    <label for="inputPassword" class="col-sm-4 col-form-label">Bulan</label>
                    <div class="col-sm-8">
                        <select class="form-control" name="bulan">
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
                </div>
                <div class="form-group row">
                    <label for="inputPassword" class="col-sm-4 col-form-label">Tahun</label>
                    <div class="col-sm-8">
                        <select class="form-control" name="tahun">
                            <option value="">--Pilih Tahun--</option>
                            <?php $tahun = date('Y');
                            for ($i = $tahun - 4; $i <= $tahun; $i++) { ?>
                                <option value="<?php echo $i ?>"><?php echo $i ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputPassword" class="col-sm-4 col-form-label">Nama Pegawai</label>
                    <div class="col-sm-8">
                        <select class="form-control" name="nama_pegawai">
                            <option value="">--Pilih Pegawai--</option>
                            <?php foreach ($pegawai as $p) : ?>
                                <option value="<?php echo $p->nama_pegawai ?>"><?php echo $p->nama_pegawai ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <button class="btn btn-warning text-dark mt-3" style="width: 100%;" type="submit"><i class="fas fa-print mr-2"></i>Cetak Slip Gaji</button>
            </div>
        </form>
    </div>
</div>