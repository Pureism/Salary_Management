<!-- Begin Page Content -->
<div class="container-fluid" style="margin-bottom: 100px;">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center mb-4">
        <a href="<?php echo base_url('admin/DataPegawai') ?>" class="btn btn-md btn-primary-outline mr-2"><i class="fas fa-arrow-left"></i></a>
        <h1 class="h3 mb-0 text-gray-800"><?php echo $title ?></h1>
    </div>

</div>

<div class="card ml-4" style="width:50%; margin-bottom:100px">
    <div class="card-body">
        <form action="<?php echo base_url('admin/DataPegawai/tambahDataAction') ?>" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label>NIK</label>
                <input type="number" name="nik" class="form-control">
                <?php echo form_error('nik', '<div class="font-weight-bold text-small text-danger"><i class="fas fa-exclamation-circle mr-2"></i>', '</div>') ?>
            </div>

            <div class="form-group">
                <label>Nama Pegawai</label>
                <input type="text" name="nama_pegawai" class="form-control">
                <?php echo form_error('nama_pegawai', '<div class="font-weight-bold text-small text-danger"><i class="fas fa-exclamation-circle mr-2"></i>', '</div>') ?>
            </div>

            <div class="form-group">
                <label>Username</label>
                <input type="text" name="username" class="form-control">
                <?php echo form_error('username', '<div class="font-weight-bold text-small text-danger"><i class="fas fa-exclamation-circle mr-2"></i>', '</div>') ?>
            </div>

            <div class="form-group">
                <label>password</label>
                <input type="password" name="password" class="form-control">
                <?php echo form_error('password', '<div class="font-weight-bold text-small text-danger"><i class="fas fa-exclamation-circle mr-2"></i>', '</div>') ?>
            </div>


            <div class="form-group">
                <label>Jenis Kelamin</label>
                <select name="jenis_kelamin" class="form-control">
                    <option value="">--Pilih Jenis Kelamin--</option>
                    <option value="Laki-laki">Laki-laki</option>
                    <option value="Perempuan">Perempuan</option>
                </select>
                <?php echo form_error('jenis_kelamin', '<div class="font-weight-bold text-small text-danger"><i class="fas fa-exclamation-circle mr-2"></i>', '</div>') ?>
            </div>
            <div class="form-group">
                <label>Jabatan</label>
                <select name="jabatan" class="form-control">
                    <option value="">--Pilih Jenis Jabatan--</option>
                    <?php foreach ($jabatan as $j) : ?>
                        <option value="<?php echo $j->nama_jabatan ?>"><?php echo $j->nama_jabatan ?></option>
                    <?php endforeach; ?>
                </select>
                <?php echo form_error('jabatan', '<div class="font-weight-bold text-small text-danger"><i class="fas fa-exclamation-circle mr-2"></i>', '</div>') ?>
            </div>
            <div class="form-group">
                <label>Tanggal Masuk</label>
                <input type="date" name="tanggal_masuk" class="form-control">
                <?php echo form_error('tanggal_masuk', '<div class="font-weight-bold text-small text-danger"><i class="fas fa-exclamation-circle mr-2"></i>', '</div>') ?>
            </div>
            <div class="form-group">
                <label>Status</label>
                <select name="status" class="form-control">
                    <option value="">--Pilih Status Pegawai--</option>
                    <option value="Pegawai Tetap">Pegawai Tetap</option>
                    <option value="Pegawai Kontrak">Pegawai Kontrak</option>
                    <option value="Magang">Magang</option>
                </select>
                <?php echo form_error('status', '<div class="font-weight-bold text-small text-danger"><i class="fas fa-exclamation-circle mr-2"></i>', '</div>') ?>
            </div>
            <div class="form-group">
                <label>Photo</label>
                <input type="file" name="photo" class="form-control">
            </div>
            <div class="form-group">
                <label>Hak Akses</label>
                <select name="hak_akses" class="form-control">
                    <option value="">-- Pilih Hak Akses --</option>
                    <option value="1">Admin</option>
                    <option value="2">Pegawai</option>
                </select>
                <?php echo form_error('hak_akses', '<div class="font-weight-bold text-small text-danger"><i class="fas fa-exclamation-circle mr-2"></i>', '</div>') ?>
            </div>
            <button type="submit" class="btn btn-md btn-success mt-2"><i class="fas fa-save mr-2"></i>Simpan Pegawai</button>
        </form>

    </div>
</div>