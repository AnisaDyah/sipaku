<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BasisKasusModel extends CI_Model 
{
    public function get_basis_kasus()
    {
		$penyakit = $this->db->query("SELECT * FROM mst_penyakit ORDER BY 'ASC' ")->result_array();

		$new_penyakit=[];
		foreach ($penyakit as $value) {
			$value['gejala']=[];
			$gejala= $this->db->select('mst_gejala.*')
			->join('mst_gejala', 'mst_gejala.id_gejala = basis_kasus.id_gejala')
			->join('mst_penyakit', 'mst_penyakit.id_penyakit = basis_kasus.id_penyakit')
			->where('basis_kasus.id_penyakit', $value['id_penyakit'])
			->get('basis_kasus')->result_array();

			array_push($value['gejala'],$gejala);
			array_push($new_penyakit,$value);
		}
		return $new_penyakit;
	}
	
	public function get_basis_kasus_byid($id_penyakit)
    {
		
		$basis_kasus= $this->db->select('mst_gejala.*')
			->join('mst_gejala', 'mst_gejala.id_gejala = basis_kasus.id_gejala')
			->join('mst_penyakit', 'mst_penyakit.id_penyakit = basis_kasus.id_penyakit')
			->where('basis_kasus.id_penyakit', $id_penyakit)
			->get('basis_kasus')->result_array();

		return $basis_kasus;
    }

	// public function diagnosa()
	// {
    //     return $this->db->get('gejala');
    // }  
    
    // public function getDetail()
	// {
	// 	$query = $this->db->query("SELECT * FROM detail_kasus inner join bobot on detail_kasus.fk_bobot = bobot.id_bobot");
	// 	return $query->result();
	// }

	// public function joinPerhitungan()
	// {
	// 	//script buat joinin tabel biar bisa berelasi dengan tabel penyakit dan bisa munculin nama penyakitnya
	// 	$db_kasus = $this->db
	// 		->select('*')
    //         ->join('hamapenyakit', 'basiskasus.fk_hamapenyakit = hamapenyakit.id_hamapenyakit')
	// 		->get('basiskasus');
	// 	return $db_kasus->result();
	// }   
}