<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MUser extends CI_Model
{

    public $email_user;
    public $nama_user;
    public $username;
    public $password;
    public $level_user;

    public function getAll()
    {
        $query = $this->db->get('tb_user');
        return $query->result_array();
    }

    public function getById($id)
    {
        $query = $this->db->get_where('tb_user', ['id_user' => $id]);
        return $query->row_array();
    }

    public function getForAuth()
    {
        $post = $this->input->post();
        $username = $post['username'];
        $password = md5($post['password']);
        $query = $this->db->get_where('tb_user', ['username' => $username, 'password' => $password]);
        if ($query) {
            return $query->row_array();
        } else {
            return false;
        }
    }

    public function insert()
    {
        $post = $this->input->post();
        $this->email_user = $post['email'];
        $this->nama_user = $post['nama'];
        $this->username = $post['username'];
        $this->password = MD5($post['password']);
        $this->level_user = $post['level'];

        if ($this->db->insert('tb_user', $this)) {
            return true;
        } else {
            return false;
        }
    }

    public function update($id)
    {
        $post = $this->input->post();
        $this->nama_user = $post['nama'];
        $this->username = $post['username'];
        $this->level_user = $post['level'];

        if ($this->db->update('tb_user', $this, ['id_user' => $id])) {
            return true;
        } else {
            return false;
        }
    }

    public function updatePassword($id)
    {
        $post = $this->input->post();
        $pass_old = md5($post['pass_old']);
        $pass_new = md5($post['pass_new']);

        $this->password = $pass_new;

        $cekPass = $this->db->get_where('tb_user', ['id_user' => $id, 'password' => $pass_old])->row_array();

        if ($cekPass) {
            if ($this->db->update('tb_user', ['password' => $pass_new], ['id_user' => $id])) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function delete($id)
    {
        if ($this->db->delete('tb_user', ['id_user' => $id])) {
            return true;
        } else {
            return false;
        }
    }
}
