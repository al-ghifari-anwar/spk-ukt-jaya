<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mahasiswa extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('MMahasiswa');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['mahasiswa'] = $this->MMahasiswa->getAll();
        $this->load->view('Themes/Header', $data);
        $this->load->view('Themes/Menu');
        $this->load->view('Mahasiswa/Index');
        $this->load->view('Themes/Footer');
        $this->load->view('Themes/Scripts');
    }

    public function form($id = null)
    {
        if ($id) {
            $data['mahasiswa'] = $this->MMahasiswa->getById($id);
            $data['action'] = base_url('update-mahasiswa/') . $id;
        } else {
            $data['mahasiswa'] = ['id_mahasiswa' => '', 'nama_mahasiswa' => '', 'nim_mahasiswa' => '', 'alamat_mahasiswa' => '', 'semester_mahasiswa' => '', 'ip_mahasiswa' => '', 'penghasilan_ortu' => '', 'tanggungan_ortu' => '', 'ket_organisasi' => ''];
            $data['action'] = base_url('add-mahasiswa');
        }

        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('nim', 'Nim', 'required');
        $this->form_validation->set_rules('semester', 'Semester', 'required');
        $this->form_validation->set_rules('ip', 'Nilai IP', 'required');
        $this->form_validation->set_rules('penghasilan', 'Penghasilan Ortu', 'required');
        $this->form_validation->set_rules('tanggungan', 'Tanggungan Ortu', 'required');
        $this->form_validation->set_rules('organisasi', 'Keterangan Organisasi', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('Themes/Header', $data);
            $this->load->view('Themes/Menu');
            $this->load->view('Mahasiswa/Form');
            $this->load->view('Themes/Footer');
            $this->load->view('Themes/Scripts');
        } else {
            if ($id) {
                $res = $this->MMahasiswa->update($id);
                if ($res) {
                    $this->session->set_flashdata('success', 'Berhasil menyimpan data');
                    redirect('mahasiswa');
                } else {
                    $this->session->set_flashdata('fail', 'Gagal menyimpan data');
                    redirect('mahasiswa');
                }
            } else {
                $res = $this->MMahasiswa->insert();
                if ($res) {
                    $this->session->set_flashdata('success', 'Berhasil menyimpan data');
                    redirect('mahasiswa');
                } else {
                    $this->session->set_flashdata('fail', 'Gagal menyimpan data');
                    redirect('mahasiswa');
                }
            }
        }
    }

    public function delete($id)
    {
        $res = $this->MMahasiswa->delete($id);
        if ($res) {
            $this->session->set_flashdata('success', 'Berhasil menghapus data');
            redirect('mahasiswa');
        } else {
            $this->session->set_flashdata('fail', 'Gagal menghapus data');
            redirect('mahasiswa');
        }
    }
}
