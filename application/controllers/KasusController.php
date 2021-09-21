<?php
defined('BASEPATH') or exit('No direct script access allowed');

class KasusController extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('KasusModel');
		$this->load->helper('url');
	}

	public function index()
	{
		$dataheader = [];
		$this->load->model('KasusModel');
		$basis_kasus = $this->KasusModel->kasus()->result();
		$data['kasus'] = $basis_kasus;
		//var_dump($data['konsul']);
		$this->load->view('admin/template/header', $dataheader);
		$this->load->view('admin/kasus/index', $data);
	}
}
