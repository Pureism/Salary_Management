<?php

class DataPenggajian extends CI_Controller
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
        $data['title'] = "Laporan Gaji Pegawai";

        // Filter untuk menampilkan bulan dan tahun
        if ((isset($_GET['bulan']) && $_GET['bulan'] != '') && (isset($_GET['tahun']) && $_GET['tahun'] != '')) {
            $bulan = $_GET['bulan'];
            $bulan = date("F", mktime(0, 0, 0, $bulan, 10));
            $tahun = $_GET['tahun'];
            $bulan_tahun = $bulan . $tahun;
        } else {
            $bulan = date('F');
            $tahun = date('Y');
            $bulan_tahun = $bulan . $tahun;
        }

        $data['potongan'] = $this->PenggajianModel->get_data('potongan_gaji')->result();
        $data['gaji'] = $this->db->query("SELECT data_pegawai.nik, 
                                                    data_pegawai.nama_pegawai, 
                                                    data_pegawai.jenis_kelamin, 
                                                    data_jabatan.nama_jabatan, 
                                                    data_jabatan.gaji_pokok, 
                                                    data_jabatan.tj_transport, 
                                                    data_jabatan.uang_makan, 
                                                    data_kehadiran.alpha
                                            FROM data_pegawai 
                                            INNER JOIN data_kehadiran ON data_kehadiran.nik=data_pegawai.nik 
                                            INNER JOIN data_jabatan ON data_jabatan.nama_jabatan=data_pegawai.jabatan 
                                            WHERE data_kehadiran.bulan='$bulan_tahun' 
                                            ORDER BY data_pegawai.nama_pegawai ASC")->result();

        // Import template
        $this->load->view('templates_admin/header', $data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/dataGaji', $data);
        $this->load->view('templates_admin/footer');
    }

    public function cetakGaji()
    {
        $data['title'] = "Cetak Gaji Pegawai";

        // Filter untuk menampilkan bulan dan tahun
        if ((isset($_GET['bulan']) && $_GET['bulan'] != '') && (isset($_GET['tahun']) && $_GET['tahun'] != '')) {
            $bulan = $_GET['bulan'];
            $tahun = $_GET['tahun'];
            $bulan_tahun = $bulan . $tahun;
        } else {
            $bulan = date('m');
            $tahun = date('Y');
            $bulan_tahun = $bulan . $tahun;
        }

        $data['potongan'] = $this->PenggajianModel->get_data('potongan_gaji')->result();
        $data['cetak_gaji'] = $this->db->query("SELECT data_pegawai.nik, 
                                                    data_pegawai.nama_pegawai, 
                                                    data_pegawai.jenis_kelamin, 
                                                    data_jabatan.nama_jabatan, 
                                                    data_jabatan.gaji_pokok, 
                                                    data_jabatan.tj_transport, 
                                                    data_jabatan.uang_makan, 
                                                    data_kehadiran.alpha
                                            FROM data_pegawai 
                                            INNER JOIN data_kehadiran ON data_kehadiran.nik=data_pegawai.nik 
                                            INNER JOIN data_jabatan ON data_jabatan.nama_jabatan=data_pegawai.jabatan 
                                            WHERE data_kehadiran.bulan='$bulan_tahun' 
                                            ORDER BY data_pegawai.nama_pegawai ASC")->result();

        // Import template
        $this->load->view('templates_admin/header', $data);
        $this->load->view('admin/cetakDataGaji', $data);
    }
}
