<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Detailbeasiswa extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('MDetailbeasiswa');
        $this->load->model('MKriteria');
        $this->load->library('form_validation');
    }

    public function index($id_beasiswa)
    {
        $data['id_beasiswa'] = $id_beasiswa;
        $data['beasiswa'] = $this->MDetailbeasiswa->getAll($id_beasiswa);
        $this->load->view('Themes/Header', $data);
        $this->load->view('Themes/Menu');
        $this->load->view('Detailbeasiswa/Index');
        $this->load->view('Themes/Footer');
        $this->load->view('Themes/Scripts');
    }

    public function form($id_beasiswa, $id = null)
    {
        $data['id_beasiswa'] = $id_beasiswa;
        $data['kriteria'] = $this->MKriteria->getAll();
        if ($id) {
            $data['detailbeasiswa'] = $this->MDetailbeasiswa->getById($id);
            $data['action'] = base_url('update-detailbeasiswa/') . $id_beasiswa . '/' . $id;
        } else {
            $data['detailbeasiswa'] = ['id_beasiswa' => '', 'id_kriteria' => '', 'bobot_beasiswa' => ''];
            $data['action'] = base_url('add-detailbeasiswa/') . $id_beasiswa;
        }

        $this->form_validation->set_rules('bobot_beasiswa', 'Bobot', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('Themes/Header', $data);
            $this->load->view('Themes/Menu');
            $this->load->view('Detailbeasiswa/Form');
            $this->load->view('Themes/Footer');
            $this->load->view('Themes/Scripts');
        } else {
            if ($id) {
                $res = $this->MDetailbeasiswa->update($id);
                if ($res) {
                    $this->session->set_flashdata('success', 'Berhasil menyimpan data');
                    redirect('detailbeasiswa/' . $id_beasiswa);
                } else {
                    $this->session->set_flashdata('fail', 'Gagal menyimpan data');
                    redirect('detailbeasiswa/' . $id_beasiswa);
                }
            } else {
                $res = $this->MDetailbeasiswa->insert();
                if ($res) {
                    $this->session->set_flashdata('success', 'Berhasil menyimpan data');
                    redirect('detailbeasiswa/' . $id_beasiswa);
                } else {
                    $this->session->set_flashdata('fail', 'Gagal menyimpan data');
                    redirect('detailbeasiswa/' . $id_beasiswa);
                }
            }
        }
    }

    public function delete($id_beasiswa, $id = null)
    {
        $res = $this->MDetailbeasiswa->delete($id);
        if ($res) {
            $this->session->set_flashdata('success', 'Berhasil menghapus data');
            redirect('beasiswa' . $id_beasiswa);
        } else {
            $this->session->set_flashdata('fail', 'Gagal menghapus data');
            redirect('beasiswa' . $id_beasiswa);
        }
    }
}
