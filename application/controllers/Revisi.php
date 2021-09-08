<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Revisi extends CI_Controller {


	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_revisi');
		$this->load->model('M_basis');
		$this->load->helper('url');
	}

	public function index()
	{
		$data['revise']=$this->M_revisi->show_revise('Revisi')->result();
		$this->load->view('admin/indexrevisi',$data);
	}

	public function detail($id)
	{
		$data['revise']=$this->M_revisi->show_detail($id);
		$this->load->view('admin/indexrevisi_detail',$data);
	}

	// public function simpan_kasus()
	// {
	// 	// $kd_basiskasus=$this->input->post('kd_kasus');
	// 	$fk_hamapenyakit=$this->input->post('id_hamapenyakit');
	// 	$id_gejala=$this->input->post('gejala');
	// 	$id_bobot = $this->input->post('bobot');
	// 	$kd = $this->db->select('kd_kasus')->from('basiskasus')->order_by('kd_kasus','desc')->get()->result();

	// 	// var_dump($kd[0]->kd_kasus);

	// 	$angka = preg_replace("/[^0-9]/", "", $kd[0]->kd_kasus);

	// 	$angka++;
	// 	$kd_basiskasus = 'K'.$angka;

	// 	// var_dump($kd_basiskasus);

	// 	$data1 = array(
	// 		'kd_kasus' => $kd_basiskasus,
	// 		'fk_hamapenyakit' => $fk_hamapenyakit
	// 	);

	// 	$id = $this->M_basis->simpan_kasus($data1);

	// 	for($i=0;$i<count($id_gejala);$i++){
	// 		$data2 = array(
	// 			'fk_kasus' => $id,
	// 			'fk_gejala' => $id_gejala[$i],
	// 			'fk_bobot' => $id_bobot[$i]
	// 		);

	// 		$this->M_basis->simpan_detail($data2);
	// 	}
	// 	redirect('Basis');
	// }

	public function simpan_kasus()
	{
		$id_re = $this->input->post('id_basiskasus');
		$kd = $this->db->select('id_basiskasus,kd_kasus')->from('basiskasus')->order_by('id_basiskasus','desc')->get()->result();
		if($kd == null){
			$kd_basiskasus = 'K1';

		}else{
			$angka = preg_replace("/K/", "", $kd[0]->kd_kasus);
			$angka++;
			$kd_basiskasus = 'K'.$angka;
		}

		$fk_hamapenyakit=$this->input->post('id_hamapenyakit');
		$id_gejala=$this->input->post('gejala');
		$id_bobot = $this->input->post('bobot');

		// var_dump($id_bobot);
		$data1 = array(
			'kd_kasus' => $kd_basiskasus,
			'fk_hamapenyakit' => $fk_hamapenyakit
		);

		$id = $this->M_basis->simpan_kasus($data1);

		// // var_dump($id);

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
			$this->M_revisi->hapus_revisi($id_re);
		}

		if( isset($id2)){
			redirect('Basis');
		}
	}
	
	public function hapus_revisi()
	{
		$id_re=$this->input->post('id_re');
		$this->M_revisi->hapus_revisi($id_re);
		redirect('Revisi');
	}

}
?>