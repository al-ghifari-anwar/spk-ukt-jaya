<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MBeasiswa extends CI_Model
{

    public $nama_beasiswa;

    public function getAll()
    {
        $query = $this->db->get('tb_beasiswa');
        return $query->result_array();
    }

    public function getById($id)
    {
        $query = $this->db->get_where('tb_beasiswa', ['id_beasiswa' => $id]);
        return $query->row_array();
    }

    public function insert()
    {
        $post = $this->input->post();
        $this->nama_beasiswa = $post['nama'];

        if ($this->db->insert('tb_beasiswa', $this)) {
            return true;
        } else {
            return false;
        }
    }

    public function update($id)
    {
        $post = $this->input->post();
        $this->nama_beasiswa = $post['nama'];

        if ($this->db->update('tb_beasiswa', $this, ['id_beasiswa' => $id])) {
            return true;
        } else {
            return false;
        }
    }

    public function delete($id)
    {
        if ($this->db->delete('tb_beasiswa', ['id_beasiswa' => $id])) {
            return true;
        } else {
            return false;
        }
    }
}
