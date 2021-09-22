<?php
defined('BASEPATH') or exit('No direct script access allowed');

class RegisterController extends CI_Controller
{
	var $c_name = "RegisterController";
	public function __construct()
	{
		parent::__construct();
		$this->load->model('RegisterModel');
		$this->load->library('form_validation');
		$this->load->library('session');
	}

	public function index()
	{
		$this->load->view('header');
		$this->load->view('register');
		$this->load->view('footer');
	}
	public function proses()
	{
		$this->form_validation->set_rules('username', "Username", "required|alpha_numeric|min_length[6]|is_unique[user.username]");
		$this->form_validation->set_rules('password', "Password", "required|min_length[6]");
		$this->form_validation->set_rules('alamat', "alamat", "required");
		$this->form_validation->set_rules('no_hp', "No HP", "required|integer|min_length[11]");
		$this->form_validation->set_rules('tgl_lahir', "Tanggal Lahir", "required");
		$this->form_validation->set_rules('nama_lengkap', "Nama Lengkap", "required");


		if ($this->form_validation->run() == true) {
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			$alamat = $this->input->post('alamat');
			$this->RegisterModel->register($username, $password, $alamat);
			$this->session->set_flashdata('success_register', 'Proses Pendaftaran User Berhasil');
			redirect('Login');
		} else {
			$this->session->set_flashdata('error', validation_errors());
			redirect($this->c_name, 'refresh');
		}
	}
}
