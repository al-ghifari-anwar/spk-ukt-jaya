<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MDetailbeasiswa extends CI_Model
{

    public $id_beasiswa;
    public $id_kriteria;
    public $bobot_beasiswa;

    public function getAll($id_beasiswa)
    {
        $this->db->join('tb_kriteria', 'tb_detail_beasiswa.id_kriteria = tb_kriteria.id_kriteria');
        $query = $this->db->get_where('tb_detail_beasiswa', ['id_beasiswa' => $id_beasiswa]);
        return $query->result_array();
    }

    public function getById($id)
    {
        $this->db->join('tb_kriteria', 'tb_detail_beasiswa.id_kriteria = tb_kriteria.id_kriteria');
        $query = $this->db->get_where('tb_detail_beasiswa', ['id_detail_beasiswa' => $id]);
        return $query->row_array();
    }

    public function insert()
    {
        $post = $this->input->post();
        $this->id_beasiswa = $post['id_beasiswa'];
        $this->id_kriteria = $post['id_kriteria'];
        $this->bobot_beasiswa = $post['bobot_beasiswa'];

        if ($this->db->insert('tb_detail_beasiswa', $this)) {
            return true;
        } else {
            return false;
        }
    }

    public function update($id)
    {
        $post = $this->input->post();
        $this->id_beasiswa = $post['id_beasiswa'];
        $this->id_kriteria = $post['id_kriteria'];
        $this->bobot_beasiswa = $post['bobot_beasiswa'];

        if ($this->db->update('tb_detail_beasiswa', $this, ['id_detail_beasiswa' => $id])) {
            return true;
        } else {
            return false;
        }
    }

    public function delete($id)
    {
        if ($this->db->delete('tb_detail_beasiswa', ['id_detail_beasiswa' => $id])) {
            return true;
        } else {
            return false;
        }
    }
}
