<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?php echo $title ?></h1>
    </div>

    <a href="<?php echo base_url('admin/PotonganGaji/tambahData') ?>" class="btn btn-success mb-3"><i class="fas fa-plus mr-2"></i>Tambah Potongan Gaji</a>

    <?php echo $this->session->flashdata('pesan') ?>

    <table class="table table-bordered table-striped">
        <tr>
            <th class="text-center">No</th>
            <th class="text-center">Jenis Potongan</th>
            <th class="text-center">Jumlah Potongan</th>
            <th class="text-center">Action</th>
        </tr>

        <?php $no = 1;
        foreach ($pot_gaji as $p) : ?>
            <tr>
                <td class="text-center"><?php echo $no++ ?></td>
                <td><?php echo $p->potongan ?></td>
                <td>Rp <?php echo number_format($p->jml_potongan, 0, ',', '.') ?></td>
                <td>
                    <center>
                        <a href="<?php echo base_url('admin/PotonganGaji/updateData/' . $p->id) ?>" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>
                        <a onclick="return confirm('Anda yakin ingin menghapus data ini ?')" href="<?php echo base_url('admin/PotonganGaji/deleteData/' . $p->id) ?>" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
                    </center>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>

</div>