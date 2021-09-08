<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Riwayatdiagnosa extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_riwayatdiagnosa');
        $this->load->helper('url');
    }

	public function index()
	{
		$this->load->model('M_riwayatdiagnosa');
		$data['konsul']=$this->M_riwayatdiagnosa->riwayat_diagnosa();
		$this->load->view('admin/indexriwayat',$data);
	}

	public function hapus_rd()
	{
		$id_konsultasi=$this->input->post('id_konsultasi');
		$this->M_riwayatdiagnosa->hapus_rd($id_konsultasi);
		redirect('Riwayatdiagnosa');
	}

}
?>