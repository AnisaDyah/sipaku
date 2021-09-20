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

	public function insert_hasil_diagnosa($diagnosa, $detail)
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

	public function riwayat_diagnosa()
	{
		//script buat joinin tabel biar bisa berelasi dengan tabel penyakit dan bisa munculin nama penyakitnya
		$db_kasus = $this->db
			->select('*')
			//->selectRaw("diagnosa.*, mst_penyakit.*, user.*")
			->join('mst_penyakit', 'mst_penyakit.id_penyakit = diagnosa.id_penyakit')
			->join('user', 'user.id_user = diagnosa.id_user')
			->get('diagnosa');
		return $db_kasus;
	}

	public function show_basis()
	{
		$hasil = $this->db->query("SELECT DISTINCT * FROM basis_kasus INNER JOIN mst_penyakit on basis_kasus.id_penyakit = mst_penyakit.id_penyakit order by id_bk");
		return $hasil;
	}

	public function input_data($data, $table)
	{
		$this->db->insert($table, $data);
	}

	public function getDetail()
	{
		$query = $this->db->query("SELECT kode_penyakit, kode_gejala FROM basis_kasus INNER JOIN mst_penyakit on basis_kasus.id_penyakit = mst_penyakit.id_penyakit inner join mst_gejala on basis_kasus.id_gejala = mst_gejala.id_gejala");
		return $query->result();
	}


	public function show_hp()
	{
		$hasil = $this->db->query("SELECT * FROM penyakit");
		return $hasil;
	}

	public function show_gejala()
	{
		$hasil = $this->db->query("SELECT * FROM gejala");
		return $hasil;
	}

	public function simpan_kasus($data)
	{
		$this->db->insert('basis_kasus', $data);
		$hasil = $this->db->insert_id();
		return $hasil;
	}

	public function simpan_detail($data)
	{
		$this->db->insert('detail_kasus', $data);
		$hasil = $this->db->insert_id();
		return $hasil;
	}

	public function update_kasus($id_bk, $data)
	{
		$this->db->where('id_bk', $id_bk);
		return $this->db->update('basis_kasus', $data);
	}

	public function update_detail($id_bk, $id_gejala, $data)
	{
		$this->db->where('fk_kasus', $id_bk);
		$this->db->where('fk_gejala', $id_gejala);
		return $this->db->update('detail_kasus', $data);
	}

	function hapus_kasus($id_kasus)
	{
		$hasil = $this->db->query("DELETE FROM basis_kasus WHERE id_bk ='$id_kasus'");
		return $hasil;
	}

	function hapus_detail($id_detail)
	{
		$hasil = $this->db->query("DELETE FROM detail_kasus WHERE id_detailkasus ='$id_detail'");
		return $hasil;
	}
}
