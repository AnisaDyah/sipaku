<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hamapenyakit extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_hp');
	}

	public function index()
	{
		$data['data']=$this->M_hp->tampil_hp();
		$this->load->view('admin/indexhp',$data);
	}

	public function simpan_hp()
	{		
		$kd_hamapenyakit=$this->input->post('kd_hamapenyakit');
		$nama_hamapenyakit=$this->input->post('nama_hamapenyakit');
		$keterangan=$this->input->post('keterangan');
		$solusi=$this->input->post('solusi');

		$config['upload_path'] = './assets/upload/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
		$config['file_name']	= $this->nama_hamapenyakit;
		$config['overwrite'] = true;
		$config['max_size']  = 1000000000;
		$config['max_width']  = 10240;
		$config['max_height']  = 7680;
		
		$this->load->library('upload', $config);
		
		if ( !$this->upload->do_upload('file'))
		{
			$error = array('error' => $this->upload->display_errors());
			$this->load->view('admin/indexhp', $error);
		}
		
		else
		{
			$upload_data = $this->upload->data();
			$file_name = $upload_data['file_name'];
			$this->M_hp->simpan_hp($kd_hamapenyakit,$nama_hamapenyakit,$file_name,$keterangan,$solusi);
			$this->session->set_flashdata('notif', '<div class="alert alert-success alert-dismissible"> Sukses! data berhasil disimpan didatabase.</div>');
		
			redirect('Hamapenyakit');
		}
	}

	public function edit_hp()
	{
		$id_hamapenyakit=$this->input->post('id_hamapenyakit');
		$kd_hamapenyakit=$this->input->post('kd_hamapenyakit');
		$nama_hamapenyakit=$this->input->post('nama_hamapenyakit');
		$keterangan=$this->input->post('keterangan');
		$solusi=$this->input->post('solusi');

		$config['upload_path'] = './assets/upload/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
		$config['max_size']  = 1000000000;
		$config['max_width']  = 10240;
		$config['max_height']  = 7680;
		
		$this->load->library('upload', $config);
		
		if ( !$this->upload->do_upload('file'))
		{
			$error = array('error' => $this->upload->display_errors());
			$this->load->view('admin/indexhp', $error);
		}
		else
		{
			$upload_data = $this->upload->data();
			$file_name = $upload_data['file_name'];
		$this->M_hp->edit_hp($id_hamapenyakit,$kd_hamapenyakit,$nama_hamapenyakit,$file_name,$keterangan,$solusi);
		$this->session->set_flashdata
		('notif', '<div class="alert alert-success alert-dismissible"> Sukses! data berhasil diubah didatabase.</div>');
		redirect('Hamapenyakit');
		}
	}

	public function hapus_hp()
	{
		$kd_hamapenyakit=$this->input->post('kd_hamapenyakit');
		$this->M_hp->hapus_hp($kd_hamapenyakit);
		$this->session->set_flashdata
		('notif', '<div class="alert alert-success alert-dismissible"> Sukses! data berhasil dihapus didatabase.</div>');
		redirect('Hamapenyakit');
	}
}
?>