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
        delete_cookie("count");
        delete_cookie("cookie_basis_kasus");
        if($this->input->cookie('cookie_id_gejala[0]',true) != null){
            foreach ($this->input->cookie('cookie_id_gejala',true) as $key => $value) {
                delete_cookie("cookie_id_gejala[".$key."]");
            }
        }
        if($this->input->cookie('cookie_id_penyakit[0]',true) != null){
            foreach ($this->input->cookie('cookie_id_penyakit',true) as $key => $value) {
                delete_cookie("cookie_id_penyakit[".$key."]");
            }
        }
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
           
            //echo "3=".get_cookie('count');
            //var_dump((int)$id_gejala) ;
            //$coba= var_dump((int)$id_gejala) ;
           

            $data=$this->cek_gejala_ya($id_gejala);
           // var_dump($data);
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

        if(!empty($data)){
            $this->load->view('header');
            $this->load->view('users/halaman_diagnosa',$data[0]);
            $this->load->view('footer');
        }
    }
    
    public function cek_gejala_ya($id_gejala)
	{
        
        $search=null;
        //ambil data basis kasus
        $gejala_kasus_updated=[];
        $basis_kasus_new=[];
        
        if($this->input->cookie('cookie_basis_kasus',true) == null){
            $basis_kasus =$this->BasisKasusModel->get_basis_kasus();
        }else{
            //$data1 = $this->data;
            //$basis_kasus = $this->data['basis_kasus_updated'];
            //$basis_kasus =$this->filter_penyakit($id_gejala);
            $basis_kasus=[];
            $data= json_decode($this->input->cookie('cookie_basis_kasus',true));
            foreach ($data as $key => $value) {
            $objectToArray1 = (array)$value;
                //var_dump($objectToArray1['gejala'][0]);
                $objectToArray2 =[];
                foreach ($objectToArray1['gejala'][0] as $ke => $ve) {
                    //var_dump($ve);
                    array_push($objectToArray2,(array)$ve);
                }
                $objectToArray1['gejala'][0]=$objectToArray2;
                array_push($basis_kasus,$objectToArray1);

            }
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
                //$gejala_new = $this->input->cookie('basis_kasus_new',true);
                foreach ($value['gejala'][0] as $k => $v) {
                    if($v['id_gejala'] === $id_gejala){
                        array_splice($value['gejala'][0],$k,1);
                        //unset($value['gejala'][0][$k]);
                    }
                }
                //var_dump($value['gejala'][0]);
                $gejala_kasus_updated = $value['gejala'][0];
                //return basis kasus yang gejalanya sudah di unset
                //var_dump($gejala_kasus_updated);
                //array_replace($value['gejala'][0],$gejala_kasus_updated);
                array_push($basis_kasus_new,$value);
                //$this->simpan_kasus_sementara($basis_kasus_new);
                $this->data['basis_kasus_updated'] = $basis_kasus_new;
                

                //count page load with cookies
                if ($this->input->cookie('count',false) === null){
                    $cookie_num= array(
                        'name'   => 'count',
                        'value'  => 0,                            
                        'expire' => '3600',                                                                                   
                        'secure' => true
                    );
                    $this->input->set_cookie($cookie_num);
                    $array_id = 0;
                    //echo $this->input->cookie('count',true);
                }else{
                    $cookie_num= array(
                        'name'   => 'count',
                        'value'  => $this->input->cookie('count',true) + 1,                            
                        'expire' => '3600',                                                                                   
                        'secure' => true
                    );
                    $this->input->set_cookie($cookie_num);
                    //$id=$this->input->cookie('count',true);
                    //echo "2=".$this->input->cookie('count',true);
                    $array_id = $this->input->cookie('count',true) +1 ;
                }

                //make array in cookie to stroe id_gejala was submited
                //$id_gejala_toPush = $this->GejalaModel->get_id_gejala($id_gejala)->result_array()[0]['id_gejala'];
                if(count($gejala_kasus_updated) !== 0){
                    $cookie_id_gejala= array(
                        'name'   => 'cookie_id_gejala['.$array_id.']',
                        'value'  => $gejala_kasus_updated[0]['id_gejala'],                            
                        'expire' => '3600',                                                                                   
                        'secure' => true
                    );
                    $this->input->set_cookie($cookie_id_gejala);
                }
                $array_id_gejala_cookie=['1'];
                if($this->input->cookie('cookie_id_gejala[0]',true) != null){
                    foreach ($this->input->cookie('cookie_id_gejala',true) as $key => $value) {
                       array_push($array_id_gejala_cookie,$value);
                    }
                }
                $array_id_gejala = array_unique($array_id_gejala_cookie);
                //var_dump($array_id_gejala);

                //var_dump($basis_kasus_new[0]['id_penyakit']);
                //simpan id penyakit yang menjadi dugaan pertama kedalam cookie
                if(count($gejala_kasus_updated) !== 0){
                    $cookie_id_penyakit= array(
                        'name'   => 'cookie_id_penyakit['.$array_id.']',
                        'value'  => $basis_kasus_new[0]['id_penyakit'],                            
                        'expire' => '3600',                                                                                   
                        'secure' => true
                    );
                    $this->input->set_cookie($cookie_id_penyakit);
                }
                $array_id_penyakit_cookie=[];
                if($this->input->cookie('cookie_id_penyakit[0]',true) != null){
                    foreach ($this->input->cookie('cookie_id_penyakit',true) as $key => $value) {
                       array_push($array_id_penyakit_cookie,$value);
                    }
                }
                $array_id_penyakit = array_unique($array_id_penyakit_cookie);
                var_dump($array_id_penyakit);
                //store array basis kasus yang sudah pernah dicek
                $cookie= array(
                    'name'   => 'cookie_basis_kasus',
                    'value'  => json_encode($basis_kasus_new),                            
                    'expire' => '3600',                                                                                   
                    'secure' => true
                );
                $this->input->set_cookie($cookie);
                
                //jika gejala bernilai benar semua
                if(count($gejala_kasus_updated) === 0){
                    $this->hasil_diagnosa(array_unique($array_id_gejala));
                }else{
                    //kembalikan nilai gejala untuk pertanyaan selanjutnya
                    return $gejala_kasus_updated;
                    break;
                }

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
    }

    public function cek_gejala_tidak($id_gejala)
	{
        $search=null;
        if($this->input->cookie('cookie_basis_kasus',true) == null){
            $basis_kasus =$this->BasisKasusModel->get_basis_kasus();
        }else{
            $array_id_penyakit_cookie=[];
            if($this->input->cookie('cookie_id_penyakit[0]',true) != null){
                foreach ($this->input->cookie('cookie_id_penyakit',true) as $key => $value) {
                   array_push($array_id_penyakit_cookie,$value);
                }
            }
            $array_id_penyakit = array_unique($array_id_penyakit_cookie);
            
            $array_id_gejala_cookie=['1'];
            if($this->input->cookie('cookie_id_gejala[0]',true) != null){
                foreach ($this->input->cookie('cookie_id_gejala',true) as $key => $value) {
                    array_push($array_id_gejala_cookie,$value);
                }
            }
            $array_id_gejala = array_unique($array_id_gejala_cookie);
            //var_dump($array_id_gejala);

            $basis_kasus=[];
            $basis_kasus_asli =$this->BasisKasusModel->get_basis_kasus();
            foreach ($basis_kasus_asli as $key => $value) {
                foreach ($array_id_penyakit as $va) {
                    if($value['id_penyakit'] === $va){
                        //unset($basis_kasus_asli[$key]);
                        array_splice($basis_kasus_asli,$key,1);
                    }
                }
                
            }

            foreach ($basis_kasus_asli as $key => $value) {
                foreach ($value['gejala'][0] as $k => $v) {
                    foreach ($array_id_gejala as $va) {
                        if($v['id_gejala'] === $va){
                            echo $v['id_gejala'].'===='.$va;
                            unset($value['gejala'][0][$k]);
                            //array_splice($value['gejala'][0],$k,1);
                        }
                    }
                }
                $value['gejala'][0]=array_values($value['gejala'][0]);
                array_push($basis_kasus,$value);
            }
            var_dump($basis_kasus);
            
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
                //echo $id_gejala.'sdfs';
                unset($basis_kasus[$key]);
                //array_splice($basis_kasus,$key,1);
            }else{
                
                $basis_kasus_new = $basis_kasus;
                $cookie= array(
                    'name'   => 'cookie_basis_kasus',
                    'value'  => json_encode($basis_kasus_new),                            
                    'expire' => '3600',                                                                                   
                    'secure' => true
                );
                $this->input->set_cookie($cookie);
                //var_dump($penyakit_kasus_updated);
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

    public function hasil_diagnosa($array_id_gejala)
	{
        $data= json_decode($this->input->cookie('cookie_basis_kasus',true));
        $penyakit_terpilih = $data[0];
        //var_dump($array_id_gejala);

        $basis_kasus_byid =$this->BasisKasusModel->get_basis_kasus_byid($penyakit_terpilih->id_penyakit);
        $gejala_selected = [];
        foreach ($basis_kasus_byid as $key => $value) {
            foreach ($array_id_gejala as $va) {
                if($value['id_gejala'] === $va){
                    array_push($gejala_selected,$value);
                }
            }
        }
        $perhitungan_fc = (count($array_id_gejala)/count($basis_kasus_byid)) * 100;
        $penyakit_terpilih->perhitungan_fc=$perhitungan_fc;
        $penyakit_terpilih->gejala_selected=$gejala_selected;
        var_dump($gejala_selected);
        $this->load->view('header');
        $this->load->view('users/hasil_diagnosa',$penyakit_terpilih);
        $this->load->view('footer');

    }
	
}
?>