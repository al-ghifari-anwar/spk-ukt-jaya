<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pendaftaran extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('MMahasiswa');
        $this->load->model('MProdi');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $nim = $this->input->post('nim');

        $this->form_validation->set_rules('nim', 'NIM', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('Pendaftaran/Index');
        } else {
            $getMhs = $this->MMahasiswa->getByNim($nim);

            if ($getMhs) {
                $id_mahasiswa = $getMhs['id_mahasiswa'];

                $cekMahasiswa = $this->db->get_where('tb_hasil', ['id_mahasiswa' => $id_mahasiswa, 'status_hasil' => 'eligible'])->row_array();

                if ($cekMahasiswa) {
                    $this->session->set_flashdata('fail', 'Mohon maaf, anda tidak dapat mendaftar dikarenakan anda telah diterima di salah satu beasiswa');
                    redirect('daftar');
                } else {
                    $this->session->set_flashdata('success', 'Anda sudah pernah mendaftar akun calon penerima beasiswa, silahkan login menggunakan NIM dan password anda');
                    redirect('login');
                }
            } else {
                $this->session->set_flashdata('success', 'Silahkan lengkapi form pendaftaran di bawah ini');
                redirect('daftar/' . $nim);
            }
        }
    }

    public function register($nim)
    {
        $data['nim'] = $nim;
        $data['prodi'] = $this->MProdi->getAll();

        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|trim');
        $this->form_validation->set_rules('nim', 'NIM', 'required|max_length[11]');
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('Pendaftaran/Register', $data);
        } else {
            $data = [
                'email_user' => $this->input->post('email'),
                'nama_user' => $this->input->post('nama'),
                'username' => $this->input->post('nim'),
                'password' => md5($this->input->post('password')),
                'level_user' => 'mahasiswa'
            ];
            $createAccount = $this->db->insert('tb_user', $data);

            if ($createAccount) {
                $insertMahasiswa = $this->MMahasiswa->insert();
                if ($insertMahasiswa) {
                    $this->session->set_flashdata('success', 'Pendaftaran akun berhasil, silahkan masuk menggunakan NIM dan password anda untuk melengkapi data');
                    redirect('login');
                } else {
                    $this->session->set_flashdata('fail', 'Mohon maaf, pembuatan akun gagal, silahkan coba lagi. Jika error berkelanjutan, silahkan hubungi admin');
                    redirect('daftar/' . $nim);
                }
            } else {
                $this->session->set_flashdata('fail', 'Mohon maaf, pembuatan akun gagal, silahkan coba lagi. Jika error berkelanjutan, silahkan hubungi admin');
                redirect('daftar');
            }
        }
    }
}
