<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Basis extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_basis');
        $this->load->helper('url');
    }

	public function index()
	{
		$this->load->model('M_basis');
		$basis['data']=$this->M_basis->show_basis();
		$this->load->view('admin/indexbasis',$basis);
	}

	public function create()
    {
		$diagnosa['data'] = $this->M_basis->show_hp();
		$diagnosa['gejala'] = $this->M_basis->show_gejala();

        $this->load->view('admin/indexbasis_create',$diagnosa);
	}
	
	public function simpan_kasus()
	{
		$kd_basiskasus=$this->input->post('kd_kasus');
		$fk_hamapenyakit=$this->input->post('id_hamapenyakit');
		$id_gejala=$this->input->post('gejala');
		$id_bobot = $this->input->post('bobot');
		$data1 = array(
			'kd_kasus' => $kd_basiskasus,
			'fk_hamapenyakit' => $fk_hamapenyakit
		);

		$id = $this->M_basis->simpan_kasus($data1);

		// var_dump($id);

		foreach ($id_gejala as $key => $value) {
			if(array_key_exists($key, $id_bobot)){
				$data2 = array(
				'fk_kasus' => $id,
				'fk_gejala' => $id_gejala[$key],
				'fk_bobot' => $id_bobot[$key]
			);
				$id2 = $this->M_basis->simpan_detail($data2);
				$this->session->set_flashdata('notif', '<div class="alert alert-success alert-dismissible"> Sukses! data berhasil disimpan didatabase.</div>');
			}else{
				$this->M_basis->hapus_kasus($id);
				echo '<script language="javascript">';
				echo 'alert("Pilih bobot sesuai dengan gejala yang anda masukkan");';
				echo 'window.history.back();';
				echo '</script>';
				break;
			}
		}

		if( isset($id2)){
			redirect('Basis');
		}
    }

    public function hp_kasus($id)
    {
    	// $id_basiskasus=$this->input->post('id_basiskasus');
		$fk_hamapenyakit=$this->input->post('id_hamapenyakit');

		// var_dump($fk_hamapenyakit);

		$data = array('fk_hamapenyakit' => $fk_hamapenyakit);

		$this->M_basis->update_kasus($id,$data);

		// var_dump($this->M_basis->update_kasus($id_basiskasus,$data));


		redirect('Basis');
    }
    
    public function update_kasus()
	{
        $id_basiskasus=$this->input->post('id_basiskasus');
		$kd_kasus=$this->input->post('kd_kasus');
		$fk_hamapenyakit=$this->input->post('id_hamapenyakit');
		$id_gejala=$this->input->post('id_gejala');
		$id_bobot = $this->input->post('id_bobot');
		$data2 = array(
				'fk_kasus' => $id_basiskasus,
				'fk_gejala' => $id_gejala,
				'fk_bobot' => $id_bobot
		);
			$id2 = $this->M_basis->simpan_detail($data2);

			$this->update($id_basiskasus);
    }

	public function update($id)
    {
		$diagnosa['data'] = $this->M_basis->getWhere($id);
		// var_dump($diagnosa['data']);
		$this->load->view('admin/indexbasis_update',$diagnosa);
	}

	public function hapus_basis()
	{
		$id_kasus=$this->input->post('id_basiskasus');
		$this->M_basis->hapus_kasus($id_kasus);
		$this->session->set_flashdata
		('notif', '<div class="alert alert-success alert-dismissible"> Sukses! data berhasil dihapus didatabase.</div>');
		redirect('Basis');
	}

	public function hapus_detail($id_detail,$id_kasus)
	{
		// $id_kasus=$this->input->post('id_basiskasus');
		$this->M_basis->hapus_detail($id_detail);
		$this->session->set_flashdata
		('notif', '<div class="alert alert-success alert-dismissible"> Sukses! data berhasil dihapus didatabase.</div>');
		$this->update($id_kasus);
	}
	
	

}
?>