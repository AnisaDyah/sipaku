<?php

class M_Penyakit extends CI_Model
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
        $this->db->where("$id_penyakit", $id_penyakit);
        $query = $this->db->get();
        return $query->row(0);
    }


    public function input_data($data, $table)
    {
        $this->db->insert($table, $data);
    }

    public function insert($url_gambar)
    {
        $set = [
            'kode_penyakit' => $this->input->post('kode_penyakit'),
            'nama_penyakit' => $this->input->post('nama_penyakit'),
            'ket_penyakit' => $this->input->post('ket_penyakit'),
            'solusi' => $this->input->post('solusi'),


        ];
        if ($url_gambar != "") {
            $set['url_gambar'] = $url_gambar;
        } else {
            $set['url_gambar'] = 'default.png';
        }
        $insert = $this->db->insert($this->table_name, $set);
        if ($insert) {
            $this->session->set_flashdata("success_message", "Data Berhasil di Tambahkan");
        } else {
            $this->session->set_flashdata("error_message", "Data Gagal di Tambahkan");
        }
    }
    public function update($id_penyakit, $url_gambar)
    {
        $set = [
            'kode_penyakit' => $this->input->post('kode_penyakit'),
            'nama_penyakit' => $this->input->post('nama_penyakit'),
            'ket_penyakit' => $this->input->post('ket_penyakit'),
            'solusi' => $this->input->post('solusi'),

        ];
        if ($url_gambar != "") {
            $set['url_gambar'] = $url_gambar;
        }
        $this->db->where("id_penyakit", $id_penyakit);
        $update = $this->db->update($this->table_name, $set);
        if ($update) {
            $this->session->set_flashdata("success_message", "Data Berhasil di Ubah");
        } else {
            $this->session->set_flashdata("error_message", "Data Gagal di Ubah");
        }
    }
    function delete($id_penyakit)
    {
        $hasil = $this->db->query("DELETE FROM konsultasi WHERE id_penyakit ='$id_penyakit'");
        return $hasil;
    }
}
