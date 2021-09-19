<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RiwayatDiagnosaController extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('BasisKasusModel');
        $this->load->helper('url');
    }

	public function index()
	{
        $this->load->model('BasisKasusModel');
        $diagnosa = $this->BasisKasusModel->riwayat_diagnosa()->result();
        $data['konsul']=$diagnosa;
        //var_dump($data['konsul']);
		$this->load->view('admin/riwayat/index',$data);
	}

	// public function hapus_rd()
	// {
	// 	$id_diagnosa=$this->input->post('id_diagnosa');
	// 	$this->BasisKasusModel->hapus_rd($id_diagnosa);
	// 	redirect('Riwayatdiagnosa');
	// }

}
?>