<?php
defined('BASEPATH') or exit('No direct script access allowed');

class UserController extends CI_Controller
{
	var $c_name = "UserController";

	public function __construct()
	{
		parent::__construct();
		$this->load->model('UserModel');
		$this->load->library('form_validation');
	}
	public function index()
	{
		$dataheader = [];
		$data = [
			'c_name' => $this->c_name,
			'data' => $this->UserModel->get(),
		];
		$this->load->view('admin/template/header', $dataheader);
		$this->load->view('admin/user/index', $data);
	}
	public function insert()
	{
		$dataheader = [];
		$data = [
			'c_name' => $this->c_name,
		];
		$this->form_validation->set_rules('username', "username", "required|alpha_numeric|min_length[4]");
		$this->form_validation->set_rules('password', "password", "required|min_length[4]");
		$this->form_validation->set_rules('re-password', "Ketik Ulang Password", "required|matches[password]");
		$this->form_validation->set_rules('no_hp', "no_hp", "required");
		$this->form_validation->set_rules('alamat', "alamat", "required");
		$this->form_validation->set_rules('tgl_lahir', "tgl_lahir", "required");



		if ($this->form_validation->run() == false) {
			$this->load->view('admin/template/header', $dataheader);
			$this->load->view('admin/user/insert', $data);
		} else {
			$this->UserModel->insert();
			redirect($this->c_name, 'refresh');
		}
	}
	public function update($id_user)
	{
		$dataheader = [];
		$data = [
			'c_name' => $this->c_name,
			'user' => $this->UserModel->get_id($id_user),
		];

		$this->form_validation->set_rules('username', "username", "required|alpha_numeric|min_length[4]");
		$this->form_validation->set_rules('no_hp', "no_hp", "required");
		$this->form_validation->set_rules('alamat', "alamat", "required");

		if ($this->input->post('password') != "") {
			$this->form_validation->set_rules('password', "password", "min_length[4]");
			$this->form_validation->set_rules('re-password', "Ketik Ulang Password", "required|matches[password]");
		}

		if ($this->form_validation->run() == false) {
			$this->load->view('admin/template/header', $dataheader);
			$this->load->view('admin/user/update', $data);
		} else {
			$this->UserModel->update($id_user);
			redirect($this->c_name, 'refresh');
		}
	}
	public function delete($id_user)
	{
		$this->UserModel->delete($id_user);
		redirect($this->c_name, 'refresh');
	}
}
