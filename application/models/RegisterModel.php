<?php

class RegisterModel extends CI_Model
{

    var $table_name = "user";

    function register($username, $password, $no_hp, $alamat)
    {
        $data = array(
            'username' => $username,
            'password' => password_hash($password, PASSWORD_DEFAULT),
            'no_hp' => $no_hp,
            'alamat' => $alamat
        );
        $this->db->insert('user', $data);
    }

    public function insert()
    {
        $set = [
            'no_hp' => $this->input->post('no_hp'),
            'alamat' => $this->input->post('alamat'),
            'username' => $this->input->post('username'),
            'password' => md5($this->input->post('password')),
            'id_akses' => '2',
        ];
        $insert = $this->db->insert($this->table_name, $set);
        if ($insert) {
            $this->session->set_flashdata("success_message", "Data Berhasil di Tambahkan");
        } else {
            $this->session->set_flashdata("error_message", "Data Gagal di Tambahkan");
        }
    }
}
