<?php

class M_basis extends CI_Model
{

    public function show_basis()
    {
		$hasil=$this->db->query
		("SELECT DISTINCT * FROM basiskasus INNER JOIN hamapenyakit on basiskasus.fk_hamapenyakit = hamapenyakit.id_hamapenyakit order by id_basiskasus");
		return $hasil;
	}

    public function input_data($data,$table)
    {
        $this->db->insert($table,$data);
    }

    public function getDetail()
	{
		$query = $this->db->query
		("SELECT * FROM detail_kasus INNER JOIN bobot on detail_kasus.fk_bobot = bobot.id_bobot inner join gejala on detail_kasus.fk_gejala = gejala.id_gejala inner join basiskasus on detail_kasus.fk_kasus = basiskasus.id_basiskasus");
		return $query->result();
	}
	
	public function getWhere($id_kasus)
	{
		$query = $this->db->query
		("SELECT * FROM detail_kasus INNER JOIN bobot on detail_kasus.fk_bobot = bobot.id_bobot inner join gejala on detail_kasus.fk_gejala = gejala.id_gejala inner join basiskasus on detail_kasus.fk_kasus = basiskasus.id_basiskasus INNER JOIN hamapenyakit on basiskasus.fk_hamapenyakit = hamapenyakit.id_hamapenyakit where fk_kasus = '$id_kasus'");
		return $query->result();
    }
    
    public function show_hp()
    {
		$hasil=$this->db->query("SELECT * FROM hamapenyakit");
		return $hasil;
	}

	public function show_gejala()
    {
		$hasil=$this->db->query("SELECT * FROM gejala");
		return $hasil;
	}

	// public function hp_kasus($data)
 //    {
	// 	$this->db->where('id_basiskasus', $id_basiskasus);
 //        return $this->db->update('basiskasus', $data);
	// }

	
	public function simpan_kasus($data)
    {
		$this->db->insert('basiskasus',$data);
		$hasil = $this->db->insert_id();
		return $hasil;
	}

	public function simpan_detail($data)
    {
		$this->db->insert('detail_kasus',$data);
		$hasil = $this->db->insert_id();
		return $hasil;
    }
    
    public function update_kasus($id_basiskasus, $data)
    {
        $this->db->where('id_basiskasus', $id_basiskasus);
        return $this->db->update('basiskasus', $data);
    }
    
    public function update_detail($id_basiskasus, $id_gejala, $data)
    {
        $this->db->where('fk_kasus', $id_basiskasus);
        $this->db->where('fk_gejala', $id_gejala);
		return $this->db->update('detail_kasus',$data);
    }

	function hapus_kasus($id_kasus)
    {
		$hasil=$this->db->query("DELETE FROM basiskasus WHERE id_basiskasus ='$id_kasus'");
		return $hasil;
    }

    function hapus_detail($id_detail)
    {
		$hasil=$this->db->query("DELETE FROM detail_kasus WHERE id_detailkasus ='$id_detail'");
		return $hasil;
    }
}
?>