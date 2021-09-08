<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gejala extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_gejala');
	}
	
	public function index()
	{
		$gejala['data']=$this->M_gejala->tampil_gejala();
		$this->load->view('admin/indexgejala',$gejala);
	}

	public function simpan_gejala()
	{
		$kd_gejala=$this->input->post('kd_gejala');
		$nama_gejala=$this->input->post('nama_gejala');
		$this->M_gejala->simpan_gejala($kd_gejala,$nama_gejala);
		$this->session->set_flashdata
		('notif', '<div class="alert alert-success alert-dismissible"> Sukses! data berhasil disimpan didatabase.</div>');
		redirect('Gejala');
	}

	public function edit_gejala()
	{
		$id_gejala=$this->input->post('id_gejala');
		$kd_gejala=$this->input->post('kd_gejala');
		$nama_gejala=$this->input->post('nama_gejala');
		$this->M_gejala->edit_gejala($id_gejala,$kd_gejala,$nama_gejala);
		$this->session->set_flashdata
		('notif', '<div class="alert alert-success alert-dismissible"> Sukses! data berhasil diubah didatabase.</div>');
		redirect('Gejala');
	}

	public function hapus_gejala()
	{
		$kd_gejala=$this->input->post('kd_gejala');
		$this->M_gejala->hapus_gejala($kd_gejala);
		$this->session->set_flashdata
		('notif', '<div class="alert alert-success alert-dismissible"> Sukses! data berhasil dihapus didatabase.</div>');
		redirect('Gejala');
	}
}
?>