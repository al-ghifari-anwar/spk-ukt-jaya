<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('MUser');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['user'] = $this->MUser->getAll();
        $this->load->view('Themes/Header', $data);
        $this->load->view('Themes/Menu');
        $this->load->view('User/Index');
        $this->load->view('Themes/Footer');
        $this->load->view('Themes/Scripts');
    }

    public function form($id = null)
    {
        if ($id) {
            $data['user'] = $this->MUser->getById($id);
            $data['action'] = base_url('update-user/') . $id;
        } else {
            $data['user'] = ['id_user' => '', 'email_user' => '', 'nama_user' => '', 'username' => ''];
            $data['action'] = base_url('add-user');
        }

        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|trim');
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('username', 'Username', 'required|is_unique[tb_user.username]');

        if ($this->form_validation->run() == false) {
            $this->load->view('Themes/Header', $data);
            $this->load->view('Themes/Menu');
            $this->load->view('User/Form');
            $this->load->view('Themes/Footer');
            $this->load->view('Themes/Scripts');
        } else {
            if ($id) {
                $res = $this->MUser->update($id);
                if ($res) {
                    $this->session->set_flashdata('success', 'Berhasil menyimpan data');
                    redirect('user');
                } else {
                    $this->session->set_flashdata('fail', 'Gagal menyimpan data');
                    redirect('user');
                }
            } else {
                $res = $this->MUser->insert();
                if ($res) {
                    $this->session->set_flashdata('success', 'Berhasil menyimpan data');
                    redirect('user');
                } else {
                    $this->session->set_flashdata('fail', 'Gagal menyimpan data');
                    redirect('user');
                }
            }
        }
    }

    public function updatePassword()
    {
        $this->form_validation->set_rules('pass_old', 'Password Lama', 'required');
        $this->form_validation->set_rules('pass_new', 'Password Baru', 'required');

        $data['action'] = base_url('change-password');

        if ($this->form_validation->run() == false) {
            $this->load->view('Themes/Header', $data);
            $this->load->view('Themes/Menu');
            $this->load->view('Auth/Ubahpass');
            $this->load->view('Themes/Footer');
            $this->load->view('Themes/Scripts');
        } else {
            $res = $this->MUser->updatePassword($this->session->userdata('id_user'));

            if ($res) {
                $this->session->set_flashdata('success', 'Berhasil menyimpan data');
                redirect('user');
            } else {
                $this->session->set_flashdata('fail', 'Gagal menyimpan data');
                redirect('user');
            }
        }
    }

    public function delete($id)
    {
        $res = $this->MUser->delete($id);
        if ($res) {
            $this->session->set_flashdata('success', 'Berhasil menghapus data');
            redirect('user');
        } else {
            $this->session->set_flashdata('fail', 'Gagal menghapus data');
            redirect('user');
        }
    }
}
