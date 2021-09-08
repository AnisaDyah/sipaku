<?php

class M_solusi extends CI_Model
{
    public function show_solusi()
    {
		$hasil=$this->db->query("SELECT * FROM solusi INNER JOIN hamapenyakit on solusi.fk_hamapenyakit = hamapenyakit.id_hamapenyakit");
		return $hasil;
	}

    public function simpan_solusi($kd_solusi,$fk_hamapenyakit,$solusi)
    {
		$hasil=$this->db->query("INSERT INTO solusi (kd_solusi,fk_hamapenyakit,solusi)
        VALUES ('$kd_solusi','$fk_hamapenyakit','$solusi')");
		return $hasil;
	}

    public function edit_solusi($kd_solusi,$fk_hamapenyakit,$solusi,$id_solusi)
    {
		$hasil=$this->db->query
		("UPDATE solusi SET fk_hamapenyakit='$fk_hamapenyakit', solusi='$solusi',kd_solusi='$kd_solusi' WHERE id_solusi='$id_solusi'");
		return $hasil;
	}

    function hapus_solusi($kd_solusi)
    {
		$hasil=$this->db->query("DELETE FROM solusi WHERE kd_solusi ='$kd_solusi'");
		return $hasil;
    }
}
?>