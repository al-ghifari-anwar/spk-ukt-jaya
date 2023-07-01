<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MProdi extends CI_Model
{

    public $nama_prodi;

    public function getAll()
    {
        $query = $this->db->get('tb_prodi');
        return $query->result_array();
    }

    public function getById($id)
    {
        $query = $this->db->get_where('tb_prodi', ['id_prodi' => $id]);
        return $query->row_array();
    }

    public function insert()
    {
        $post = $this->input->post();
        $this->nama_prodi = $post['nama'];

        if ($this->db->insert('tb_prodi', $this)) {
            return true;
        } else {
            return false;
        }
    }

    public function update($id)
    {
        $post = $this->input->post();
        $this->nama_prodi = $post['nama'];

        if ($this->db->update('tb_prodi', $this, ['id_prodi' => $id])) {
            return true;
        } else {
            return false;
        }
    }

    public function delete($id)
    {
        if ($this->db->delete('tb_prodi', ['id_prodi' => $id])) {
            return true;
        } else {
            return false;
        }
    }
}
