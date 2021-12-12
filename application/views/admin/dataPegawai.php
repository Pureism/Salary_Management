<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?php echo $title ?></h1>
    </div>

    <a class="btn btn-md btn-success mb-4" href="<?php echo base_url('admin/DataPegawai/tambahData') ?>"><i class="fas fa-add mr-2"></i> Tambah Pegawai</a>

    <?php echo $this->session->flashdata('pesan') ?>

    <!-- Table Jabatan -->
    <table class="table table-bordered table-striped" style="margin-bottom: 10%;">
        <tr>
            <th class="text-center">No</th>
            <th class="text-center">NIK</th>
            <th class="text-center">Nama Pegawai</th>
            <th class="text-center">Jenis Kelamin</th>
            <th class="text-center">Jabatan</th>
            <th class="text-center">Tanggal Masuk</th>
            <th class="text-center">Status</th>
            <th class="text-center">Photo</th>
            <th class="text-center">Action</th>
        </tr>

        <?php
        $no = 1;
        foreach ($pegawai as $p) : ?>
            <tr>
                <td class="text-center"><?php echo $no++ ?></td>
                <td><?php echo $p->nik ?></td>
                <td><?php echo $p->nama_pegawai ?></td>
                <td><?php echo $p->jenis_kelamin ?></td>
                <td><?php echo $p->jabatan ?></td>
                <td class="text-center"><?php echo $p->tanggal_masuk ?></td>
                <td><?php echo $p->status ?></td>
                <td>
                    <center><img src="<?php echo base_url() . 'assets/photo/' . $p->photo ?>" width="70px" alt=""></center>
                </td>
                <td>
                    <center>
                        <a class="btn btn-sm btn-warning" href="<?php echo base_url('admin/DataPegawai/updateData/' . $p->id_pegawai) ?>"><i class="fas 
                        fa-edit"></i></a>
                        <a onclick="return confirm('Anda yakin ingin menghapus ?')" class="btn btn-sm btn-danger" href="<?php echo base_url('admin/DataPegawai/deleteData/' . $p->id_pegawai . '/' . $p->photo) ?>"><i class="fas fa-trash"></i></a>
                    </center>
                </td>

            </tr>
        <?php endforeach; ?>
    </table>
</div>