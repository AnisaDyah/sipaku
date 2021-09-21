<?php

class M_login extends CI_Model
{

    var $table_name = "user";

    function cek_login($table, $where)
    {
        return $this->db->get_where($table, $where);
    }

    public function register()
    {
        $set = [
            'username' => $this->input->post('username'),
            'password' => md5($this->input->post('password')),
            'alamat' => $this->input->post('alamat')
        ];
        $insert = $this->db->insert($this->table_name, $set);
        if ($insert) {
            $this->session->set_flashdata("success_message", "Data Berhasil di Tambahkan");
        } else {
            $this->session->set_flashdata("error_message", "Data Gagal di Tambahkan");
        }
    }
}
