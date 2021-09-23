<?php
defined('BASEPATH') or exit('No direct script access allowed');

class BasisKasusModel extends CI_Model
{
	public function get_basis_kasus()
	{
		$penyakit = $this->db->query("SELECT * FROM mst_penyakit ORDER BY 'ASC' ")->result_array();

		$new_penyakit = [];
		foreach ($penyakit as $value) {
			$value['gejala'] = [];
			$gejala = $this->db->select('mst_gejala.*')
				->join('mst_gejala', 'mst_gejala.id_gejala = basis_kasus.id_gejala')
				->join('mst_penyakit', 'mst_penyakit.id_penyakit = basis_kasus.id_penyakit')
				->where('basis_kasus.id_penyakit', $value['id_penyakit'])
				->get('basis_kasus')->result_array();

			array_push($value['gejala'], $gejala);
			array_push($new_penyakit, $value);
		}
		return $new_penyakit;
	}

	public function get_basis_kasus_byid($id_penyakit)
	{

		$basis_kasus = $this->db->select('mst_gejala.*')
			->join('mst_gejala', 'mst_gejala.id_gejala = basis_kasus.id_gejala')
			->join('mst_penyakit', 'mst_penyakit.id_penyakit = basis_kasus.id_penyakit')
			->where('basis_kasus.id_penyakit', $id_penyakit)
			->get('basis_kasus')->result_array();

		return $basis_kasus;
	}

	public function insert_hasil_diagnosa($diagnosa, $detail)
	{
		$insert_diagnosa = $this->db->insert("diagnosa", $diagnosa);
		//var_dump($this->db->error());
		$data_insert = array();
		foreach ($detail as $value) {
			//var_dump($value);
			$data = array(
				'id_diagnosa' => $this->db->insert_id(),
				'id_gejala' => $value->id_gejala,
			);
			array_push($data_insert, $data);
		}
		$insert_detail_diagnosa = $this->db->insert_batch("detail_diagnosa", $data_insert);
	}

	public function riwayat_diagnosa()
	{
		//script buat joinin tabel biar bisa berelasi dengan tabel penyakit dan bisa munculin nama penyakitnya
		$db_kasus = $this->db
			->select('*')
			//->selectRaw("diagnosa.*, mst_penyakit.*, user.*")
			->join('mst_penyakit', 'mst_penyakit.id_penyakit = diagnosa.id_penyakit')
			->join('user', 'user.id_user = diagnosa.id_user')
			->order_by("id_diagnosa", "desc")
			->get('diagnosa');
		return $db_kasus;
	}

	//export excel
	public function export_diagnosa($tgl_awal, $tgl_akhir)
	{
		$db_diagnosa = $this->db
		->select('*')
		->join('mst_penyakit', 'mst_penyakit.id_penyakit = diagnosa.id_penyakit')
		->join('user', 'user.id_user = diagnosa.id_user')
		->where('tgl_diagnosa BETWEEN "'.$tgl_awal.'" AND "'.$tgl_akhir.'"')
		->order_by('tgl_diagnosa', 'ASC')
		->get('diagnosa')->result();
		return $db_diagnosa;
	}
	
	public function getTotal()
    {
        return $this->db->count_all('diagnosa');
    }
}
