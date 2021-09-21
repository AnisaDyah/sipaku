<?php
defined('BASEPATH') or exit('No direct script access allowed');

class KasusModel extends CI_Model
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
	public function input_data($data, $table)
	{
		$this->db->insert($table, $data);
	}



	public function kasus()
	{
		//script buat joinin tabel biar bisa berelasi dengan tabel penyakit dan bisa munculin nama penyakitnya
		$db_kasus = $this->db
			->select('*')
			//->selectRaw("diagnosa.*, mst_penyakit.*, user.*")
			->join('mst_penyakit', 'mst_penyakit.id_penyakit = basis_kasus.id_penyakit')
			->join('mst_gejala', 'mst_gejala.id_gejala = basis_kasus.id_gejala')
			->get('basis_kasus');
		return $db_kasus;
	}
	public function show_basis()
	{
		$hasil = $this->db->query("SELECT DISTINCT * FROM basis_kasus INNER JOIN mst_penyakit on basis_kasus.id_penyakit = basis_kasus.id_penyakit order by id_bk");

		return $hasil;
	}
	public function show_penyakit()
	{
		$hasil = $this->db->query("SELECT * FROM mst_penyakit");
		return $hasil;
	}

	public function show_gejala()
	{
		$hasil = $this->db->query("SELECT * FROM mst_gejala");
		return $hasil;
	}
	public function update_kasus($id_bk, $data)
	{
		$this->db->where('id_bk', $id_bk);
		return $this->db->update('basis_kasus', $data);
	}

	public function update_detail($id_penyakit, $id_gejala, $data)
	{
		$this->db->where('id_penyakit', $id_penyakit);
		$this->db->where('id_gejala', $id_gejala);
		return $this->db->update('basis_kasus', $data);
	}


	public function insert($diagnosa, $detail)
	{
		$insert_diagnosa = $this->db->insert("diagnosa", $diagnosa);
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

	public function delete($id_bk)
	{
		$this->db->where('id_bk', $id_bk);
		$delete = $this->db->delete($this->table_name);
		if ($delete) {
			$this->session->set_flashdata("success_message", "Data Berhasil di Hapus");
		} else {
			$this->session->set_flashdata("error_message", "Data Gagal di Hapus");
		}
	}
}
