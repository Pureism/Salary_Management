<div class="container-fluid">
    <div class="card mx-auto my-auto" style="width: 35%;">
        <div class="card-header bg-primary text-white text-center font-weight-bold">
            Laporan Slip Gaji
        </div>

        <form action="<?php echo base_url('admin/SlipGaji/cetakSlipGaji') ?>" method="POST">
            <div class="card-body">
                <div class="form-group row">
                    <?php echo $this->session->flashdata('slipgaji') ?>
                    <label class="col-sm-4 col-form-label">Bulan</label>
                    <div class="col-sm-8">
                        <select class="form-control" name="bulan">
                            <option value="">--Pilih Bulan--</option>
                            <option value="January">Januari</option>
                            <option value="February">Februari</option>
                            <option value="March">Maret</option>
                            <option value="April">April</option>
                            <option value="May">Mei</option>
                            <option value="June">Juni</option>
                            <option value="July">Juli</option>
                            <option value="August">Agustus</option>
                            <option value="September">September</option>
                            <option value="October">Oktober</option>
                            <option value="November">November</option>
                            <option value="December">December</option>
                        </select>
                        <?php echo form_error('bulan', '<div class="font-weight-bold text-small text-danger"><i class="fas fa-exclamation-circle mr-2"></i>', '</div>') ?>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Tahun</label>
                    <div class="col-sm-8">
                        <select class="form-control" name="tahun">
                            <option value="">--Pilih Tahun--</option>
                            <?php $tahun = date('Y');
                            for ($i = $tahun - 4; $i <= $tahun; $i++) { ?>
                                <option value="<?php echo $i ?>"><?php echo $i ?></option>
                            <?php } ?>
                        </select>
                        <?php echo form_error('tahun', '<div class="font-weight-bold text-small text-danger"><i class="fas fa-exclamation-circle mr-2"></i>', '</div>') ?>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Nama Pegawai</label>
                    <div class="col-sm-8">
                        <select class="form-control" name="nama_pegawai">
                            <option value="">--Pilih Pegawai--</option>
                            <?php foreach ($pegawai as $p) : ?>
                                <option value="<?php echo $p->nama_pegawai ?>"><?php echo $p->nama_pegawai ?></option>
                            <?php endforeach; ?>
                        </select>
                        <?php echo form_error('nama_pegawai', '<div class="font-weight-bold text-small text-danger"><i class="fas fa-exclamation-circle mr-2"></i>', '</div>') ?>
                    </div>
                </div>



                <button class="btn btn-warning text-dark mt-3" style="width: 100%;" type="submit"><i class="fas fa-print mr-2"></i>Cetak Slip Gaji</button>

            </div>
        </form>
    </div>
</div>