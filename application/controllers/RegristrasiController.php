<?php
defined('BASEPATH') or exit('No direct script access allowed');

class RegristrasiController extends CI_Controller
{
	var $c_name = "RegristrasiController";
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
		$this->load->view('registrasi');
		$this->load->view('footer');
	}
	public function proses()
	{
		$this->form_validation->set_rules('username', "username", "required|alpha_numeric|min_length[4]");
		$this->form_validation->set_rules('password', "password", "required|min_length[4]");
		$this->form_validation->set_rules('no_hp', "no_hp", "required");
		$this->form_validation->set_rules('alamat', "alamat", "required");


		if ($this->form_validation->run() == true) {
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			$no_hp = $this->input->post('no_hp');
			$alamat = $this->input->post('alamat');

			$this->RegisterModel->register($username, $password, $no_hp, $alamat);
			$this->session->set_flashdata('success_register', 'Proses Pendaftaran User Berhasil');
			redirect('Login');
		} else {
			$this->session->set_flashdata('error', validation_errors());
			redirect('RegristrasiController');
		}
	}
	public function insert()
	{
		$data = [
			'c_name' => $this->c_name,
		];
		$this->form_validation->set_rules('username', "username", "required|alpha_numeric|min_length[4]");
		$this->form_validation->set_rules('password', "password", "required|min_length[4]");
		$this->form_validation->set_rules('no_hp', "no_hp", "required");
		$this->form_validation->set_rules('alamat', "alamat", "required");


		if ($this->form_validation->run() == false) {
			$this->load->view('registrasi', $data);
		} else {
			$this->RegisterModel->insert();
			redirect('Login');
		}
	}
}
