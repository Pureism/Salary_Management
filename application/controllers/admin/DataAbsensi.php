<?php

class DataAbsensi extends CI_Controller
{
    public function index()
    {
        // Menambah data
        $data['title'] = 'Laporan Data Absensi';
        $data['jabatan'] = $this->PenggajianModel->get_data('data_jabatan')->result();


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


        $data['absensi'] = $this->db->query("SELECT data_kehadiran.*, 
                                                    data_pegawai.nama_pegawai, 
                                                    data_pegawai.jenis_kelamin, 
                                                    data_pegawai.jabatan 
                                            FROM data_kehadiran 
                                            INNER JOIN data_pegawai ON data_kehadiran.nik=data_pegawai.nik 
                                            INNER JOIN data_jabatan ON data_pegawai.jabatan = data_jabatan.nama_jabatan 
                                            WHERE data_kehadiran.bulan='$bulan_tahun' 
                                            ORDER BY data_pegawai.nama_pegawai ASC")->result();



        // Import template
        $this->load->view('templates_admin/header', $data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/dataAbsensi', $data);
        $this->load->view('templates_admin/footer');
    }

    public function tambahAbsensi()
    {
        if ($this->input->post('submit', TRUE) == 'submit') {
            $post = $this->input->post();

            foreach ($post['bulan'] as $key => $value) {
                if ($post['bulan'][$key] != '' || $post['nik'][$key] != '') {
                    $simpan[] = array(
                        'bulan' => $post['bulan'][$key],
                        'nik' => $post['nik'][$key],
                        'nama_pegawai' => $post['nama_pegawai'][$key],
                        'jenis_kelamin' => $post['jenis_kelamin'][$key],
                        'nama_jabatan' => $post['nama_jabatan'][$key],
                        'hadir' => $post['hadir'][$key],
                        'sakit' => $post['sakit'][$key],
                        'izin' => $post['izin'][$key],
                        'alpha' => $post['alpha'][$key],
                    );
                }
            }
            $this->PenggajianModel->insert_batch('data_kehadiran', $simpan);

            // Alert jika data berhasil ditambahkan
            $this->session->set_flashdata('pesan', '
                <div class="alert alert-success alert-dismissible fade show mb-3" role="alert">
                    <i class="fas fa-check-circle mr-3"></i><strong>Data berhasil ditambahkan</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
            ');
            redirect('admin/dataAbsensi');
        }

        $data['title'] = 'Form Absensi Pegawai';

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

        $data['input_absensi'] = $this->db->query("SELECT data_pegawai.*,
                                                          data_jabatan.nama_jabatan 
                                                    FROM data_pegawai 
                                                    INNER JOIN data_jabatan 
                                                    ON data_pegawai.jabatan=data_jabatan.nama_jabatan 
                                                    WHERE NOT EXISTS (SELECT * FROM data_kehadiran 
                                                                        WHERE bulan='$bulan_tahun' AND data_pegawai.nik=data_kehadiran.nik) 
                                                    ORDER BY data_pegawai.nama_pegawai ASC")->result();

        // Import template
        $this->load->view('templates_admin/header', $data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/tambahDataAbsensi', $data);
        $this->load->view('templates_admin/footer');
    }

    public function cetakAbsensi()
    {
        $data['title'] = "Cetak Absensi";

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

        $data['jabatan'] = $this->PenggajianModel->get_data('data_jabatan')->result();
        $data['absensi'] = $this->db->query("SELECT data_kehadiran.*, 
                                                    data_pegawai.nama_pegawai, 
                                                    data_pegawai.jenis_kelamin, 
                                                    data_pegawai.jabatan 
                                            FROM data_kehadiran 
                                            INNER JOIN data_pegawai ON data_kehadiran.nik=data_pegawai.nik 
                                            INNER JOIN data_jabatan ON data_pegawai.jabatan = data_jabatan.nama_jabatan 
                                            WHERE data_kehadiran.bulan='$bulan_tahun' 
                                            ORDER BY data_pegawai.nama_pegawai ASC")->result();

        // Import template
        $this->load->view('templates_admin/header', $data);
        $this->load->view('admin/cetakDataAbsensi', $data);
    }
}
