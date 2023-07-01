<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MKuota extends CI_Model
{
    public $id_beasiswa;
    public $id_prodi;
    public $kuota;

    public function getAll()
    {
        $this->db->join('tb_beasiswa', 'tb_beasiswa.id_beasiswa = tb_kuota.id_beasiswa');
        $this->db->join('tb_prodi', 'tb_prodi.id_prodi = tb_kuota.id_prodi');
        $query = $this->db->get('tb_kuota');
        return $query->result_array();
    }

    public function getById($id)
    {
        $query = $this->db->get_where('tb_kuota', ['id_kuota' => $id]);
        return $query->row_array();
    }

    public function getByIdProdi($id_prodi, $id_beasiswa)
    {
        $query = $this->db->get_where('tb_kuota', ['id_prodi' => $id_prodi, 'id_beasiswa' => $id_beasiswa]);
        return $query->row_array();
    }

    public function insert()
    {
        $post = $this->input->post();
        $this->id_beasiswa = $post['id_beasiswa'];
        $this->id_prodi = $post['id_prodi'];
        $this->kuota = $post['kuota'];

        if ($this->db->insert('tb_kuota', $this)) {
            return true;
        } else {
            return false;
        }
    }

    public function update($id)
    {
        $post = $this->input->post();
        $this->id_beasiswa = $post['id_beasiswa'];
        $this->id_prodi = $post['id_prodi'];
        $this->kuota = $post['kuota'];

        if ($this->db->update('tb_kuota', $this, ['id_kuota' => $id])) {
            return true;
        } else {
            return false;
        }
    }

    public function delete($id)
    {
        if ($this->db->delete('tb_kuota', ['id_kuota' => $id])) {
            return true;
        } else {
            return false;
        }
    }
}
