<?php

class DataPegawai extends CI_Controller
{
    public function index()
    {
        // Mengambil data
        $data['title'] = 'Data Pegawai';
        $data['pegawai'] = $this->PenggajianModel->get_data('data_pegawai')->result();

        // Import template
        $this->load->view('templates_admin/header', $data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/DataPegawai', $data);
        $this->load->view('templates_admin/footer');
    }

    public function tambahData()
    {
        // Mengambil data
        $data['title'] = 'Form Data Pegawai';
        $data['jabatan'] = $this->PenggajianModel->get_data('data_jabatan')->result();

        // Import template
        $this->load->view('templates_admin/header', $data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/tambahDataPegawai', $data);
        $this->load->view('templates_admin/footer');
    }

    public function tambahDataAction()
    {
        $this->_rules();

        // Mengecek validasi, jika salah maka diredirect , jika benar maka data ditangkap
        if ($this->form_validation->run() == FALSE) {
            $this->tambahData();
        } else {
            $nik = $this->input->post('nik');
            $nama_pegawai = $this->input->post('nama_pegawai');
            $jenis_kelamin = $this->input->post('jenis_kelamin');
            $jabatan = $this->input->post('jabatan');
            $tanggal_masuk = $this->input->post('tanggal_masuk');
            $status = $this->input->post('status');
            $photo = $_FILES['photo']['name'];

            // Mengecek file foto
            if ($photo == '') {
            } else {
                // Mengatur Konfigurasi foto
                $config['upload_path'] = './assets/photo';
                $config['allowed_types'] = 'jpg|jpeg|png|tiff';
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('photo') == FALSE) {
                    echo 'Photo gagal diupload';
                } else {
                    $photo = $this->upload->data('file_name');
                }
            }

            $data = array(
                'nik' => $nik,
                'nama_pegawai' => $nama_pegawai,
                'jenis_kelamin' => $jenis_kelamin,
                'jabatan' => $jabatan,
                'tanggal_masuk' => $tanggal_masuk,
                'status' => $status,
                'photo' => $photo
            );
            $this->PenggajianModel->insert_data($data, 'data_pegawai');

            // Alert jika data berhasil ditambahkan
            $this->session->set_flashdata('pesan', '
            <div class="alert alert-success alert-dismissible fade show mb-3" role="alert">
                    <i class="fas fa-check-circle mr-3"></i><strong>Data berhasil ditambahkan</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            ');
            redirect('admin/dataPegawai');
        }
    }

    public function updateData($id)
    {
        // Mengambil data
        $where = array('id_pegawai' => $id);
        $data['title'] = 'Update Data Pegawai';
        $data['jabatan'] = $this->PenggajianModel->get_data('data_jabatan')->result();
        $data['pegawai'] = $this->db->query("SELECT * FROM data_pegawai WHERE id_pegawai='$id'")->result();

        // Import template
        $this->load->view('templates_admin/header', $data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/updateDataPegawai', $data);
        $this->load->view('templates_admin/footer');
    }

    public function updateDataAction()
    {
        $this->_rules();

        // Mengecek validasi, jika salah maka diredirect , jika benar maka data ditangkap
        if ($this->form_validation->run() == FALSE) {
            $this->updateData($this->where);
        } else {
            $id = $this->input->post('id_pegawai');
            $nik = $this->input->post('nik');
            $nama_pegawai = $this->input->post('nama_pegawai');
            $jenis_kelamin = $this->input->post('jenis_kelamin');
            $tanggal_masuk = $this->input->post('tanggal_masuk');
            $jabatan = $this->input->post('jabatan');
            $status = $this->input->post('status');
            $photo = $_FILES['photo']['name'];

            // Mengecek file foto
            if ($photo) {
                // Mengatur Konfigurasi foto
                $config['upload_path'] = './assets/photo';
                $config['allowed_types'] = 'jpg|jpeg|png|tiff';
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('photo')) {
                    $photo = $this->upload->data('file_name');
                    $this->db->set('photo', $photo);
                } else {
                    echo $this->upload->display_errors();
                }
            }

            $data = array(
                'nik' => $nik,
                'nama_pegawai' => $nama_pegawai,
                'jenis_kelamin' => $jenis_kelamin,
                'tanggal_masuk' => $tanggal_masuk,
                'jabatan' => $jabatan,
                'status' => $status,
            );
            $where = array('id_pegawai' => $id);

            $this->PenggajianModel->update_data('data_pegawai', $data, $where);

            // Alert jika data berhasil ditambahkan
            $this->session->set_flashdata('pesan', '
                <div class="alert alert-warning alert-dismissible fade show mb-3" role="alert">
                    <i class="fas fa-check-circle mr-3"></i><strong>Data berhasil diupdate</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
            ');
            redirect('admin/dataPegawai');
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('nik', 'NIK', 'required');
        $this->form_validation->set_rules('nama_pegawai', 'nama pegawai', 'required');
        $this->form_validation->set_rules('jenis_kelamin', 'jenis kelamin', 'required');
        $this->form_validation->set_rules('jabatan', 'jabatan', 'required');
        $this->form_validation->set_rules('tanggal_masuk', 'tanggal masuk', 'required');
        $this->form_validation->set_rules('status', 'status', 'required');
    }

    public function deleteData($id, $photo)
    {
        $where = array('id_pegawai' => $id);

        // Delete file
        // $pic = implode('', array('photo' => $photo));
        // $loc = base_url() . 'assets/photo/' . $pic;
        // unlink($loc);

        $this->PenggajianModel->delete_data($where, 'data_pegawai');

        // Alert jika data berhasil ditambahkan
        $this->session->set_flashdata('pesan', '
        <div class="alert alert-danger alert-dismissible fade show mb-3" role="alert">
            <i class="fas fa-check-circle mr-3"></i><strong>Data berhasil dihapus</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
    ');
        redirect('admin/dataPegawai');
    }
}
