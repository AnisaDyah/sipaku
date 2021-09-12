<?php

class GejalaModel extends CI_Model
{
    public function tampil_gejala()
    {
		$hasil=$this->db->query("SELECT * FROM mst_gejala ORDER BY 'ASC' ");
		return $hasil;
    }
    
    public function get_id_gejala($id_gejala)
    {
		$id_gejala=$this->db->query("SELECT id_gejala FROM mst_gejala where id_gejala='$id_gejala'");
		return $id_gejala;
	}

    // public function simpan_gejala($kd_gejala,$nama_gejala)
    // {
	// 	$hasil=$this->db->query("INSERT INTO gejala (kd_gejala,nama_gejala) VALUES ('$kd_gejala','$nama_gejala')");
	// 	return $hasil;
	// }

	// public function edit_gejala($id_gejala,$kd_gejala,$nama_gejala)
    // {
	// 	$hasil=$this->db->query("UPDATE gejala SET kd_gejala='$kd_gejala', nama_gejala='$nama_gejala' WHERE id_gejala='$id_gejala'");
	// 	return $hasil;
	// }
	
	// public function hapus_gejala($kd_gejala)
    // {
	// 	$hasil=$this->db->query("DELETE FROM gejala WHERE kd_gejala ='$kd_gejala'");
	// 	return $hasil;
    // }
}
?>