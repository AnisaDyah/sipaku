<?php
defined('BASEPATH') or exit('No direct script access allowed');
class UserModel extends CI_Model
{
    var $table_name = "user";

    public function get()
    {
        $this->db->select("*");
        $this->db->from($this->table_name);
        $query = $this->db->get();
        return $query->result();
    }
    public function get_id($id_user)
    {
        $this->db->select("*");
        $this->db->from($this->table_name);
        $this->db->where("id_user", $id_user);
        $query = $this->db->get();
        return $query->row(0);
    }
    public function insert()
    {
        $set = [

            'username' => $this->input->post('username'),
            'password' => md5($this->input->post('password')),
            'id_akses' => '2',
            'no_hp' => $this->input->post('no_hp'),
            'alamat' => $this->input->post('alamat'),
        ];
        $insert = $this->db->insert($this->table_name, $set);
        if ($insert) {
            $this->session->set_flashdata("success_message", "Data Berhasil di Tambahkan");
        } else {
            $this->session->set_flashdata("error_message", "Data Gagal di Tambahkan");
        }
    }
    public function hak_akses()
    {
        $query = $this->db->get('hak_akses');
        return $query->result();
    }

    public function update($id_user)
    {
        $set = [
            'nama' => $this->input->post('nama'),
            'username' => $this->input->post('username'),
            'id_akses' => '2',
            'no_hp' => $this->input->post('no_hp'),
            'alamat' => $this->input->post('alamat'),
        ];
        if ($this->input->post("password") != "") {
            $set['password'] = md5($this->input->post("password"));
        }
        $this->db->where("id_user", $id_user);
        $update = $this->db->update($this->table_name, $set);
        if ($update) {
            $this->session->set_flashdata("success_message", "Data Berhasil di Ubah");
        } else {
            $this->session->set_flashdata("error_message", "Data Gagal di Ubah");
        }
    }
    public function delete($id_user)
    {
        $this->db->where('id_user', $id_user);
        $delete = $this->db->delete($this->table_name);
        if ($delete) {
            $this->session->set_flashdata("success_message", "Data Berhasil di Hapus");
        } else {
            $this->session->set_flashdata("error_message", "Data Gagal di Hapus");
        }
    }
}
