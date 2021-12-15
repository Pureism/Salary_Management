<?php

class SlipGaji extends CI_Controller
{
    public function index()
    {
        $data['title'] = 'Slip Gaji Pegawai';
        $data['pegawai'] = $this->PenggajianModel->get_data('data_pegawai')->result();

        // Import template
        $this->load->view('templates_admin/header', $data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/slipGaji', $data);
        $this->load->view('templates_admin/footer');
    }

    public function cetakSlipGaji()
    {
        $this->_rules();

        $data['title'] = 'Cetak Slip Gaji';
        $data['potongan'] = $this->PenggajianModel->get_data('potongan_gaji')->result();

        // Mengecek validasi, jika belum diisi maka diredirect , jika benar maka akan mencetak 
        if ($this->form_validation->run() == FALSE) {
            $this->index();
        } else {
            $nama = $this->input->post('nama_pegawai');
            $bulan = $this->input->post('bulan');
            $tahun = $this->input->post('tahun');
            $bulantahun = $bulan . $tahun;

            $data['bulan'] = $bulan;
            $data['tahun'] = $tahun;
            $data['print_slip'] = $this->db->query("SELECT data_pegawai.nik, 
                                                        data_pegawai.nama_pegawai, 
                                                        data_jabatan.nama_jabatan, 
                                                        data_jabatan.gaji_pokok, 
                                                        data_jabatan.tj_transport, 
                                                        data_jabatan.uang_makan, 
                                                        data_kehadiran.alpha, 
                                                        data_kehadiran.bulan 
                                                FROM  data_pegawai 
                                                INNER JOIN data_kehadiran ON data_kehadiran.nik=data_pegawai.nik 
                                                INNER JOIN data_jabatan ON data_jabatan.nama_jabatan=data_pegawai.jabatan 
                                                WHERE data_kehadiran.bulan='$bulantahun' AND data_kehadiran.nama_pegawai='$nama'")->result();

            if (count($data['print_slip']) > 0) {
                // Import template
                $this->load->view('templates_admin/header', $data);
                $this->load->view('admin/cetakSlipGaji', $data);
            } else {
                // Alert jika data berhasil ditambahkan
                $this->session->set_flashdata('slipgaji', '
                    <center><div class="alert alert-danger alert-dismissible fade show mb-3" role="alert">
                        <i class="fas fa-exclamation mr-3"></i><strong>Isi form terlebih dahulu / Data masih kosong, isi kehadiran terlebih dahulu</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div></center>');
                redirect(base_url('admin/slipGaji'));
            }
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('bulan', 'bulan', 'required');
        $this->form_validation->set_rules('tahun', 'tahun', 'required');
        $this->form_validation->set_rules('nama_pegawai', 'nama pegawai', 'required');
    }
}
