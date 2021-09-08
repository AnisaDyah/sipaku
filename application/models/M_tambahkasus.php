<?php

class M_tambahkasus extends CI_Model
{
    public function show_tk()
    {
		$hasil=$this->db->query("SELECT * FROM basiskasus");
		return $hasil;
	}
}
?>