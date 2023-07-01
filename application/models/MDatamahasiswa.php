<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MDatamahasiswa extends CI_Model
{

    public $id_mahasiswa;
    public $id_kriteria;
    public $value;
    public $dokumen;

    public function getAll()
    {
        $query = $this->db->get('tb_data_mahasiswa');
        return $query->result_array();
    }

    public function getById($id)
    {
        $query = $this->db->get_where('tb_data_mahasiswa', ['id_data_mahasiswa' => $id]);
        return $query->row_array();
    }

    public function getByIdMhs($id)
    {
        $query = $this->db->get_where('tb_data_mahasiswa', ['id_mahasiswa' => $id]);
        return $query->result_array();
    }

    public function insert()
    {
        $post = $this->input->post();
        $this->id_mahasiswa = $post['id_mahasiswa'];
        $this->id_kriteria = $post['id_kriteria'];
        $this->value = $post['value'];

        $file_name = 'Docs_' . $this->id_kriteria . '_' . $this->id_mahasiswa . '_' . date('dmY');
        $config['upload_path']          = FCPATH . '/assets/dokumen-mahasiswa/';
        $config['allowed_types']        = 'gif|jpg|png|pdf|docx';
        $config['max_size']             = 5069;
        $config['file_name']            = $file_name;
        $config['overwrite']            = true;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('dokumen')) {
            $uploaded_data = $this->upload->data();

            $this->dokumen = $uploaded_data['file_name'];

            if ($this->db->insert('tb_data_mahasiswa', $this)) {
                return true;
            } else {
                return false;
            }
        } else {
            $this->session->set_flashdata('fail', $this->upload->display_errors());
            redirect('datamahasiswa');
        }
    }

    public function update($id)
    {
        $post = $this->input->post();
        $this->id_mahasiswa = $post['nama'];

        if ($this->db->update('tb_data_mahasiswa', $this, ['id_data_mahasiswa' => $id])) {
            return true;
        } else {
            return false;
        }
    }

    public function delete($id)
    {
        if ($this->db->delete('tb_data_mahasiswa', ['id_data_mahasiswa' => $id])) {
            return true;
        } else {
            return false;
        }
    }
}
