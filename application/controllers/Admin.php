<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    function __construct(){
		parent::__construct();
	
		if($this->session->userdata('status') != "login"){
			redirect(base_url("Login"));
		}
	}
    
	public function index()
	{
		$this->load->view('admin/home');
		//coaba comiit lagi
		var_dump("coba coba");
    }

}

?>