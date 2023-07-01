<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kuota extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('MKuota');
        $this->load->model('MBeasiswa');
        $this->load->model('MProdi');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['kuota'] = $this->MKuota->getAll();
        $this->load->view('Themes/Header', $data);
        $this->load->view('Themes/Menu');
        $this->load->view('Kuota/Index');
        $this->load->view('Themes/Footer');
        $this->load->view('Themes/Scripts');
    }

    public function form($id = null)
    {
        $data['beasiswa'] = $this->MBeasiswa->getAll();
        $data['prodi'] = $this->MProdi->getAll();

        if ($id) {
            $data['kuota'] = $this->MKuota->getById($id);
            $data['action'] = base_url('update-kuota/') . $id;
        } else {
            $data['kuota'] = ['id_kuota' => '', 'id_beasiswa' => '', 'id_prodi' => '', 'kuota' => ''];
            $data['action'] = base_url('add-kuota');
        }

        $this->form_validation->set_rules('kuota', 'Kuota', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('Themes/Header', $data);
            $this->load->view('Themes/Menu');
            $this->load->view('Kuota/Form');
            $this->load->view('Themes/Footer');
            $this->load->view('Themes/Scripts');
        } else {
            if ($id) {
                $res = $this->MKuota->update($id);
                if ($res) {
                    $this->session->set_flashdata('success', 'Berhasil menyimpan data');
                    redirect('kuota');
                } else {
                    $this->session->set_flashdata('fail', 'Gagal menyimpan data');
                    redirect('kuota');
                }
            } else {
                $res = $this->MKuota->insert();
                if ($res) {
                    $this->session->set_flashdata('success', 'Berhasil menyimpan data');
                    redirect('kuota');
                } else {
                    $this->session->set_flashdata('fail', 'Gagal menyimpan data');
                    redirect('kuota');
                }
            }
        }
    }

    public function delete($id)
    {
        $res = $this->MKuota->delete($id);
        if ($res) {
            $this->session->set_flashdata('success', 'Berhasil menghapus data');
            redirect('kuota');
        } else {
            $this->session->set_flashdata('fail', 'Gagal menghapus data');
            redirect('kuota');
        }
    }
}
