<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center mb-4">
        <a href="<?php echo base_url('admin/PotonganGaji') ?>" class="btn btn-md btn-primary-outline mr-2"><i class="fas fa-arrow-left"></i></a>
        <h1 class="h3 mb-0 text-gray-800"><?php echo $title ?></h1>
    </div>

    <div class="card" style="width: 50%;">
        <div class="card-body">
            <form action="<?php echo base_url('admin/PotonganGaji/tambahDataAction') ?>" method="POST">
                <div class="form-group">
                    <label for="">Jenis Potongan </label>
                    <input type="text" name="potongan" class="form-control">
                    <?php echo form_error('potongan') ?>
                </div>
                <div class="form-group">
                    <label for="">Jumlah Potongan </label>
                    <input type="number" name="jml_potongan" class="form-control">
                    <?php echo form_error('jml_potongan') ?>
                </div>
                <button type="submit" class="btn btn-success"><i class="fas fa-save mr-2"></i>Simpan Potongan</button>
            </form>
        </div>
    </div>

</div>