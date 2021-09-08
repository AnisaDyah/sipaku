<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_diagnosa extends CI_Model 
{
    public function show($id)
    {
        $this->db->where('id_user', $id);
        return $this->db->get('user')->row();
    }

	public function diagnosa()
	{
        return $this->db->get('gejala');
    }  
    
    public function getDetail()
	{
		$query = $this->db->query("SELECT * FROM detail_kasus inner join bobot on detail_kasus.fk_bobot = bobot.id_bobot");
		return $query->result();
	}

	public function joinPerhitungan()
	{
		//script buat joinin tabel biar bisa berelasi dengan tabel penyakit dan bisa munculin nama penyakitnya
		$db_kasus = $this->db
			->select('*')
            ->join('hamapenyakit', 'basiskasus.fk_hamapenyakit = hamapenyakit.id_hamapenyakit')
			->get('basiskasus');
		return $db_kasus->result();
	}   
}