<?php
defined('BASEPATH') or exit('No direct script access allowed');
class PenyakitModel extends CI_Model
{
    var $table_name = "mst_penyakit";

    public function get()
    {
        $this->db->select("*");
        $this->db->from($this->table_name);
        $query = $this->db->get();
        return $query->result();
    }

    public function get_id($id_penyakit)
    {
        $this->db->select("*");
        $this->db->from($this->table_name);
        $this->db->where("id_penyakit", $id_penyakit);
        $query = $this->db->get();
        return $query->row(0);
    }
    public function insert($gambar)
    {
        $set = [
            'kode_penyakit' => $this->input->post('kode_penyakit'),
            'nama_penyakit' => $this->input->post('nama_penyakit'),
            'ket_penyakit' => $this->input->post('ket_penyakit'),
            'solusi' => $this->input->post('solusi'),


        ];
        if ($gambar != "") {
            $set['gambar'] = $gambar;
        } else {
            $set['gambar'] = 'default.png';
        }
        $insert = $this->db->insert($this->table_name, $set);
        if ($insert) {
            $this->session->set_flashdata("success_message", "Data Berhasil di Tambahkan");
        } else {
            $this->session->set_flashdata("error_message", "Data Gagal di Tambahkan");
        }
    }
    public function update($id_penyakit, $gambar)
    {
        $set = [
            'kode_penyakit' => $this->input->post('kode_penyakit'),
            'nama_penyakit' => $this->input->post('nama_penyakit'),
            'ket_penyakit' => $this->input->post('ket_penyakit'),
            'solusi' => $this->input->post('solusi'),

        ];
        if ($gambar != "") {
            $set['gambar'] = $gambar;
        }
        $this->db->where("id_penyakit", $id_penyakit);
        $update = $this->db->update($this->table_name, $set);
        if ($update) {
            $this->session->set_flashdata("success_message", "Data Berhasil di Ubah");
        } else {
            $this->session->set_flashdata("error_message", "Data Gagal di Ubah");
        }
    }
    public function delete($id_penyakit)
    {
        $this->db->where('id_penyakit', $id_penyakit);
        $delete = $this->db->delete($this->table_name);
        if ($delete) {
            $this->session->set_flashdata("success_message", "Data Berhasil di Hapus");
        } else {
            $this->session->set_flashdata("error_message", "Data Gagal di Hapus");
        }
    }
}
