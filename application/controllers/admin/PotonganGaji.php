<?php

class PotonganGaji extends CI_Controller
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
        $data['title'] = "Data Potongan Gaji";
        $data['pot_gaji'] = $this->PenggajianModel->get_data('potongan_gaji')->result();

        // Import template
        $this->load->view('templates_admin/header', $data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/potonganGaji', $data);
        $this->load->view('templates_admin/footer');
    }

    public function tambahData()
    {
        $data['title'] = "Form Potongan Gaji";

        // Import template
        $this->load->view('templates_admin/header', $data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/tambahPotonganGaji', $data);
        $this->load->view('templates_admin/footer');
    }

    public function tambahDataAction()
    {
        $this->_rules();

        // Mengecek validasi, jika salah maka diredirect , jika benar maka data ditangkap
        if ($this->form_validation->run() == FALSE) {
            $this->tambahData();
        } else {
            $potongan = $this->input->post('potongan');
            $jml_potongan = $this->input->post('jml_potongan');

            $data = array(
                'potongan' => $potongan,
                'jml_potongan' => $jml_potongan
            );
            $this->PenggajianModel->insert_data($data, 'potongan_gaji');

            // Alert jika data berhasil ditambahkan
            $this->session->set_flashdata('pesan', '
                <div class="alert alert-success alert-dismissible fade show mb-3" role="alert">
                    <i class="fas fa-check-circle mr-3"></i><strong>Data berhasil ditambahkan</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
            ');
            redirect('admin/PotonganGaji');
        }
    }

    public function updateData($id)
    {
        // Mengambil data
        $where = array('id' => $id);
        $data['title'] = 'Update Data Potonan';
        $data['pot_gaji'] = $this->db->query("SELECT * FROM potongan_gaji WHERE id='$id'")->result();

        // Import template
        $this->load->view('templates_admin/header', $data);
        $this->load->view('templates_admin/sidebar', $data);
        $this->load->view('admin/updatePotonganGaji', $data);
        $this->load->view('templates_admin/footer', $data);
    }

    public function updateDataAction()
    {
        $this->_rules();

        // Mengecek validasi, jika salah maka diredirect , jika benar maka data ditangkap
        if ($this->form_validation->run() == FALSE) {
            $this->updateData($this->where);
        } else {
            $id = $this->input->post('id');
            $potongan = $this->input->post('potongan');
            $jml_potongan = $this->input->post('jml_potonganok');

            $data = array(
                'potongan' => $potongan,
                'jml_potongan' => $jml_potongan
            );
            $where = array('id' => $id);

            $this->PenggajianModel->update_data('potongan_gaji', $data, $where);

            // Alert jika data berhasil ditambahkan
            $this->session->set_flashdata('pesan', '
                <div class="alert alert-warning alert-dismissible fade show mb-3" role="alert">
                    <i class="fas fa-check-circle mr-3"></i><strong>Data berhasil diupdate</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
            ');
            redirect('admin/PotonganGaji');
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('potongan', 'jenis potongan', 'required');
        $this->form_validation->set_rules('jml_potongan', 'jumlah potongan', 'required');
    }

    public function deleteData($id)
    {
        $where = array('id' => $id);
        $this->PenggajianModel->delete_data($where, 'potongan_gaji');

        // Alert jika data berhasil ditambahkan
        $this->session->set_flashdata('pesan', '
        <div class="alert alert-danger alert-dismissible fade show mb-3" role="alert">
            <i class="fas fa-check-circle mr-3"></i><strong>Data berhasil dihapus</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
    ');
        redirect('admin/PotonganGaji');
    }
}
