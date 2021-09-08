<?php

class M_user extends CI_Model
{
    public function show_user()
    {
		$hasil=$this->db->query("SELECT * FROM user");
		return $hasil;
    }

    public function simpan_user($username,$password)
    {
		$hasil=$this->db->query("INSERT INTO user (username,password) VALUES ('$username','$password')");
		return $hasil;
	}

    public function edit_user($id_user,$username,$password)
    {
		$hasil=$this->db->query("UPDATE user SET username='$username',password='$password' WHERE id_user='$id_user'");
		return $hasil;
    }

    function hapus_user($id_user)
    {
		$hasil=$this->db->query("DELETE FROM user WHERE id_user ='$id_user'");
		return $hasil;
    }
}
?>