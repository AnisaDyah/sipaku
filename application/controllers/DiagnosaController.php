<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DiagnosaController extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
        $this->load->model('GejalaModel');
        $this->load->model('BasisKasusModel');
        $this->data = array(
            'basis_kasus_updated' => []
        );
        
        
    }

	public function index()
	{
        //load data pertanyaan gejala disini
        $diagnosa['data'] = $this->GejalaModel->tampil_gejala()->result_array();
        //echo var_dump($diagnosa['data'][0]);
        $this->load->view('header');
        $this->load->view('users/halaman_diagnosa',$diagnosa['data'][0]);
        $this->load->view('footer');
        $this->data['basis_kasus_updated']=[];

        //ambil basis kasus saat pertama diagnosa
    }
    
    

    public function cek_diagnosa($param, $id_gejala)
	{
        
        //cek jawaban user ya/tidak
        //$basis_kasus =$this->get_basis_kasus();
        if($param == 1){
            //if pertama kali lakukan diagnoasa pakai $basis_kasus, jika tidak maka pakai return $data
            $data=$this->cek_gejala_ya($id_gejala);
            $id_gejala_array= str_split(json_decode($this->input->cookie('cookie_gejala',true)));
            if($id_gejala_array == null){
                $id_gejala_array =[];
            }
            var_dump($id_gejala_array);
            $cookie= array(
                'name'   => 'cookie_gejala',
                'value'  => json_encode(array_push($id_gejala_array,$id_gejala)),                            
                (int)'expire' => time() + (3600 * 24 * 30),                                                                                   
                'secure' => TRUE
            );
            $this->input->set_cookie($cookie);
            var_dump(json_decode($this->input->cookie('cookie_gejala',true)));
            //$data1= $this->input->cookie('basis_kasus_new',true);
            // $data1 = $this->data;
            // $data1['basis_kasus_updated'] = $data;
            //$this->basis_kasus_updated = $data;
            //var_dump($data);
            // if($id_gejala == 1){
            //     $data=$this->cek_gejala($id_gejala, null);
            //     var_dump($data);
            // }else{
            //     $data=$this->cek_gejala($id_gejala);
            //     var_dump($data);
            // }
            
        }else{
            $data=$this->cek_gejala_tidak($id_gejala);
            //var_dump($data);
        }
        $this->load->view('header');
        $this->load->view('users/halaman_diagnosa',$data[0]);
        $this->load->view('footer');
    }
    
    public function cek_gejala_ya($id_gejala)
	{
        $search=null;
        //ambil data basis kasus
        $gejala_kasus_updated=[];
        $basis_kasus_new=[];
        
        if($id_gejala == 1){
            $basis_kasus =$this->BasisKasusModel->get_basis_kasus();
        }else{
            //$data1 = $this->data;
            //$basis_kasus = $this->data['basis_kasus_updated'];
            $basis_kasus =$this->filter_penyakit($id_gejala);
            $data1= $this->input->cookie('basis_kasus_new',true);
            //var_dump(json_decode($data1));
        }
        //var_dump($basis_kasus);
            
        foreach ($basis_kasus as $key => $value) {
            //ambil id gejala
            $id_gejala_all=[];
            foreach ($value['gejala'][0] as $va) {
                array_push($id_gejala_all,$va['id_gejala']);
            }
            //cek id gejala yang diinput ada atau tidak pada basis kasus
            $search= array_search($id_gejala,$id_gejala_all);
            if($search !== null){
                echo "true";
                //$gejala_new = $this->input->cookie('basis_kasus_new',true);
                foreach ($value['gejala'][0] as $k => $v) {
                    if($v['id_gejala'] === $id_gejala){
                        unset($value['gejala'][0][$k]);
                    }
                }
                $gejala_kasus_updated = array_values($value['gejala'][0]);
                //return basis kasus yang gejalanya sudah di unset
                array_replace($value['gejala'][0],$gejala_kasus_updated);
                array_push($basis_kasus_new,$value);
                //$this->simpan_kasus_sementara($basis_kasus_new);
                $this->data['basis_kasus_updated'] = $basis_kasus_new;
                $cookie= array(
                    'name'   => 'basis_kasus_new',
                    'value'  => json_encode($basis_kasus_new),                            
                    'expire' => '300',                                                                                   
                    'secure' => TRUE
                );
                $this->input->set_cookie($cookie);
                return $gejala_kasus_updated;
                break;
            }else{
                echo "false";
                // foreach ($value['gejala'][0] as $k => $v) {
                //     if($v['id_gejala'] === $id_gejala){
                //         unset($value['gejala'][0][$k]);
                //     }
                // }
                return $value['gejala'][0];
                break;
            }

        }
        // $this->load->view('header');
        // $this->load->view('users/halaman_diagnosa');
        // $this->load->view('footer');
    }

    public function cek_gejala_tidak($id_gejala)
	{
        $search=null;
        if($id_gejala == 1){
            $basis_kasus =$this->BasisKasusModel->get_basis_kasus();
            $basis_kasus_new=[];
        }
            
        foreach ($basis_kasus as $key => $value) {
            //ambil id gejala
            $id_gejala_all=[];
            foreach ($value['gejala'][0] as $va) {
                array_push($id_gejala_all,$va['id_gejala']);
            }
            //cek id gejala yang diinput ada atau tidak pada basis kasus
            $search= array_search($id_gejala,$id_gejala_all);
            var_dump($search);
            if($search !== false){
                unset($basis_kasus[$key]);
            }else{
                $penyakit_kasus_updated = array_values($basis_kasus);
                var_dump($penyakit_kasus_updated);
                return $value['gejala'][0];
                break;
            }
           // var_dump($basis_kasus);

        }
    }
    
    public function filter_penyakit($id_gejala)
	{
        $new_penyakit = [];
        $basis_kasus =$this->BasisKasusModel->get_basis_kasus();
        foreach ($basis_kasus as $key => $value) {
            foreach ($value['gejala'][0] as $va) {
                if($va['id_gejala'] === $id_gejala){
                    array_push($new_penyakit,$value);
                }
            }
        }
        return $new_penyakit;


    }
	
}
?>