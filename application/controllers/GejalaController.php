<?php
defined('BASEPATH') or exit('No direct script access allowed');

class GejalaController extends CI_Controller
{
	var $c_name = "GejalaController";

	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('status') != "login") {
			redirect(base_url("Login"));
		}
		$this->load->model('GejalaModel');
		$this->load->library('form_validation');
	}
	public function index()
	{
		$dataheader = [];
		$data = [
			'c_name' => $this->c_name,
			'data' => $this->GejalaModel->get(),
		];
		$this->load->view('admin/template/header', $dataheader);
		$this->load->view('admin/gejala/index', $data);
	}
	public function insert()
	{
		$dataheader = [];
		$data = [
			'c_name' => $this->c_name,
		];

		$this->form_validation->set_rules('kode_gejala', "kode_gejala", "required");
		$this->form_validation->set_rules('nama_gejala', "nama_gejala", "required");
		$this->form_validation->set_rules('ket_gejala', "ket_gejala", "required");

		if ($this->form_validation->run() == false) {
			$this->load->view('admin/template/header', $dataheader);
			$this->load->view('admin/gejala/insert', $data);
		} else {
			$this->GejalaModel->insert();
			redirect($this->c_name, 'refresh');
		}
	}
	public function update($id_gejala)
	{
		$dataheader = [];
		$data = [
			'c_name' => $this->c_name,
			'gejala' => $this->GejalaModel->get_id($id_gejala),
		];

		$this->form_validation->set_rules('kode_gejala', "kode_gejala", "required");
		$this->form_validation->set_rules('nama_gejala', "nama_gejala", "required");
		$this->form_validation->set_rules('ket_gejala', "ket_gejala", "required");

		if ($this->form_validation->run() == false) {
			$this->load->view('admin/template/header', $dataheader);
			$this->load->view('admin/gejala/update', $data);
		} else {
			$this->GejalaModel->update($id_gejala);
			redirect($this->c_name, 'refresh');
		}
	}
	public function delete($id_gejala)
	{
		$this->GejalaModel->delete($id_gejala);
		redirect($this->c_name, 'refresh');
	}
}
