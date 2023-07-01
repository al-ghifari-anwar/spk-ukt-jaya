<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Perhitungan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('MBeasiswa');
        $this->load->model('MDetailbeasiswa');
        $this->load->model('MProdi');
        $this->load->model('MKuota');
        $this->load->model('MKriteria');
        $this->load->model('MDetailkriteria');
        $this->load->model('MMahasiswa');
        $this->load->model('MDatamahasiswa');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['prodi'] = $this->MProdi->getAll();
        $data['action'] = base_url('proses-hitung');

        $this->load->view('Themes/Header', $data);
        $this->load->view('Themes/Menu');
        $this->load->view('Perhitungan/Index');
        $this->load->view('Themes/Footer');
        $this->load->view('Themes/Scripts');
    }

    public function hitung()
    {
        $id_prodi = $this->input->post('id_prodi');
        $jmlKriteria = count($this->MKriteria->getAll());
        $mhs = $this->MMahasiswa->getUnprocessedMhs($id_prodi);
        $beasiswa = $this->MBeasiswa->getAll();

        // $this->db->join('tb_prodi', 'tb_prodi.id_prodi = tb_mahasiswa.id_prodi');
        // $jmlMhsProdi = count($this->db->get('tb_mahasiswa')->result_array());

        $bobot = array();
        // $bobotHasil = array();

        foreach ($mhs as $mhs) {

            $getDataMhs = $this->MDatamahasiswa->getByIdMhs($mhs['id_mahasiswa']);
            if (count($getDataMhs) == $jmlKriteria) {
                foreach ($getDataMhs as $getDataMhs) {
                    $bobot[] = $this->MDetailkriteria->calcBobot($getDataMhs['id_kriteria'], $getDataMhs['value']);
                }
            }

            foreach ($beasiswa as $bea) {
                $detailBeasiswa = $this->MDetailbeasiswa->getAll($bea['id_beasiswa']);
                $dataHasil = [
                    'id_mahasiswa' => $mhs['id_mahasiswa'],
                    'id_beasiswa' => $bea['id_beasiswa'],
                    'status_hasil' => 'pending'
                ];
                if (!$this->db->get_where('tb_hasil', ['id_beasiswa' => $bea['id_beasiswa'], 'id_mahasiswa' => $mhs['id_mahasiswa']])->result_array()) {
                    $insertHasil = $this->db->insert('tb_hasil', $dataHasil);
                    $id_hasil = $this->db->insert_id();
                    foreach ($detailBeasiswa as $detBea) {
                        foreach ($bobot as $bbt) {
                            if ($bbt[0]['id_kriteria'] == $detBea['id_kriteria']) {
                                $bobotBea = $detBea['bobot_beasiswa'] * 100;
                                if ($bbt[0]['bobot_detail_kriteria'] == 3) {
                                    $bobotMhs = (float)$detBea['bobot_beasiswa'];
                                } else {
                                    $bobotMhs = $bbt[0]['bobot_detail_kriteria'] / $bobotBea;
                                }
                                $bobotHasil = [
                                    'id_hasil' => $id_hasil,
                                    'id_kriteria' => $detBea['id_kriteria'],
                                    'bobot_hasil' => $bobotMhs
                                ];
                                $insertDetHasil = $this->db->insert('tb_detail_hasil', $bobotHasil);
                            }
                        }
                    }
                } else {
                    continue;
                }
                // echo json_encode($bobotHasil);
                // die;
            }
        }

        $this->session->set_flashdata('success', 'Proses penghitungan telah selesai, hasil perangkingan dapat dilihat pada menu Laporan. Untuk proses selanjutnya adalah persetujuan dari Kaprodi');
        redirect('perhitungan');
    }
}
