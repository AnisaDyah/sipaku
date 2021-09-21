<?php
defined('BASEPATH') or exit('No direct script access allowed');

class KasusController extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('KasusModel');
		$this->load->helper('url');
	}

	public function index()
	{
		$dataheader = [];
		$this->load->model('KasusModel');
		$basis_kasus = $this->KasusModel->kasus()->result();
		$data['kasus'] = $basis_kasus;
		//var_dump($data['konsul']);
		$this->load->view('admin/kasus/index', $data);
	}

	public function insert()
	{
		$kasus['data'] = $this->KasusModel->show_penyakit();
		$kasus['gejala'] = $this->KasusModel->show_gejala();

		$this->load->view('admin/kasus/insert', $kasus);
	}

	public function simpan_kasus()
	{
		$id_penyakit = $this->input->post('id_penyakit');
		$id_gejala = $this->input->post('id_gejala');
		$data1 = array(
			'id_gejala' => $id_gejala,
			'id_penyakit' => $id_penyakit
		);

		$id = $this->KasusModel->simpan_kasus($data1);

		// var_dump($id);

	}
	public function update_kasus()
	{
		$id_gejala = $this->input->post('id_gejala');
		$id_penyakit = $this->input->post('idpen$id_penyakit');
		$data2 = array(

			'id_gejala' => $id_gejala,
			'id_penyakit' => $id_penyakit
		);
		$this->KasusModel->update_detail($data2);
	}

	public function update($id_bk)
	{
		$kasus['data'] = $this->KasusModel->kasus();
		// var_dump($kasus['data']);
		$this->load->view('kasus/update', $kasus);
	}



	public function delete($id_bk)
	{
		$this->KasusModel->delete($id_bk);
		redirect('KasusController', 'refresh');
	}
}
