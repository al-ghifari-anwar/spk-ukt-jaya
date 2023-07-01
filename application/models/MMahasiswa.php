<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MMahasiswa extends CI_Model
{

    public $nama_mahasiswa;
    public $nim_mahasiswa;
    public $alamat_mahasiswa;
    public $id_prodi;
    public $email_mahasiswa;

    public function getAll()
    {
        $query = $this->db->get('tb_mahasiswa');
        return $query->result_array();
    }

    public function getById($id)
    {
        $query = $this->db->get_where('tb_mahasiswa', ['id_mahasiswa' => $id]);
        return $query->row_array();
    }

    public function getUnprocessedMhs($id_prodi)
    {
        $query = $this->db->query("SELECT * FROM tb_mahasiswa WHERE id_prodi = '$id_prodi' AND NOT EXISTS (SELECT id_mahasiswa FROM tb_hasil WHERE status_hasil = 'eligible') ");
        return $query->result_array();
    }

    public function getByNim($nim)
    {
        $query = $this->db->get_where('tb_mahasiswa', ['nim_mahasiswa' => $nim]);
        return $query->row_array();
    }

    public function insert()
    {
        $post = $this->input->post();
        $this->nama_mahasiswa = $post['nama'];
        $this->nim_mahasiswa = $post['nim'];
        $this->alamat_mahasiswa = $post['alamat'];
        $this->email_mahasiswa = $post['email'];
        $this->id_prodi = $post['id_prodi'];

        if ($this->db->insert('tb_mahasiswa', $this)) {
            return true;
        } else {
            return false;
        }
    }

    public function update($id)
    {
        $post = $this->input->post();
        $this->nama_mahasiswa = $post['nama'];
        $this->nim_mahasiswa = $post['nim'];
        $this->alamat_mahasiswa = $post['alamat'];
        $this->email_mahasiswa = $post['email'];
        $this->id_prodi = $post['id_prodi'];

        if ($this->db->update('tb_mahasiswa', $this, ['id_mahasiswa' => $id])) {
            return true;
        } else {
            return false;
        }
    }

    public function delete($id)
    {
        if ($this->db->delete('tb_mahasiswa', ['id_mahasiswa' => $id])) {
            return true;
        } else {
            return false;
        }
    }
}
