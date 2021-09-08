<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Solusi extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_solusi');
		$this->load->model('M_hp');
	}
	
	public function index()
	{
		$solusi['data']=$this->M_solusi->show_solusi();
		$solusi['data_hp']=$this->M_hp->show_hp();
		$this->load->view('admin/indexsolusi',$solusi);
	}

	public function simpan_solusi()
	{
		$kd_solusi=$this->input->post('kd_solusi');
		$fk_hamapenyakit=$this->input->post('id_hamapenyakit');
		$solusi=$this->input->post('solusi');
		$this->M_solusi->simpan_solusi($kd_solusi,$fk_hamapenyakit,$solusi);
		redirect('Solusi');
	}

	public function edit_solusi()
	{
		$kd_solusi=$this->input->post('kd_solusi');
		$fk_hamapenyakit=$this->input->post('id_hamapenyakit');
		$solusi=$this->input->post('solusi');
		$id_solusi = $this->input->post('id_solusi');
		$this->M_solusi->edit_solusi($kd_solusi,$fk_hamapenyakit,$solusi,$id_solusi);
		redirect('Solusi');
	}

	public function hapus_solusi()
	{
		$kd_solusi=$this->input->post('kd_solusi');
		$this->M_solusi->hapus_solusi($kd_solusi);
		redirect('Solusi');
	}
}
?>