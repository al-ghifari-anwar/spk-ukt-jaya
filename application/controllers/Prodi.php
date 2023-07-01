<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Prodi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('MProdi');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['prodi'] = $this->MProdi->getAll();
        $this->load->view('Themes/Header', $data);
        $this->load->view('Themes/Menu');
        $this->load->view('Prodi/Index');
        $this->load->view('Themes/Footer');
        $this->load->view('Themes/Scripts');
    }

    public function form($id = null)
    {
        if ($id) {
            $data['prodi'] = $this->MProdi->getById($id);
            $data['action'] = base_url('update-prodi/') . $id;
        } else {
            $data['prodi'] = ['id_prodi' => '', 'nama_prodi' => ''];
            $data['action'] = base_url('add-prodi');
        }

        $this->form_validation->set_rules('nama', 'Nama', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('Themes/Header', $data);
            $this->load->view('Themes/Menu');
            $this->load->view('Prodi/Form');
            $this->load->view('Themes/Footer');
            $this->load->view('Themes/Scripts');
        } else {
            if ($id) {
                $res = $this->MProdi->update($id);
                if ($res) {
                    $this->session->set_flashdata('success', 'Berhasil menyimpan data');
                    redirect('prodi');
                } else {
                    $this->session->set_flashdata('fail', 'Gagal menyimpan data');
                    redirect('prodi');
                }
            } else {
                $res = $this->MProdi->insert();
                if ($res) {
                    $this->session->set_flashdata('success', 'Berhasil menyimpan data');
                    redirect('prodi');
                } else {
                    $this->session->set_flashdata('fail', 'Gagal menyimpan data');
                    redirect('prodi');
                }
            }
        }
    }

    public function delete($id)
    {
        $res = $this->MProdi->delete($id);
        if ($res) {
            $this->session->set_flashdata('success', 'Berhasil menghapus data');
            redirect('prodi');
        } else {
            $this->session->set_flashdata('fail', 'Gagal menghapus data');
            redirect('prodi');
        }
    }
}
