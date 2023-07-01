<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kriteria extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('MKriteria');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['kriteria'] = $this->MKriteria->getAll();
        $this->load->view('Themes/Header', $data);
        $this->load->view('Themes/Menu');
        $this->load->view('Kriteria/Index');
        $this->load->view('Themes/Footer');
        $this->load->view('Themes/Scripts');
    }

    public function form($id = null)
    {
        if ($id) {
            $data['kriteria'] = $this->MKriteria->getById($id);
            $data['action'] = base_url('update-kriteria/') . $id;
        } else {
            $data['kriteria'] = ['id_kriteria' => '', 'nama_kriteria' => '', 'kode_kriteria' => ''];
            $data['action'] = base_url('add-kriteria');
        }

        $this->form_validation->set_rules('kode', 'Kode', 'required');
        $this->form_validation->set_rules('nama', 'Nama', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('Themes/Header', $data);
            $this->load->view('Themes/Menu');
            $this->load->view('Kriteria/Form');
            $this->load->view('Themes/Footer');
            $this->load->view('Themes/Scripts');
        } else {
            if ($id) {
                $res = $this->MKriteria->update($id);
                if ($res) {
                    $this->session->set_flashdata('success', 'Berhasil menyimpan data');
                    redirect('kriteria');
                } else {
                    $this->session->set_flashdata('fail', 'Gagal menyimpan data');
                    redirect('kriteria');
                }
            } else {
                $res = $this->MKriteria->insert();
                if ($res) {
                    $this->session->set_flashdata('success', 'Berhasil menyimpan data');
                    redirect('kriteria');
                } else {
                    $this->session->set_flashdata('fail', 'Gagal menyimpan data');
                    redirect('kriteria');
                }
            }
        }
    }

    public function delete($id)
    {
        $res = $this->MKriteria->delete($id);
        if ($res) {
            $this->session->set_flashdata('success', 'Berhasil menghapus data');
            redirect('kriteria');
        } else {
            $this->session->set_flashdata('fail', 'Gagal menghapus data');
            redirect('kriteria');
        }
    }
}
