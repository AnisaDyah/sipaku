<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    function __construct(){
		parent::__construct();
	
		if($this->session->userdata('status') != "login"){
			redirect(base_url("Login"));
		}
		$this->load->model('PenyakitModel');
		$this->load->model('GejalaModel');
		$this->load->model('BasisKasusModel');
	}
    
	public function index()
	{
		$this->load->view('admin/home');
		//var_dump($this->session->userdata());
	}
	
	function clear_cache()
    {
        $this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate, no-transform, max-age=0, post-check=0, pre-check=0");
        $this->output->set_header("Pragma: no-cache");
    }

}

?>