<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_login');
	}

	public function index()
	{
		$this->load->view('header');
		$this->load->view('login');
		$this->load->view('footer');
	}

	public function aksi_login()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$where = array(
			'username' => $username,
			'password' => md5($password)
		);
		$cek = $this->M_login->cek_login("user", $where)->num_rows();
		if ($cek > 0) {
			$data_user = $this->M_login->cek_login("user", $where)->result_array();
			$data_session = array(
				'id_user' => $data_user[0]['id_user'],
				'nama' => $username,
				'status' => "login"
			);

			$this->session->set_userdata($data_session);

			if ($data_user[0]['id_akses'] == 1) {
				redirect(base_url("Admin"));
			} else {
				redirect(base_url("DiagnosaController"));
			}
		} else {
			echo "Username dan password salah !";
			redirect(base_url("Login"));
		}
	}

	public function register()
	{
		$this->form_validation->set_rules('username', "Username", "required|alpha_numeric|min_length[6]");
		$this->form_validation->set_rules('password', "Password", "required|min_length[6]");
		$this->form_validation->set_rules('alamat', "alamat", "required");



		if ($this->form_validation->run() == true) {
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			$alamat = $this->input->post('alamat');
			$this->M_login->register($username, $password, $alamat);
			$this->session->set_flashdata('success_register', 'Proses Pendaftaran User Berhasil');
			redirect(base_url("DiagnosaController"));
		} else {
			$this->session->set_flashdata('error', validation_errors());
			redirect(base_url("Login"));
		}
	}



	public function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url('Dashboard'));
	}
}
