<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Detailkriteria extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('MDetailkriteria');
        $this->load->model('MKriteria');
        $this->load->library('form_validation');
    }

    public function index($id_kriteria)
    {
        $data['id_kriteria'] = $id_kriteria;
        $data['detailkriteria'] = $this->MDetailkriteria->getAll($id_kriteria);
        $this->load->view('Themes/Header', $data);
        $this->load->view('Themes/Menu');
        $this->load->view('Detailkriteria/Index');
        $this->load->view('Themes/Footer');
        $this->load->view('Themes/Scripts');
    }

    public function form($id_kriteria, $id = null)
    {
        $data['id_kriteria'] = $id_kriteria;
        $data['kriteria'] = $this->MKriteria->getAll();
        if ($id) {
            $data['detailkriteria'] = $this->MDetailkriteria->getById($id);
            $data['action'] = base_url('update-detailkriteria/') . $id_kriteria . '/' . $id;
        } else {
            $data['detailkriteria'] = ['id_detail_kriteria' => '', 'id_kriteria' => '', 'min_value' => '', 'max_value' => '', 'bobot_detail_kriteria' => ''];
            $data['action'] = base_url('add-detailkriteria/') . $id_kriteria;
        }

        $this->form_validation->set_rules('min_value', 'Batas Minimum', 'required');
        $this->form_validation->set_rules('max_value', 'Batas Maksimum', 'required');
        $this->form_validation->set_rules('bobot', 'Bobot', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('Themes/Header', $data);
            $this->load->view('Themes/Menu');
            $this->load->view('Detailkriteria/Form');
            $this->load->view('Themes/Footer');
            $this->load->view('Themes/Scripts');
        } else {
            if ($id) {
                $res = $this->MDetailkriteria->update($id);
                if ($res) {
                    $this->session->set_flashdata('success', 'Berhasil menyimpan data');
                    redirect('detailkriteria/' . $id_kriteria);
                } else {
                    $this->session->set_flashdata('fail', 'Gagal menyimpan data');
                    redirect('detailkriteria/' . $id_kriteria);
                }
            } else {
                $res = $this->MDetailkriteria->insert();
                if ($res) {
                    $this->session->set_flashdata('success', 'Berhasil menyimpan data');
                    redirect('detailkriteria/' . $id_kriteria);
                } else {
                    $this->session->set_flashdata('fail', 'Gagal menyimpan data');
                    redirect('detailkriteria/' . $id_kriteria);
                }
            }
        }
    }

    public function delete($id_kriteria, $id = null)
    {
        $res = $this->MDetailkriteria->delete($id);
        if ($res) {
            $this->session->set_flashdata('success', 'Berhasil menghapus data');
            redirect('kriteria/' . $id_kriteria);
        } else {
            $this->session->set_flashdata('fail', 'Gagal menghapus data');
            redirect('kriteria/' . $id_kriteria);
        }
    }
}
