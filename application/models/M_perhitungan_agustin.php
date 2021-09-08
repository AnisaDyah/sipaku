<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_Perhitungan_agustin extends CI_Model {

	public function getPerhitunganQueryObject()
	{
		$query = $this->db->query("SELECT * FROM detail_kasus");
		return $query->result();
	}

	public function joinPerhitungan()
	{
		//script buat joinin tabel biar bisa berelasi dengan tabel penyakit dan bisa munculin nama penyakitnya
		$db_kasus = $this->db
			->select('*')
			->join('penyakit', 'basis_kasus.fk_penyakit = penyakit.id_penyakit')
			->get('basis_kasus');
		return $db_kasus->result();
	}

	public function insertPemeriksaan($data)
	{
		//ini buat nyimpan ke database pemeriksaan
		$this->db->insert('pemeriksaan', $data);
	}

	public function insertDetailPemeriksaan($data)
	{
		//ini buat nyimpan ke database detail pemeriksaan
		$this->db->insert('detail_pemeriksaan', $data);
	}
}