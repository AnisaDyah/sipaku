<?php
defined('BASEPATH') or exit('No direct script access allowed');

class KasusController extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('KasusModel');
		$this->load->helper('url');
		$this->load->library('form_validation');
	}

	public function index()
	{
		$dataheader = [];
		$this->load->model('KasusModel');
		//$basis_kasus = $this->KasusModel->kasus()->result();
		$basis_kasus =$this->KasusModel->get_basis_kasus();
		$data['kasus'] = $basis_kasus;
		//var_dump($data['konsul']);
		$this->load->view('admin/kasus/index', $data);
	}

	public function insert()
	{
		$kasus['data'] = $this->KasusModel->show_penyakit();
		$kasus['gejala'] = $this->KasusModel->show_gejala();

		$this->load->view('admin/kasus/insert', $kasus);
	}

	public function simpan_kasus()
	{

		$this->form_validation->set_rules('id_penyakit', "ID Penyakit", "required|is_unique[basis_kasus.id_penyakit]");
		
		if ($this->form_validation->run() == true) {
			$id_penyakit = $this->input->post('id_penyakit');
			$id_gejala = $this->input->post('gejala');
	
			$data1 = array(
				'id_gejala' => $id_gejala,
				'id_penyakit' => $id_penyakit
			);
	
			$id = $this->KasusModel->insert($data1);
			redirect(base_url("KasusController/"), 'refresh');
		} else {
			//var_dump(validation_errors());
			$this->session->set_flashdata('error', validation_errors());
			redirect(base_url("KasusController/insert"));
		}

	}
	public function update_kasus($id_penyakit)
	{
		$id_gejala = $this->input->post('gejala');
		//$id_penyakit = $this->input->post('idpen$id_penyakit');
		$data2 = array(

			'id_gejala' => $id_gejala,
			'id_penyakit' => $id_penyakit
		);
		$this->KasusModel->update_detail($data2);
		redirect(base_url("KasusController/"), 'refresh');
	}

	public function update($id_penyakit)
	{

		$gejala = $this->KasusModel->show_gejala();
		$gejala_checked =$this->KasusModel->get_basis_kasus_byid($id_penyakit);
		$gejala_new=[];
		foreach ($gejala->result_array() as $v) {
			foreach ($gejala_checked as $ke => $val) {
			  $id_gejala=$val['id_gejala']; 
			  if($v['id_gejala'] == $id_gejala){ 
				  $v['checked']=true; 
			  }
			}
			array_push($gejala_new,$v);
		}
		$kasus['data'] = $this->KasusModel->show_penyakit();
		$kasus['gejala'] = $gejala_new;
		$kasus['id_penyakit'] = $id_penyakit;

		// var_dump($kasus['data']);
		$this->load->view('admin/kasus/update', $kasus);
	}



	public function delete($id_penyakit)
	{
		$this->KasusModel->delete($id_penyakit);
		redirect('KasusController', 'refresh');
	}

}
