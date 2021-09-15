<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Penyakit extends CI_Controller
{

	var $c_name = "penyakit";

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_Penyakit');
	}

	public function index()
	{
		$data['data'] = $this->M_Penyakit->get();
		$this->load->view('admin/penyakit/index', $data);
	}

	public function insert()
	{
		$data = [
			'kode_penyakit' => $this->input->post('kode_penyakit'),
			'nama_penyakit' => $this->input->post('nama_penyakit'),
			'ket_penyakit' => $this->input->post('ket_penyakit'),
			'solusi' => $this->input->post('solusi'),
			'url_gambar' => $this->input->post('url_gambar')

		];

		$this->form_validation->set_rules('kode_penyakit', 'kode_penyakit', 'required');
		$this->form_validation->set_rules('nama_penyakit', 'nama_penyakit', 'required');
		$this->form_validation->set_rules('ket_penyakit', 'ket_penyakit', 'required');
		$this->form_validation->set_rules('solusi', 'solusi', 'required');

		if ($this->form_validation->run() == false) {
			$this->load->view('admin/penyakit/insert', $data);
		} else {
			$config['upload_path'] = './assets/upload/';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size']  = '3000';
			$config['max_width']  = '10240';
			$config['max_height']  = '7680';

			$this->load->library('upload', $config);
			$Is_error = false;
			if ($_FILES['$url_gambar']['name'] != "") {
				if (!$this->upload->do_upload('$url_gambar')) {
					$data['error'] = $this->upload->display_errors();
					$Is_error = true;
				} else {
					$url_gambar = $this->upload->data('file_name');
				}
			} else {
				$url_gambar = "";
			}

			if ($Is_error) {

				$this->load->view('admin/penyakit/insert', $data);
			} else {
				$this->M_Penyakit->insert($url_gambar);
				redirect('Penyakit/', 'refresh');
			}
		}
	}

	public function update($id_penyakit)
	{
		$data = [
			'kode_penyakit' => $this->input->post('kode_penyakit'),
			'nama_penyakit' => $this->input->post('nama_penyakit'),
			'ket_penyakit' => $this->input->post('ket_penyakit'),
			'solusi' => $this->input->post('solusi'),
			'url_gambar' => $this->input->post('url_gambar'),


			'penyakit' => $this->M_Penyakit->get_id($id_penyakit),
		];
		$this->form_validation->set_rules('kode_penyakit', 'kode_penyakit', 'required');
		$this->form_validation->set_rules('nama_penyakit', 'nama_penyakit', 'required');
		$this->form_validation->set_rules('ket_penyakit', 'ket_penyakit', 'required');
		$this->form_validation->set_rules('solusi', 'solusi', 'required');


		if ($this->form_validation->run() == false) {

			$this->load->view('admin/penyakit/update', $data);
		} else {
			$config['upload_path'] = './aseets/upload/';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size']  = '3000';
			$config['max_width']  = '10240';
			$config['max_height']  = '7680';

			$this->load->library('upload', $config);
			$Is_error = false;
			if ($_FILES['url_gambar']['name'] != "") {
				if (!$this->upload->do_upload('url_gambar')) {
					$data['error'] = $this->upload->display_errors();
					$Is_error = true;
				} else {
					$url_gambar = $this->upload->data('file_name');
				}
			} else {
				$gambar = "";
			}

			if ($Is_error) {

				$this->load->view('admin/penyakit/update', $data);
			} else {
				$this->M_Penyakit->update($id_penyakit, $url_gambar);
				redirect('Penyakit/', 'refresh');
			}
		}
	}

	public function delete($id_penyakit)
	{
		$this->M_Penyakit->delete($id_penyakit);
		redirect('admin/' . $this->c_name, 'refresh');
	}
}
