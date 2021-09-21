<?php

class RegisterModel extends CI_Model
{

    public function login($username, $password)
    {
        // Validasi
        $this->db->where('username', $username);
        $this->db->where('password', $password);

        $result = $this->db->get('user');


        if ($result->num_rows() == 1) {
            return $result->row(0);
        } else {
            return false;
        }
    }
}
