<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

    public function __construct()
	{
		parent::__construct();
		$this->load->model('M_user');
	}

	public function index()
	{
		$users['data']=$this->M_user->show_user();
		$this->load->view('admin/indexuser',$users);
    }

	public function simpan_user()
	{
        $username=$this->input->post('username');
		$password=$this->input->post('password');
		$this->M_user->simpan_user($username,$password);
		redirect('Users');
	}

	public function edit_user()
	{
		$id_user=$this->input->post('id_user');
		$username=$this->input->post('username');
		$password=$this->input->post('password');
		$this->M_user->edit_user($id_user,$username,$password);
		redirect('Users');
	}

	public function hapus_user()
	{
		$id_user=$this->input->post('id_user');
		$this->M_user->hapus_user($id_user);
		redirect('Users');
	}

}

?>