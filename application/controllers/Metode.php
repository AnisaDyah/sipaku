<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HasilDiagnosa extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_diagnosa');
    }

	public function index()
	{
		$diagnosa['data'] = $this->M_diagnosa->diagnosa()->result_array();
		$this->load->view('hasildiagnosa',$diagnosa);
	}
	
	public function diagnosa()
	{
		$kasus = $this->M_diagnosa->getDetail();

		$data_kasus = [];
		foreach ($kasus as $key => $value) {
			$data_kasus[$value->fk_kasus][$value->fk_gejala] = 1;
		}

		$data_kbaru = $this->input->post('gejala');
		if($data_kbaru>0){
		$data_bobot_kasus = [];
		foreach ($data_kbaru as $gejala) {
			foreach ($data_kasus as $key_kasus => $value) {
				foreach ($value as $key_gejala => $bobot) {
					if ($key_gejala == $gejala) {
						$data_bobot_kasus[$key_kasus][$gejala] = $bobot; 
					} else {
						if (!isset($data_bobot_kasus[$key_kasus][$gejala])) {
							$data_bobot_kasus[$key_kasus][$gejala] = 0;
						}
					}
				}
			}
		}

		$sum_kl = [];
		foreach ($data_kasus as $key => $value) {
			$sum_kl[$key] = array_sum($value);
		}

		$sum_kb = [];
		foreach ($data_bobot_kasus as $key => $value) {
			$sum_kb[$key] = array_sum($value);
		}

		$nilai_sim_untuk_tiap_kasus = [];
		foreach ($sum_kb as $key => $value) {
			$nilai_sim_untuk_tiap_kasus[$key] = $sum_kb[$key] / $sum_kl[$key];
		}

		$nilai_sim_percent = [];
		foreach ($nilai_sim_untuk_tiap_kasus as $key => $value)
		{
			$nilai_sim_percent[$key] = $value * 100;
		}

		$var_table_perhitungan = [];
		foreach ($data_kasus as $key => $value)
		{
			$var_table_perhitungan[$key] = [
				'gejala_kasus' => count($value),
				'gejala_dipilih' => count($data_kbaru),
				'gejala_cocok' => count(array_filter($data_bobot_kasus[$key])),
				'sum_gejala' => $sum_kb[$key],
				'pembagi' => $sum_kl[$key],
				'hasil' => number_format($nilai_sim_untuk_tiap_kasus[$key],2)
			];
		}

		$db_kasus = $this->M_diagnosa->joinPerhitungan();

		$data_kasus_penyakit = [];
		foreach ($db_kasus as $key => $value) {
			$data_kasus_penyakit[$value->id_basiskasus] = $value;
		}

		$var_hasil_diagnosa = [];
		foreach ($db_kasus as $key => $value) {
			$var_hasil_diagnosa[$key] = [
				'penyakit' => $value->nama_hamapenyakit,
				'persentase' => number_format($nilai_sim_percent[$value->id_basiskasus],2)
			];
		}

		$var_hasil_penyakit = [];
		foreach ($db_kasus as $key => $value) {
			$var_hasil_penyakit[$value->id_basiskasus] = [
				'penyakit' => $value->nama_hamapenyakit,
				'id_penyakit' => $value->id_hamapenyakit,
				'keterangan' => $value->keterangan,
				'solusi' => $value->solusi,
				'persentase' => number_format($nilai_sim_percent[$value->id_basiskasus],2)
			];
			$persen= number_format(max($nilai_sim_percent),2);
		}

		$max_key_kasus = array_keys($nilai_sim_percent, max($nilai_sim_percent));

		$var_hasil_penyakit_maxed = [];
		foreach ($max_key_kasus as $key => $value) {
			$var_hasil_penyakit_maxed[] = $var_hasil_penyakit[$value];
		}
		foreach($var_hasil_penyakit_maxed as $key => $value){
			$id_hamapenyakit = $value['id_penyakit'];
		}

		foreach ($max_key_kasus as $key => $value) {
			$set_pemeriksaan = [
				'tgl_pemeriksaan' => date("Y-m-d"),
				'status' => ($var_hasil_penyakit[$value]['persentase'] >= 50 ? 1 : 2),
				'fk_hamapenyakit' => $data_kasus_penyakit[$value]->fk_hamapenyakit,
				'hasil' => $var_hasil_penyakit[$value]['persentase']
			];
		}

		$data['table_perhitungan'] = $var_table_perhitungan;
		$data['hasil_analisa_penyakit'] = $var_hasil_diagnosa;
		
		$data['kemungkinan_penyakit_yang_diderita'] = $var_hasil_penyakit_maxed;
		$data['gejala'] = $data_kbaru;
		
		$data['kasus'] = $nilai_sim_untuk_tiap_kasus;
		$data['persen'] = $nilai_sim_percent;

		iF($persen < 50){
			$this->load->model('M_revisi');
			$datenow=date('Y-m-d');
			$data1 = array();
			$data1[] = array(
				'id_hamapenyakit' => $id_hamapenyakit,
				'tanggal' => date('Y-m-d'),
				'persentase' => $persen
			);

		    if($id_order = $this->M_revisi->insert_revise($id_hamapenyakit,$datenow,$persen)){
                $data2 = array();
                foreach($data_kbaru as $key){
                $data2[] = array(
                    'fk_revise' => $id_order,
                    'fk_gejala' => $key
                ); }
            $this->M_revisi->insert_detail_revise($data2);
			}

		}else{
			$this->load->model('M_riwayatdiagnosa');
			$datenow=date('Y-m-d');
			

		    if($id_order = $this->M_riwayatdiagnosa->insert_riwayat($id_hamapenyakit,$datenow,$persen)){
                $data3 = array();
                foreach($data_kbaru as $key){
                $data3[] = array(
                    'fk_konsul' => $id_order,
                    'fk_gejala' => $key
                ); }
            $this->M_riwayatdiagnosa->insert_detail_riwayat($data3);
		}
	}
	
		$this->load->view('hasildiagnosa',$data);
	}else{
		$this->load->model('M_diagnosa');
		$this->session->set_flashdata('message', 'Gejala belum diisi');
		$diagnosa['data'] = $this->M_diagnosa->diagnosa()->result_array();
		$this->load->view('diagnosa',$diagnosa);
	}
	}

}
?>