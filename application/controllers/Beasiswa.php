<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Beasiswa extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('MBeasiswa');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['beasiswa'] = $this->MBeasiswa->getAll();
        $this->load->view('Themes/Header', $data);
        $this->load->view('Themes/Menu');
        $this->load->view('Beasiswa/Index');
        $this->load->view('Themes/Footer');
        $this->load->view('Themes/Scripts');
    }

    public function form($id = null)
    {
        if ($id) {
            $data['beasiswa'] = $this->MBeasiswa->getById($id);
            $data['action'] = base_url('update-beasiswa/') . $id;
        } else {
            $data['beasiswa'] = ['id_beasiswa' => '', 'nama_beasiswa' => ''];
            $data['action'] = base_url('add-beasiswa');
        }

        $this->form_validation->set_rules('nama', 'Nama', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('Themes/Header', $data);
            $this->load->view('Themes/Menu');
            $this->load->view('Beasiswa/Form');
            $this->load->view('Themes/Footer');
            $this->load->view('Themes/Scripts');
        } else {
            if ($id) {
                $res = $this->MBeasiswa->update($id);
                if ($res) {
                    $this->session->set_flashdata('success', 'Berhasil menyimpan data');
                    redirect('beasiswa');
                } else {
                    $this->session->set_flashdata('fail', 'Gagal menyimpan data');
                    redirect('beasiswa');
                }
            } else {
                $res = $this->MBeasiswa->insert();
                if ($res) {
                    $this->session->set_flashdata('success', 'Berhasil menyimpan data');
                    redirect('beasiswa');
                } else {
                    $this->session->set_flashdata('fail', 'Gagal menyimpan data');
                    redirect('beasiswa');
                }
            }
        }
    }

    public function delete($id)
    {
        $res = $this->MBeasiswa->delete($id);
        if ($res) {
            $this->session->set_flashdata('success', 'Berhasil menghapus data');
            redirect('beasiswa');
        } else {
            $this->session->set_flashdata('fail', 'Gagal menghapus data');
            redirect('beasiswa');
        }
    }
}
