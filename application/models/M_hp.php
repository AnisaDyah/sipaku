<?php

class M_hp extends CI_Model
{
    public function tampil_hp()
    {
		$hasil=$this->db->query("SELECT * FROM hamapenyakit");
		return $hasil;
	}

	public function simpan_hp($kd_hamapenyakit,$nama_hamapenyakit,$gambar,$keterangan,$solusi)
    {
		$hasil=$this->db->query("INSERT INTO hamapenyakit (kd_hamapenyakit,nama_hamapenyakit,gambar,keterangan,solusi) 
		VALUES ('$kd_hamapenyakit','$nama_hamapenyakit','$gambar','$keterangan','$solusi')");
		return $hasil;
	}

	public function edit_hp($id_hamapenyakit,$kd_hamapenyakit,$nama_hamapenyakit,$gambar,$keterangan,$solusi)
    {
		$hasil=$this->db->query("UPDATE hamapenyakit SET kd_hamapenyakit='$kd_hamapenyakit', nama_hamapenyakit='$nama_hamapenyakit', gambar='$gambar',keterangan='$keterangan', solusi='$solusi' WHERE id_hamapenyakit='$id_hamapenyakit'");
		return $hasil;
	}
	
	public function hapus_hp($kd_hamapenyakit)
    {
		$hasil=$this->db->query("DELETE FROM hamapenyakit WHERE kd_hamapenyakit ='$kd_hamapenyakit'");
		return $hasil;
    }
}
?>