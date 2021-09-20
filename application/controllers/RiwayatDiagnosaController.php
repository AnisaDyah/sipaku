<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RiwayatDiagnosaController extends CI_Controller {

	public function __construct()
	{
        parent::__construct();
        if($this->session->userdata('status') != "login"){
			redirect(base_url("Login"));
		}
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

    public function cetak()
	{
        $tgl_awal = date_format(date_create($this->input->post('tgl_awal')), 'Y-m-d');
        $tgl_akhir = date_format(date_create($this->input->post('tgl_akhir')), 'Y-m-d');
        //echo $tgl_awal;
    if($tgl_akhir > $tgl_awal){

        $data['riwayat_diagnosa'] = $this->BasisKasusModel->export_diagnosa($tgl_awal, $tgl_akhir);
        
        //var_dump($data['riwayat_diagnosa']);
        if(count($data['riwayat_diagnosa'])>0){
            $this->load->view('admin/riwayat/excel_riwayat', $data);
        }else{
            $this->session->set_flashdata('message', 'Data Tidak Ditemukan');
            redirect('RiwayatDiagnosaController/');
        }
    }else{
        $this->session->set_flashdata('message', 'Data Tidak Ditemukan');
        redirect('RiwayatDiagnosaController/');
    }

	}

}
?>