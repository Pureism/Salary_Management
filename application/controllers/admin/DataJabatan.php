<?php

class DataJabatan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        if ($this->session->userdata('hak_akses') != '1') {
            $this->session->set_flashdata('pesan', '
                <div class="alert alert-danger alert-dismissible fade show mb-3" role="alert">
                   <strong>Anda belum login!</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
            ');
            redirect('welcome');
        }
    }
    public function index()
    {
        // Menambah data
        $data['title'] = 'Data Jabatan';
        $data['jabatan'] = $this->PenggajianModel->get_data('data_jabatan')->result();

        // Import template
        $this->load->view('templates_admin/header', $data);
        $this->load->view('templates_admin/sidebar', $data);
        $this->load->view('admin/dataJabatan', $data);
        $this->load->view('templates_admin/footer', $data);
    }

    public function tambahData()
    {
        // Menambah data
        $data['title'] = 'Form Data Jabatan';

        // Import template
        $this->load->view('templates_admin/header', $data);
        $this->load->view('templates_admin/sidebar', $data);
        $this->load->view('admin/tambahDataJabatan', $data);
        $this->load->view('templates_admin/footer', $data);
    }

    public function tambahDataAction()
    {
        $this->_rules();

        // Mengecek validasi, jika salah maka diredirect , jika benar maka data ditangkap
        if ($this->form_validation->run() == FALSE) {
            $this->tambahData();
        } else {
            $nama_jabatan = $this->input->post('nama_jabatan');
            $gaji_pokok = $this->input->post('gaji_pokok');
            $tj_transport = $this->input->post('tj_transport');
            $uang_makan = $this->input->post('uang_makan');

            $data = array(
                'nama_jabatan' => $nama_jabatan,
                'gaji_pokok' => $gaji_pokok,
                'tj_transport' => $tj_transport,
                'uang_makan' => $uang_makan
            );
            $this->PenggajianModel->insert_data($data, 'data_jabatan');

            // Alert jika data berhasil ditambahkan
            $this->session->set_flashdata('jabatan', '
                <div class="alert alert-success alert-dismissible fade show mb-3" role="alert">
                    <i class="fas fa-check-circle mr-3"></i><strong>Data berhasil ditambahkan</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
            ');
            redirect('admin/dataJabatan');
        }
    }

    public function updateData($id)
    {
        // Mengambil data
        $where = array('id_jabatan' => $id);
        $data['jabatan'] = $this->db->query("SELECT * FROM data_jabatan WHERE id_jabatan='$id'")->result();
        $data['title'] = 'Update Data Jabatan';

        // Import template
        $this->load->view('templates_admin/header', $data);
        $this->load->view('templates_admin/sidebar', $data);
        $this->load->view('admin/updateDataJabatan', $data);
        $this->load->view('templates_admin/footer', $data);
    }

    public function updateDataAction()
    {
        $this->_rules();

        // Mengecek validasi, jika salah maka diredirect , jika benar maka data ditangkap
        if ($this->form_validation->run() == FALSE) {
            $this->updateData($this->where);
        } else {
            $id = $this->input->post('id_jabatan');
            $nama_jabatan = $this->input->post('nama_jabatan');
            $gaji_pokok = $this->input->post('gaji_pokok');
            $tj_transport = $this->input->post('tj_transport');
            $uang_makan = $this->input->post('uang_makan');

            $data = array(
                'nama_jabatan' => $nama_jabatan,
                'gaji_pokok' => $gaji_pokok,
                'tj_transport' => $tj_transport,
                'uang_makan' => $uang_makan
            );
            $where = array('id_jabatan' => $id);

            $this->PenggajianModel->update_data('data_jabatan', $data, $where);

            // Alert jika data berhasil ditambahkan
            $this->session->set_flashdata('jabatan', '
                <div class="alert alert-warning alert-dismissible fade show mb-3" role="alert">
                    <i class="fas fa-check-circle mr-3"></i><strong>Data berhasil diupdate</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
            ');
            redirect('admin/dataJabatan');
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('nama_jabatan', 'nama jabatan', 'required');
        $this->form_validation->set_rules('gaji_pokok', 'gaji pokok', 'required');
        $this->form_validation->set_rules('tj_transport', 'tunjangan transport', 'required');
        $this->form_validation->set_rules('uang_makan', 'uang makan', 'required');
    }

    public function deleteData($id)
    {
        $where = array('id_jabatan' => $id);
        $this->PenggajianModel->delete_data($where, 'data_jabatan');

        // Alert jika data berhasil ditambahkan
        $this->session->set_flashdata('jabatan', '
        <div class="alert alert-danger alert-dismissible fade show mb-3" role="alert">
            <i class="fas fa-check-circle mr-3"></i><strong>Data berhasil dihapus</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
    ');
        redirect('admin/dataJabatan');
    }
}
