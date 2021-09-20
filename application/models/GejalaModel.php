<?php

class GejalaModel extends CI_Model
{
	var $table_name = "mst_gejala";

	public function tampil_gejala()
	{
		$hasil = $this->db->query("SELECT * FROM mst_gejala ORDER BY 'ASC' ");
		return $hasil;
	}

	public function get()
	{
		$this->db->select("*");
		$this->db->from($this->table_name);
		$query = $this->db->get();
		return $query->result();
	}

	public function get_id_gejala($id_gejala)
	{
		$id_gejala = $this->db->query("SELECT id_gejala FROM mst_gejala where id_gejala='$id_gejala'");
		return $id_gejala;
	}
	public function get_id($id_gejala)
	{
		$this->db->select("*");
		$this->db->from($this->table_name);
		$this->db->where("id_gejala", $id_gejala);
		$query = $this->db->get();
		return $query->row(0);
	}

	public function insert()
	{
		$set = [
			'kode_gejala' => $this->input->post('kode_gejala'),
			'nama_gejala' => $this->input->post('nama_gejala'),
			'ket_gejala' => $this->input->post('ket_gejala')
		];
		$insert = $this->db->insert($this->table_name, $set);
		if ($insert) {
			$this->session->set_flashdata("success_message", "Data Berhasil di Tambahkan");
		} else {
			$this->session->set_flashdata("error_message", "Data Gagal di Tambahkan");
		}
	}
	public function update($id_gejala)
	{
		$set = [
			'kode_gejala' => $this->input->post('kode_gejala'),
			'nama_gejala' => $this->input->post('nama_gejala'),
			'ket_gejala' => $this->input->post('ket_gejala')
		];

		$this->db->where("id_gejala", $id_gejala);
		$update = $this->db->update($this->table_name, $set);
		if ($update) {
			$this->session->set_flashdata("success_message", "Data Berhasil di Ubah");
		} else {
			$this->session->set_flashdata("error_message", "Data Gagal di Ubah");
		}
	}
	public function delete($id_gejala)
	{
		$this->db->where('id_gejala', $id_gejala);
		$delete = $this->db->delete($this->table_name);
		if ($delete) {
			$this->session->set_flashdata("success_message", "Data Berhasil di Hapus");
		} else {
			$this->session->set_flashdata("error_message", "Data Gagal di Hapus");
		}
	}

	public function getTotal()
    {
        return $this->db->count_all('mst_gejala');
    }
}
