<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?php echo $title ?></h1>
    </div>

    <a class="btn btn-md btn-success mb-4" href="<?php echo base_url('admin/DataJabatan/tambahData') ?>"><i class="fas fa-add mr-2"></i> Tambah Jabatan</a>

    <?php echo $this->session->flashdata('pesan') ?>

    <!-- Table Jabatan -->
    <table class="table table-bordered table-striped" style="margin-bottom: 10%;">
        <tr>
            <th class="text-center">No</th>
            <th class="text-center">Nama Jabatan</th>
            <th class="text-center">Gaji Pokok</th>
            <th class="text-center">Tunjangan Transport</th>
            <th class="text-center">Uang Makan</th>
            <th class="text-center">Total</th>
            <th class="text-center">Action</th>
        </tr>

        <?php
        $no = 1;
        foreach ($jabatan as $j) : ?>
            <tr>
                <td class="text-center"><?php echo $no++ ?></td>
                <td><?php echo $j->nama_jabatan ?></td>
                <td><?php echo 'Rp ' . number_format($j->gaji_pokok, 0, '.', ',') ?></td>
                <td><?php echo 'Rp ' . number_format($j->tj_transport, 0, '.', ',') ?></td>
                <td><?php echo 'Rp ' . number_format($j->uang_makan, 0, '.', ',') ?></td>
                <td><?php echo 'Rp ' . number_format($j->uang_makan + $j->tj_transport + $j->gaji_pokok, 0, '.', ',') ?></td>
                <td>
                    <center>
                        <a class="btn btn-sm btn-warning" href="<?php echo base_url('admin/DataJabatan/updateData/' . $j->id_jabatan) ?>"><i class="fas 
                        fa-edit"></i></a>
                        <a onclick="return confirm('Anda yakin ingin menghapus ?')" class="btn btn-sm btn-danger" href="<?php echo base_url('admin/DataJabatan/deleteData/' . $j->id_jabatan) ?>"><i class="fas fa-trash"></i></a>
                    </center>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>