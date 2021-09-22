<?php
defined('BASEPATH') or exit('No direct script access allowed');
class UserModel extends CI_Model
{
    var $table_name = "user";

    public function get()
    {
        $this->db->select("*");
        //$this->db->from($this->table_name);
        $this->db->join('hak_akses', 'hak_akses.id_akses = user.fk_akses');
        $query = $this->db->get('user');
        //var_dump($this->db->error());
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
            'no_hp' => $this->input->post('no_hp'),
            'alamat' => $this->input->post('alamat'),
            'tgl_lahir' => $this->input->post('tgl_lahir'),
            'nama_lengkap' => $this->input->post('nama_lengkap'),
            'fk_akses' => $this->input->post('id_akses'),

        ];
        $insert = $this->db->insert($this->table_name, $set);
        //var_dump($this->db->error());
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
            'username' => $this->input->post('username'),
            'no_hp' => $this->input->post('no_hp'),
            'alamat' => $this->input->post('alamat'),
            'tgl_lahir' => $this->input->post('tgl_lahir'),
            'nama_lengkap' => $this->input->post('nama_lengkap'),
            'fk_akses' => $this->input->post('id_akses'),
        ];
        if ($this->input->post("password") != "") {
            $set['password'] = md5($this->input->post("password"));
        }
        $this->db->where("id_user", $id_user);
        $update = $this->db->update($this->table_name, $set);
        //var_dump($this->db->error());
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
