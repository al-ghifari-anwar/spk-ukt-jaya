<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Datamahasiswa extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('MDatamahasiswa');
        $this->load->model('MKriteria');
        $this->load->model('MMahasiswa');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['datamahasiswa'] = $this->MDatamahasiswa->getAll();
        $data['nim'] = $this->session->userdata('username');
        $data['kriteria'] = $this->MKriteria->getAll();
        $data['mahasiswa'] = $this->MMahasiswa->getByNim($this->session->userdata('username'));
        $this->load->view('Themes/Header', $data);
        $this->load->view('Themes/Menu');
        $this->load->view('Datamahasiswa/Index');
        $this->load->view('Themes/Footer');
        $this->load->view('Themes/Scripts');
    }

    public function form($nim, $id_kriteria, $id = null)
    {
        $data['kriteria'] = $this->MKriteria->getById($id_kriteria);
        $data['mahasiswa'] = $this->MMahasiswa->getByNim($nim);
        if ($id) {
            $data['datamahasiswa'] = $this->MDatamahasiswa->getById($id);
            $data['action'] = base_url('update-datamahasiswa/') . $nim . '/' . $id_kriteria . '/' . $id;
        } else {
            $data['datamahasiswa'] = ['id_data_mahasiswa' => '', 'id_mahasiswa' => '', 'value' => '', 'dokumen' => ''];
            $data['action'] = base_url('add-datamahasiswa/' . $nim . '/' . $id_kriteria);
        }

        $this->form_validation->set_rules('value', 'Value', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('Themes/Header', $data);
            $this->load->view('Themes/Menu');
            $this->load->view('Datamahasiswa/Form');
            $this->load->view('Themes/Footer');
            $this->load->view('Themes/Scripts');
        } else {
            if ($id) {
                $res = $this->MDatamahasiswa->update($id);
                if ($res) {
                    $this->session->set_flashdata('success', 'Berhasil menyimpan data');
                    redirect('datamahasiswa');
                } else {
                    $this->session->set_flashdata('fail', 'Gagal menyimpan data');
                    redirect('datamahasiswa');
                }
            } else {
                $res = $this->MDatamahasiswa->insert();
                if ($res) {
                    $this->session->set_flashdata('success', 'Berhasil menyimpan data');
                    redirect('datamahasiswa');
                } else {
                    $this->session->set_flashdata('fail', 'Gagal menyimpan data');
                    redirect('datamahasiswa');
                }
            }
        }
    }

    public function delete($id)
    {
        $res = $this->MDatamahasiswa->delete($id);
        if ($res) {
            $this->session->set_flashdata('success', 'Berhasil menghapus data');
            redirect('datamahasiswa');
        } else {
            $this->session->set_flashdata('fail', 'Gagal menghapus data');
            redirect('datamahasiswa');
        }
    }
}
