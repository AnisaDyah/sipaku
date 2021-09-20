<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PenyakitController extends CI_Controller
{
	var $c_name = "PenyakitController";

	public function __construct()
	{
		parent::__construct();
		if($this->session->userdata('status') != "login"){
			redirect(base_url("Login"));
		}
		$this->load->model('PenyakitModel');
		$this->load->library('form_validation');
	}
	public function index()
	{
		$dataheader = [];
		$data = [
			'c_name' => $this->c_name,
			'data' => $this->PenyakitModel->get(),
		];



		$this->load->view('admin/template/header', $dataheader);
		$this->load->view('admin/penyakit/index', $data);
	}
	public function insert()
	{
		$dataheader = [];
		$data = [
			'c_name' => $this->c_name,
		];



		$this->form_validation->set_rules('kode_penyakit', "kode_penyakit", "required");
		$this->form_validation->set_rules('nama_penyakit', "nama_penyakit", "required");
		$this->form_validation->set_rules('ket_penyakit', "ket_penyakit", "required");
		$this->form_validation->set_rules('solusi', "solusi", "required");

		if ($this->form_validation->run() == false) {
			$this->load->view('admin/template/header', $dataheader);
			$this->load->view('admin/penyakit/insert', $data);
		} else {
			$config['upload_path'] = './assets/upload/';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size']  = '3000';
			$config['max_width']  = '10240';
			$config['max_height']  = '7680';

			$this->load->library('upload', $config);
			$Is_error = false;
			if ($_FILES['gambar']['name'] != "") {
				if (!$this->upload->do_upload('gambar')) {
					$data['error'] = $this->upload->display_errors();
					$Is_error = true;
				} else {
					$gambar = $this->upload->data('file_name');
				}
			} else {
				$gambar = "";
			}

			if ($Is_error) {
				$this->load->view('admin/template/header', $dataheader);
				$this->load->view('admin/penyakit/insert', $data);
			} else {
				$this->PenyakitModel->insert($gambar);
				redirect($this->c_name, 'refresh');
			}
		}
	}
	public function update($id_penyakit)
	{
		$dataheader = [];
		$data = [
			'c_name' => $this->c_name,
			'penyakit' => $this->PenyakitModel->get_id($id_penyakit),
		];
		$this->form_validation->set_rules('kode_penyakit', "kode_penyakit", "required");
		$this->form_validation->set_rules('nama_penyakit', "nama_penyakit", "required");
		$this->form_validation->set_rules('ket_penyakit', "ket_penyakit", "required");
		$this->form_validation->set_rules('solusi', "solusi", "required");



		if ($this->form_validation->run() == false) {
			$this->load->view('admin/template/header', $dataheader);
			$this->load->view('admin/penyakit/update', $data);
		} else {
			$config['upload_path'] = './assets/upload/';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size']  = '3000';
			$config['max_width']  = '10240';
			$config['max_height']  = '7680';

			$this->load->library('upload', $config);
			$Is_error = false;
			if ($_FILES['gambar']['name'] != "") {
				if (!$this->upload->do_upload('gambar')) {
					$data['error'] = $this->upload->display_errors();
					$Is_error = true;
				} else {
					$gambar = $this->upload->data('file_name');
				}
			} else {
				$gambar = "";
			}

			if ($Is_error) {
				$this->load->view('admin/template/header', $dataheader);
				$this->load->view('admin/penyakit/update', $data);
			} else {
				$this->PenyakitModel->update($id_penyakit, $gambar);
				redirect($this->c_name, 'refresh');
			}
		}
	}
	public function delete($id_penyakit)
	{
		$this->PenyakitModel->delete($id_penyakit);
		redirect($this->c_name, 'refresh');
	}
}
