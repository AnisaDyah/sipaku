<?php

class M_riwayatdiagnosa extends CI_Model
{

    public function tampil_data()
    {
        return $this->db->get('konsultasi');
    }

    public function input_data($data,$table)
    {
        $this->db->insert($table,$data);
    }

    public function insert($gejala,$id_hamapenyakit,$persen,$date_now)
    {
		$hasil=$this->db->query("INSERT INTO konsultasi (id_gejala,id_hamapenyakit,persentase,tanggal) VALUES ('$gejala','$id_hamapenyakit','$persen','$date_now')");
		return $hasil;
    }
    
    public function riwayat_diagnosa()
	{
		//script buat joinin tabel biar bisa berelasi dengan tabel penyakit dan bisa munculin nama penyakitnya
		$db_kasus = $this->db
            ->select('*')
            ->join('hamapenyakit', 'konsultasi.id_hamapenyakit = hamapenyakit.id_hamapenyakit', 'basiskasus.fk_hamapenyakit = hamapenyakit.id_hamapenyakit')
			->get('konsultasi');
		return $db_kasus->result();
    }

    public function insert_riwayat($id_hamapenyakit,$date_now,$persentase)
    
    {
        $hasil=$this->db->query("INSERT INTO konsultasi (id_hamapenyakit,tanggal,persentase) VALUES ('$id_hamapenyakit','$date_now','$persentase')");
        return $this->db->insert_id();
    }
        
    public function insert_detail_riwayat($data3)
    {
        $this->db->insert_batch('detail_konsultasi',$data3);
    }

    function hapus_rd($id_konsultasi)
    {
		$hasil=$this->db->query("DELETE FROM konsultasi WHERE id_konsultasi ='$id_konsultasi'");
		return $hasil;
    }

}
?>