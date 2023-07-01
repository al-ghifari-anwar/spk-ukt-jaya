<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MKriteria extends CI_Model
{
    public $kode_kriteria;
    public $nama_kriteria;

    public function getAll()
    {
        $query = $this->db->get('tb_kriteria');
        return $query->result_array();
    }

    public function getById($id)
    {
        $query = $this->db->get_where('tb_kriteria', ['id_kriteria' => $id]);
        return $query->row_array();
    }

    public function insert()
    {
        $post = $this->input->post();
        $this->kode_kriteria = $post['kode'];
        $this->nama_kriteria = $post['nama'];

        if ($this->db->insert('tb_kriteria', $this)) {
            return true;
        } else {
            return false;
        }
    }

    public function update($id)
    {
        $post = $this->input->post();
        $this->kode_kriteria = $post['kode'];
        $this->nama_kriteria = $post['nama'];

        if ($this->db->update('tb_kriteria', $this, ['id_kriteria' => $id])) {
            return true;
        } else {
            return false;
        }
    }

    public function delete($id)
    {
        if ($this->db->delete('tb_kriteria', ['id_kriteria' => $id])) {
            return true;
        } else {
            return false;
        }
    }
}
