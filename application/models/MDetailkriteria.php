<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MDetailkriteria extends CI_Model
{
    public $id_kriteria;
    public $min_value;
    public $max_value;
    public $bobot_detail_kriteria;

    public function getAll($id_kriteria)
    {
        $this->db->join('tb_kriteria', 'tb_kriteria.id_kriteria = tb_detail_kriteria.id_kriteria');
        $query = $this->db->get_where('tb_detail_kriteria', ['tb_kriteria.id_kriteria' => $id_kriteria]);
        return $query->result_array();
    }

    public function getById($id)
    {
        $query = $this->db->get_where('tb_detail_kriteria', ['id_detail_kriteria' => $id]);
        return $query->row_array();
    }

    public function calcBobot($id_kriteria, $value)
    {
        $query = $this->db->query("SELECT * FROM tb_detail_kriteria WHERE id_kriteria = '$id_kriteria' AND min_value <= '$value' AND max_value >= '$value'");
        return $query->result_array();
    }

    public function insert()
    {
        $post = $this->input->post();
        $this->id_kriteria = $post['id_kriteria'];
        $this->min_value = $post['min_value'];
        $this->max_value = $post['max_value'];
        $this->bobot_detail_kriteria = $post['bobot'];

        if ($this->db->insert('tb_detail_kriteria', $this)) {
            return true;
        } else {
            return false;
        }
    }

    public function update($id)
    {
        $post = $this->input->post();
        $this->id_kriteria = $post['id_kriteria'];
        $this->min_value = $post['min_value'];
        $this->max_value = $post['max_value'];
        $this->bobot_detail_kriteria = $post['bobot'];

        if ($this->db->update('tb_detail_kriteria', $this, ['id_detail_kriteria' => $id])) {
            return true;
        } else {
            return false;
        }
    }

    public function delete($id)
    {
        if ($this->db->delete('tb_detail_kriteria', ['id_detail_kriteria' => $id])) {
            return true;
        } else {
            return false;
        }
    }
}
