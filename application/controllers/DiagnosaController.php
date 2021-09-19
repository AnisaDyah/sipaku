<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DiagnosaController extends CI_Controller {

	public function __construct()
	{
        parent::__construct();
        if($this->session->userdata('status') != "login"){
			redirect(base_url("Login"));
		}
        $this->load->model('GejalaModel');
        $this->load->model('BasisKasusModel');
        $this->load->model('M_Penyakit');
        $this->load->library('session');
        $this->load->library('pdf');
        $this->data = array(
            'basis_kasus_updated' => []
        );
        
        
    }

    public function index()
	{
        $diagnosa['data'] = $this->GejalaModel->tampil_gejala()->result_array();
        $data = $diagnosa['data'];
        delete_cookie("hasil_diagnosa");
        //var_dump($diagnosa['data']);
        //$this->session->sess_create();
		$this->load->view('header');
        $this->load->view('users/pilih_gejala',$diagnosa);
        $this->load->view('footer');
    }
    
    public function diagnosa()
	{
        //get gejala setiap penyakit
		$basis_kasus =$this->BasisKasusModel->get_basis_kasus();

        //get data dari form user
        $data_kasus_baru = $this->input->post('gejala');
        //var_dump($data_kasus_baru);

        $nilai_presentase=[];
        $gejala_selected_all=[];
        $data_ketemu=[];
        foreach ($basis_kasus as $key => $value) {

            $id_gejala_all=[];

            //var_dump($value['id_penyakit']);
            foreach ($value['gejala'][0] as $va) {
                array_push($id_gejala_all,$va['id_gejala']);
            }
            
            $result=array_intersect($id_gejala_all,$data_kasus_baru);
            //var_dump($result);
            
            if(count($result) > 0){
                $basis_kasus_byid =$this->BasisKasusModel->get_basis_kasus_byid($value['id_penyakit']);
                $gejala_selected[$value['id_penyakit']] = [];
                foreach ($basis_kasus_byid as $ke => $val) {
                    foreach ($data_kasus_baru as $va) {
                        if($val['id_gejala'] === $va){
                            array_push($gejala_selected[$value['id_penyakit']],$val);
                            //$gejala_selected[$value['id_penyakit']]=$val;
                        }
                    }
                }
                $gejala_selected_all[$value['id_penyakit']]=$gejala_selected[$value['id_penyakit']];
                $perhitungan_fc = (count($gejala_selected[$value['id_penyakit']])/count($basis_kasus_byid)) * 100;
                //echo $perhitungan_fc;
                if($perhitungan_fc > 50){
                    //array_push($nilai_presentase), $perhitungan_fc);
                    $nilai_presentase[$value['id_penyakit']]= $perhitungan_fc;
                }
                
                //echo var_dump($nilai_presentase);
                if(count($nilai_presentase) != 0){
                    array_push($data_ketemu,true);
                    if(count($nilai_presentase) > 1){
                        $maksimal = max($nilai_presentase);
                        $maxKey = array_search($maksimal, $nilai_presentase);
                    }else{
                        $maksimal = array_values($nilai_presentase)[0]; 
                        $maxKey = array_search($maksimal, $nilai_presentase);
                    //echo array_values($nilai_presentase)[0];                    
                    }
                }
                // else{
                //     //data tidak ditemukan
                //    // array_push($data_ketemu,false);
                // }
            }
        }
        //var_dump($data_ketemu);

        if(count($data_ketemu) >0){
            $penyakit_terpilih = $this->M_Penyakit->get_id($maxKey);
            $penyakit_terpilih->perhitungan_fc=$maksimal;
            $penyakit_terpilih->gejala_selected=$gejala_selected_all[$maxKey];
        
            $cookie= array(
                'name'   => 'hasil_diagnosa',
                'value'  => json_encode($penyakit_terpilih),                            
                'expire' => '3600',                                                                                   
                'secure' => true
            );
            $this->input->set_cookie($cookie);

            $this->load->view('header');
            $this->load->view('users/hasil_diagnosa',$penyakit_terpilih);
            $this->load->view('footer');
        }else{
            //pop up data tidak ktemu
            $this->session->set_flashdata('notif', '<div class="alert alert-danger alert-dismissible"> Gagal! Diagnosa tidak ditemukan</div>');
            redirect('DiagnosaController/');
        }
    }

    public function get_pdf_test(){
        $today = new DateTime('today');
        $where = array(
			'id_user' => $this->session->userdata('id_user')
        );
        $this->load->model('M_login');
        $data_user = $this->M_login->cek_login("user",$where)->result_array();
        $umur = $today->diff($data_user[0]['tgl_lahir'])->y;
        $data = array(
            "dataku" => array(
                "nama" => $data_user[0]['username'],
                "url" => "http://petanikode.com",
                "alamat" => $data_user[0]['alamat'],
                "no_hp" => $data_user[0]['no_hp'],
            )
        );
    
        $this->load->library('pdf');
    
        $this->pdf->setPaper('A4', 'potrait');
        $this->pdf->filename = "laporan-petanikode.pdf";
        $this->pdf->load_view('users/laporan', $data);
    }

    public function cetak_diagnosa(){

        $today = date("Y-m-d");
        $where = array(
            'id_user' => $this->session->userdata('id_user')
        );
        $this->load->model('M_login');
        $data_user = $this->M_login->cek_login("user",$where)->result_array();
        $tgl_lahir = $data_user[0]['tgl_lahir'];
        $umur = substr($today,0,4) - substr($tgl_lahir,0,4);
        
        $data_diagnosa= json_decode($this->input->cookie('hasil_diagnosa',true));
        $this->insert_hasil_diagnosa($data_diagnosa);
        $data = array(
            "user" => array(
                "username" => $data_user[0]['username'],
                "alamat" => $data_user[0]['alamat'],
                "no_hp" => $data_user[0]['no_hp'],
                "umur" => $umur,
                "tanggal" => date("Y-m-d")
            ),
            "penyakit_terpilih" => $data_diagnosa
        );
    
        $this->load->library('pdf');
    
        $this->pdf->setPaper('A4', 'potrait');
        $this->pdf->filename = "hasil-diagnosa.pdf";
        $this->pdf->load_view('users/laporan_pdf', $data);
    }

    public function insert_hasil_diagnosa($data)
	{
		$detail = $data->gejala_selected;
		$diagnosa = [
            'id_penyakit' => $data->id_penyakit,
            'id_user' => $this->session->userdata('id_user'),
            'bobot' => $data->perhitungan_fc,
            'tgl_diagnosa' => date("Y-m-d"),
		];
			
        $this->BasisKasusModel->insert_hasil_diagnosa($diagnosa, $detail);
			
	}

	
	
}
?>