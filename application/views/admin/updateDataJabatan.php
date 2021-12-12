<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center mb-4">
        <a href="<?php echo base_url('admin/DataJabatan') ?>" class="btn btn-md btn-primary-outline mr-2"><i class="fas fa-arrow-left"></i></a>
        <h1 class="h3 mb-0 text-gray-800"><?php echo $title ?></h1>
    </div>
</div>

<div class="card ml-4" style="width:50%">
    <div class="card-body">

        <?php foreach ($jabatan as $j) : ?>
            <form action="<?php echo base_url('admin/DataJabatan/updateDataAction') ?>" method="POST">
                <div class="form-group">
                    <label>Nama Jabatan</label>
                    <input type="hidden" name="id_jabatan" class="form-control" value="<?php echo $j->id_jabatan ?>">
                    <input type="text" name="nama_jabatan" class="form-control" value="<?php echo $j->nama_jabatan ?>">
                    <?php echo form_error('nama_jabatan', '<div class="text-small text-danger"></div>') ?>
                </div>
                <div class="form-group">
                    <label>Gaji Pokok</label>
                    <input type="number" name="gaji_pokok" class="form-control" value="<?php echo $j->gaji_pokok ?>">
                    <?php echo form_error('gaji_pokok', '<div class="text-small text-danger"></div>') ?>
                </div>
                <div class="form-group">
                    <label>Tunjangan Transport</label>
                    <input type="number" name="tj_transport" class="form-control" value="<?php echo $j->tj_transport ?>">
                    <?php echo form_error('tj_transport', '<div class="text-small text-danger"></div>') ?>
                </div>
                <div class="form-group">
                    <label>Uang Makan</label>
                    <input type="number" name="uang_makan" class="form-control" value="<?php echo $j->uang_makan ?>">
                    <?php echo form_error('uang_makan', '<div class="text-small text-danger"></div>') ?>
                </div>
                <button type="submit" class="btn btn-md btn-success" onclick="return confirm('Anda yakin ingin mengupdate ?')"><i class="fas fa-save mr-2"></i>Update Jabatan</button>
            </form>
        <?php endforeach; ?>

    </div>
</div>