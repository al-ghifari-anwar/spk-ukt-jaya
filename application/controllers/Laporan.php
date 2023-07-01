<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('MProdi');
        $this->load->model('MBeasiswa');
        $this->load->model('MKuota');
        $this->load->library('form_validation');
    }

    public function index($id_beasiswa)
    {
        $data['prodi'] = $this->MProdi->getAll();
        $data['action'] = base_url('ranking/' . $id_beasiswa);
        $this->load->view('Themes/Header', $data);
        $this->load->view('Themes/Menu');
        $this->load->view('Laporan/Index');
        $this->load->view('Themes/Footer');
        $this->load->view('Themes/Scripts');
    }

    public function rank($id_beasiswa)
    {
        $id_prodi = $this->input->post('id_prodi');

        $data['id_prodi'] = $id_prodi;
        $data['beasiswa'] = $this->MBeasiswa->getById($id_beasiswa);
        $data['prodi'] = $this->MProdi->getById($id_prodi);
        $data['rank'] = $this->db->query("SELECT tb_mahasiswa.id_mahasiswa, nama_mahasiswa, nim_mahasiswa, tb_mahasiswa.id_prodi, SUM(tb_detail_hasil.bobot_hasil) AS bobot_total, tb_hasil.id_beasiswa FROM `tb_mahasiswa` JOIN tb_hasil ON tb_hasil.id_mahasiswa = tb_mahasiswa.id_mahasiswa JOIN tb_detail_hasil ON tb_detail_hasil.id_hasil = tb_hasil.id_hasil WHERE tb_hasil.id_beasiswa = '$id_beasiswa' AND tb_mahasiswa.id_prodi = '$id_prodi' AND tb_hasil.status_hasil = 'pending' GROUP BY tb_mahasiswa.id_mahasiswa ORDER BY bobot_total DESC;")->result_array();
        $data['jmlRank'] = $this->db->query("SELECT COUNT(*) AS jml FROM `tb_mahasiswa` JOIN tb_hasil ON tb_hasil.id_mahasiswa = tb_mahasiswa.id_mahasiswa JOIN tb_detail_hasil ON tb_detail_hasil.id_hasil = tb_hasil.id_hasil WHERE tb_hasil.id_beasiswa = '$id_beasiswa' AND tb_mahasiswa.id_prodi = '$id_prodi' AND tb_hasil.status_hasil = 'pending'")->row_array();

        $this->load->view('Themes/Header', $data);
        $this->load->view('Themes/Menu');
        $this->load->view('Laporan/Rank');
        $this->load->view('Themes/Footer');
        $this->load->view('Themes/Scripts');

        // echo json_encode($getRank);
    }

    public function konfirmasi($id_beasiswa, $id_prodi)
    {
        $kuota = $this->MKuota->getByIdProdi($id_prodi, $id_beasiswa);
        $rank = $this->db->query("SELECT tb_mahasiswa.id_mahasiswa, nama_mahasiswa, nim_mahasiswa, tb_mahasiswa.id_prodi, SUM(tb_detail_hasil.bobot_hasil) AS bobot_total, tb_hasil.id_beasiswa, tb_mahasiswa.email_mahasiswa, tb_hasil.id_hasil FROM `tb_mahasiswa` JOIN tb_hasil ON tb_hasil.id_mahasiswa = tb_mahasiswa.id_mahasiswa JOIN tb_detail_hasil ON tb_detail_hasil.id_hasil = tb_hasil.id_hasil WHERE tb_hasil.id_beasiswa = '$id_beasiswa' AND tb_mahasiswa.id_prodi = '$id_prodi' AND tb_hasil.status_hasil = 'pending' GROUP BY tb_mahasiswa.id_mahasiswa ORDER BY bobot_total DESC;")->result_array();
        $this->db->join('tb_mahasiswa', 'tb_mahasiswa.id_mahasiswa = tb_hasil.id_mahasiswa');
        $jmlPenerima = count($this->db->get_where('tb_hasil', ['id_beasiswa' => $id_beasiswa, 'id_prodi' => $id_prodi, 'status_hasil' => 'eligible'])->result_array());

        foreach ($rank as $rnk) {
            if ($jmlPenerima < $kuota['kuota']) {
                $data = [
                    'status_hasil' => 'eligible'
                ];
                $this->db->update('tb_hasil', $data, ['id_hasil' => $rnk['id_hasil']]);
            } else {
                $data = [
                    'status_hasil' => 'not-eligible'
                ];
                $this->db->update('tb_hasil', $data, ['id_hasil' => $rnk['id_hasil']]);
            }
        }

        $this->session->set_flashdata('success', 'Proses persetujuan dan konfirmasi calon penerima telah disimpan. Para penerima akan mendapatkan email konfirmasi mengenai hasil penerimaan. Terimakasih');
        redirect('laporan/' . $id_beasiswa);
    }

    public function hasil($id_beasiswa, $id_prodi)
    {

        $data['beasiswa'] = $this->MBeasiswa->getById($id_beasiswa);
        $data['prodi'] = $this->MProdi->getById($id_prodi);
        $data['rank'] = $this->db->query("SELECT tb_mahasiswa.id_mahasiswa, nama_mahasiswa, nim_mahasiswa, tb_mahasiswa.id_prodi, SUM(tb_detail_hasil.bobot_hasil) AS bobot_total, tb_hasil.id_beasiswa, tb_hasil.status_hasil, tb_hasil.id_hasil FROM `tb_mahasiswa` JOIN tb_hasil ON tb_hasil.id_mahasiswa = tb_mahasiswa.id_mahasiswa JOIN tb_detail_hasil ON tb_detail_hasil.id_hasil = tb_hasil.id_hasil WHERE tb_hasil.id_beasiswa = '$id_beasiswa' AND tb_mahasiswa.id_prodi = '$id_prodi' GROUP BY tb_mahasiswa.id_mahasiswa ORDER BY bobot_total DESC;")->result_array();
        $data['jmlRank'] = $this->db->query("SELECT COUNT(*) AS jml FROM `tb_mahasiswa` JOIN tb_hasil ON tb_hasil.id_mahasiswa = tb_mahasiswa.id_mahasiswa JOIN tb_detail_hasil ON tb_detail_hasil.id_hasil = tb_hasil.id_hasil WHERE tb_hasil.id_beasiswa = '$id_beasiswa' AND tb_mahasiswa.id_prodi = '$id_prodi' ")->row_array();

        $this->load->view('Themes/Header', $data);
        $this->load->view('Themes/Menu');
        $this->load->view('Laporan/Hasil');
        $this->load->view('Themes/Footer');
        $this->load->view('Themes/Scripts');

        // echo json_encode($getRank);
    }

    public function cetak($id_hasil, $id_beasiswa, $id_prodi)
    {
        $data['beasiswa'] = $this->MBeasiswa->getById($id_beasiswa);
        $data['prodi'] = $this->MProdi->getById($id_prodi);
        $data['rank'] = $this->db->query("SELECT tb_mahasiswa.id_mahasiswa, nama_mahasiswa, nim_mahasiswa, tb_mahasiswa.id_prodi, SUM(tb_detail_hasil.bobot_hasil) AS bobot_total, tb_hasil.id_beasiswa, tb_hasil.status_hasil, tb_hasil.id_hasil FROM `tb_mahasiswa` JOIN tb_hasil ON tb_hasil.id_mahasiswa = tb_mahasiswa.id_mahasiswa JOIN tb_detail_hasil ON tb_detail_hasil.id_hasil = tb_hasil.id_hasil WHERE tb_hasil.id_beasiswa = '$id_beasiswa' AND tb_mahasiswa.id_prodi = '$id_prodi' AND tb_hasil.id_hasil = '$id_hasil';")->row_array();
        $mpdf = new \Mpdf\Mpdf();
        $html = $this->load->view('Laporan/Cetak', $data, true);
        $mpdf->WriteHTML($html);
        $mpdf->Output();
    }
}
