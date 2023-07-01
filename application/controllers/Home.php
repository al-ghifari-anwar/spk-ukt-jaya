<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('id_user') == null) {
            redirect('login');
        }
        $this->load->model('MKriteria');
        $this->load->model('MMahasiswa');
    }

    public function index()
    {
        $data['kriteria'] = $this->MKriteria->getAll();
        $data['mahasiswa'] = $this->MMahasiswa->getByNim($this->session->userdata('username'));
        $data['jmlBea'] = $this->db->query('SELECT COUNT(*) AS jml FROM tb_beasiswa')->row_array();
        $data['jmlMhs'] = $this->db->query('SELECT COUNT(*) AS jml FROM tb_mahasiswa')->row_array();
        $this->load->view('Themes/Header', $data);
        $this->load->view('Themes/Menu');
        $this->load->view('Home/Index');
        $this->load->view('Themes/Footer');
        $this->load->view('Themes/Scripts');
    }
}
