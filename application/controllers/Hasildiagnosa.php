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
		$kasus = $this->M_diagnosa->getDetail();//get gejala tiap kasus

		$data_kasus = [];
		foreach ($kasus as $key => $value) {
			$data_kasus[$value->fk_kasus][$value->fk_gejala] = $value->bobot;//get bobot dari setiap gejala di kasus lama
		}

		$data_kasus_baru = $this->input->post('gejala');
		if($data_kasus_baru>0){
		$data_bobot_kasus_tiap_penyakit = []; //variabel save hasil
		foreach ($data_kasus_baru as $gejala) {
			foreach ($data_kasus as $key_kasus => $value) {
				foreach ($value as $key_gejala => $bobot) {
					if ($key_gejala == $gejala) {
						$data_bobot_kasus_tiap_penyakit[$key_kasus][$gejala] = $bobot; 
						//S X W nya, kalau antara data gejala kasus baru sama dengan data gejala kasus lama maka nilai data_bobot_kasus_tiap_penyakitnya sama dengan bobot gejala kasus lama yang sama
					} else {
						if (!isset($data_bobot_kasus_tiap_penyakit[$key_kasus][$gejala])) {
							$data_bobot_kasus_tiap_penyakit[$key_kasus][$gejala] = 0; //if beda bobot = 0
						}
					}
				}
			}
		}
		// var_dump($data_bobot_kasus_tiap_penyakit);

		$sum_kasus_lama = []; //save nilai/hasil lama
		foreach ($data_kasus as $key => $value) {
			$sum_kasus_lama[$key] = array_sum($value); //sum bobot gejala kasus lama (sum data_kasus yang di script pertama)
		}

		$sum_kasus_baru = []; //save nilai/hasil baru
		foreach ($data_bobot_kasus_tiap_penyakit as $key => $value) {
			$sum_kasus_baru[$key] = array_sum($value); //sum bobot data gejala = 1
		}

		$nilai_sim_untuk_tiap_kasus = []; //save nilai/hasil
		foreach ($sum_kasus_baru as $key => $value) {
			$nilai_sim_untuk_tiap_kasus[$key] = $sum_kasus_baru[$key] / $sum_kasus_lama[$key];
			//proses retrieve(S1 X W1 + S2 X W2 + .... + Sn X Wn) / W1 + W2 + .... + Wn
		}

		$nilai_sim_percent = []; //save nilai/hasil
		// $sum = array_sum($nilai_sim_untuk_tiap_kasus);
		foreach ($nilai_sim_untuk_tiap_kasus as $key => $value) {
			/*menjadikan persen */
			$nilai_sim_percent[$key] = $value * 100;
			// $nilai = number_format($nilai_sim_percent,2);
		}

		#grant varible for view 

		$var_table_perhitungan = [];
		foreach ($data_kasus as $key => $value) { //show tabel perhitungan
			$var_table_perhitungan[$key] = [
				'gejala_kasus' => count($value),
				'gejala_dipilih' => count($data_kasus_baru),
				'gejala_cocok' => count(array_filter($data_bobot_kasus_tiap_penyakit[$key])),
				'sum_gejala' => $sum_kasus_baru[$key],
				'pembagi' => $sum_kasus_lama[$key],
				'hasil' => number_format($nilai_sim_untuk_tiap_kasus[$key],2)
			];
		}

		$db_kasus = $this->M_diagnosa->joinPerhitungan();

		$data_kasus_penyakit = [];
		foreach ($db_kasus as $key => $value) {
			$data_kasus_penyakit[$value->id_basiskasus] = $value;
		}

		//show hasil penyakit & presentase
		$var_hasil_analisa_penyakit = [];
		foreach ($db_kasus as $key => $value) {
			$var_hasil_analisa_penyakit[$key] = [
				'penyakit' => $value->nama_hamapenyakit,
				'persentase' => number_format($nilai_sim_percent[$value->id_basiskasus],2)
			];
		}

		$var_kemungkinan_penyakit_yang_diderita = [];
		foreach ($db_kasus as $key => $value) {
			$var_kemungkinan_penyakit_yang_diderita[$value->id_basiskasus] = [
				'penyakit' => $value->nama_hamapenyakit,
				'id_penyakit' => $value->id_hamapenyakit,
				'keterangan' => $value->keterangan,
				'solusi' => $value->solusi,
				'persentase' => number_format($nilai_sim_percent[$value->id_basiskasus],2)
			];
			$persen= number_format(max($nilai_sim_percent),2);
		}

		//show data dg presentase tinggi
		$max_key_kasus = array_keys($nilai_sim_percent, max($nilai_sim_percent));

		$var_kemungkinan_penyakit_yang_diderita_maxed = [];
		foreach ($max_key_kasus as $key => $value) {
			$var_kemungkinan_penyakit_yang_diderita_maxed[] = $var_kemungkinan_penyakit_yang_diderita[$value];
		}
		##sv db
		foreach($var_kemungkinan_penyakit_yang_diderita_maxed as $key => $value){
			$id_hamapenyakit = $value['id_penyakit'];
		}
		//presentase tinggi disimpan di db
		foreach ($max_key_kasus as $key => $value) {
			$set_pemeriksaan = [
				'tgl_pemeriksaan' => date("Y-m-d"),
				'status' => ($var_kemungkinan_penyakit_yang_diderita[$value]['persentase'] >= 50 ? 1 : 2),
				'fk_hamapenyakit' => $data_kasus_penyakit[$value]->fk_hamapenyakit,
				'hasil' => $var_kemungkinan_penyakit_yang_diderita[$value]['persentase']
			];
		}

		$data['table_perhitungan'] = $var_table_perhitungan;
		$data['hasil_analisa_penyakit'] = $var_hasil_analisa_penyakit;
		
		$data['kemungkinan_penyakit_yang_diderita'] = $var_kemungkinan_penyakit_yang_diderita_maxed;
		$data['gejala'] = $data_kasus_baru;
		
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
                foreach($data_kasus_baru as $key){
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
                foreach($data_kasus_baru as $key){
                $data3[] = array(
                    'fk_konsul' => $id_order,
                    'fk_gejala' => $key
                ); }
            $this->M_riwayatdiagnosa->insert_detail_riwayat($data3);
		}
	}
		//$data['tes'] = $data1;
		$this->load->view('hasildiagnosa',$data);
	}else{
		$this->load->model('M_diagnosa');
		$this->session->set_flashdata('message', 'Gejala belum diisi');
		$diagnosa['data'] = $this->M_diagnosa->diagnosa()->result_array();
		$this->load->view('diagnosa',$diagnosa);
	}
		// var_dump($data);
	}

}
?>