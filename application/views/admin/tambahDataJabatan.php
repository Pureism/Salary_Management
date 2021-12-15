<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center mb-4">
        <a href="<?php echo base_url('admin/DataJabatan') ?>" class="btn btn-md btn-primary-outline mr-2"><i class="fas fa-arrow-left"></i></a>
        <h1 class="h3 mb-0 text-gray-800"><?php echo $title ?></h1>
    </div>
</div>

<div class="card ml-4" style="width:50%">
    <div class="card-body">
        <form action="<?php echo base_url('admin/DataJabatan/tambahDataAction') ?>" method="POST">
            <div class="form-group">
                <label>Nama Jabatan</label>
                <input type="text" name="nama_jabatan" class="form-control">
                <?php echo form_error('nama_jabatan', '<div 
                class="font-weight-bold text-small text-danger"><i class="fas fa-exclamation-circle mr-2"></i>', '</div>') ?>
            </div>
            <div class="form-group">
                <label>Gaji Pokok</label>
                <input type="number" name="gaji_pokok" class="form-control">
                <?php echo form_error('gaji_pokok', '<div class="font-weight-bold text-small text-danger"><i class="fas fa-exclamation-circle mr-2"></i>', '</div>') ?>
            </div>
            <div class="form-group">
                <label>Tunjangan Transport</label>
                <input type="number" name="tj_transport" class="form-control">
                <?php echo form_error('tj_transport', '<div class="font-weight-bold text-small text-danger"><i class="fas fa-exclamation-circle mr-2"></i>', '</div>') ?>
            </div>
            <div class="form-group">
                <label>Uang Makan</label>
                <input type="number" name="uang_makan" class="form-control">
                <?php echo form_error('uang_makan', '<div class="font-weight-bold text-small text-danger"><i class="fas fa-exclamation-circle mr-2"></i>', '</div>') ?>
            </div>
            <button type="submit" class="btn btn-md btn-success"><i class="fas fa-save mr-2"></i>Simpan Jabatan</button>
        </form>

    </div>
</div>