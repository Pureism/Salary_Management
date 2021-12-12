<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center mb-4">
        <a href="<?php echo base_url('admin/PotonganGaji') ?>" class="btn btn-md btn-primary-outline mr-2"><i class="fas fa-arrow-left"></i></a>
        <h1 class="h3 mb-0 text-gray-800"><?php echo $title ?></h1>
    </div>
</div>

<div class="card ml-4" style="width:50%">
    <div class="card-body">

        <?php foreach ($pot_gaji as $p) : ?>
            <form action="<?php echo base_url('admin/PotonganGaji/updateDataAction') ?>" method="POST">
                <div class="form-group">
                    <label>Jenis Potongan</label>
                    <input type="hidden" name="id" class="form-control" value="<?php echo $p->id ?>">
                    <input type="text" name="potongan" class="form-control" value="<?php echo $p->potongan ?>">
                    <?php echo form_error('potongan', '<div class="text-small text-danger"></div>') ?>
                </div>
                <div class="form-group">
                    <label>Jumlah Potongan</label>
                    <input type="number" name="jml_potongan" class="form-control" value="<?php echo $p->jml_potongan ?>">
                    <?php echo form_error('jml_potongan', '<div class="text-small text-danger"></div>') ?>
                </div>
                <button type="submit" class="btn btn-md btn-success" onclick="return confirm('Anda yakin ingin mengupdate ?')"><i class="fas fa-save mr-2"></i>Update Potongan</button>
            </form>
        <?php endforeach; ?>

    </div>
</div>