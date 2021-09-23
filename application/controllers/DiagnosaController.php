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
        $this->load->model('PenyakitModel');
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
		$this->load->view('header');
        $this->load->view('users/pilih_gejala',$diagnosa);
        $this->load->view('footer');
    }
    
    public function diagnosa()
	{
        //get gejala setiap penyakit dari db
		$basis_kasus =$this->BasisKasusModel->get_basis_kasus();

        //get data yang dipilih dari user
        $data_kasus_baru = $this->input->post('gejala');
        //var_dump($data_kasus_baru);

        $nilai_presentase=[];
        $gejala_selected_all=[];
        $data_ketemu=[];
        foreach ($basis_kasus as $key => $value) {

            $id_gejala_all=[];

            //kumpulkan id gejala dalam array
            foreach ($value['gejala'][0] as $va) {
                array_push($id_gejala_all,$va['id_gejala']);
            }
            
            //mencocokan nilai array id_gejala (dari db) dan id_gejala (yg dipilih user)
            $result=array_intersect($id_gejala_all,$data_kasus_baru);
            //var_dump($result);
            
            //jika ada gejala yang cocok
            if(count($result) > 0){
                //maka ambil penyakit yang memiliki gejala tersebut
                $basis_kasus_byid =$this->BasisKasusModel->get_basis_kasus_byid($value['id_penyakit']);

                //ambil data gejala sesuai gejala yang dipilih user simpan dalam gejala_selected
                //gejala_selected['id_penyakit] untuk menyimpan gejala sesuai id penyakit
                $gejala_selected[$value['id_penyakit']] = [];
                foreach ($basis_kasus_byid as $ke => $val) {
                    foreach ($data_kasus_baru as $va) {
                        if($val['id_gejala'] === $va){
                            array_push($gejala_selected[$value['id_penyakit']],$val);
                            //$gejala_selected[$value['id_penyakit']]=$val;
                        }
                    }
                }

                //gejala_selected_all untuk menyimpan semua gejala dari banyak penyakit
                $gejala_selected_all[$value['id_penyakit']]=$gejala_selected[$value['id_penyakit']];

                //hitung nilai presentase kemiripin gejala yang dialami user dengan rule dari pakar
                $perhitungan_fc = (count($gejala_selected[$value['id_penyakit']])/count($basis_kasus_byid)) * 100;
                //echo $perhitungan_fc;

                //jika presentase lebih dari 50% maka penyakit akan terpilih sebagai dugaan diagnosa 
                if($perhitungan_fc >= 50){
                    //array_push($nilai_presentase), $perhitungan_fc);
                    $nilai_presentase[$value['id_penyakit']]= $perhitungan_fc;
                }
                
                //echo var_dump($nilai_presentase);
                if(count($nilai_presentase) != 0){
                    array_push($data_ketemu,true);
                    // jika ada lebih dari 1 penyakit yang menjadi dugaan diagnnosa maka akan dicari nilai presentase terbesar
                    if(count($nilai_presentase) > 1){
                        $maksimal = max($nilai_presentase);
                        $maxKey = array_search($maksimal, $nilai_presentase);
                    }else{
                        //jika hanya ada satu penyakit maka penyakit tersebut akan terpilih sebagai diagnosa
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

        //jika data penyakit ditemukan maka tampilkan hasil diagnosa beserta informasi lainnya
        if(count($data_ketemu) >0){
            $penyakit_terpilih = $this->PenyakitModel->get_id($maxKey);
            $penyakit_terpilih->perhitungan_fc=round($maksimal,2);
            $penyakit_terpilih->gejala_selected=$gejala_selected_all[$maxKey];
        
            //kirim hasil diagnosa ke dalam cookie untuk disimpan sementara 
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
            //jika data tidak ditemukan maka akan ad notifikasi berikut
            $this->session->set_flashdata('notif', '<div class="alert alert-danger alert-dismissible"> Gagal! Diagnosa tidak ditemukan</div>');
            redirect('DiagnosaController/');
        }
    }

//fungsi untuk cetak hasil diagnosa kedalam pdf
    public function cetak_diagnosa(){
        
        $today = date("Y-m-d");
        $where = array(
            'id_user' => $this->session->userdata('id_user')
        );
        $this->load->model('M_login');
        $data_user = $this->M_login->cek_login("user",$where)->result_array();
        $tgl_lahir = $data_user[0]['tgl_lahir'];
        $umur = substr($today,0,4) - substr($tgl_lahir,0,4);
        
        //ambil data hasil diagnosa dari cookie yang sudah disimpan tadi
        $data_diagnosa= json_decode($this->input->cookie('hasil_diagnosa',true));
        //ketika user cetak hasil diagnosa, maka otomatis hasil diagnosa akan trsimpan kedalam db sebagai riwayat diagnosa
        $this->insert_hasil_diagnosa($data_diagnosa);
        $data = array(
            "user" => array(
                "nama_lengkap" => $data_user[0]['nama_lengkap'],
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


    //simpan riwayat diagnosa kedalam db
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