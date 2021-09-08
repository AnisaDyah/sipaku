<?php

class M_revisi extends CI_Model
{
  public function show_revise()
  {
    $hasil=$this->db->query("SELECT * FROM revise");
		return $hasil;;
  }
  
  public function insert_revise($id_hamapenyakit,$date_now,$persentase)
  {
    $hasil=$this->db->query("INSERT INTO revise (fk_hamapenyakit,tanggal,persentase) VALUES ('$id_hamapenyakit','$date_now','$persentase')");
    return $this->db->insert_id($hasil);
  }
  
  public function insert_detail_revise($data2)
  {
    $this->db->insert_batch('detail_revise',$data2);
  }
  
  public function show_detail($id)
  {
    $query = $this->db->query("SELECT revise.*, detail_revise.*, hamapenyakit.*, detail_revise.*, gejala.* from revise
    join detail_revise on detail_revise.fk_revise=revise.id_re
    join hamapenyakit on hamapenyakit.id_hamapenyakit=revise.fk_hamapenyakit
    join gejala on gejala.id_gejala=detail_revise.fk_gejala
    where revise.id_re='$id'")->result();
    return $query;
  }
  
  public function hapus_revisi($id_re)
  {
    $hasil=$this->db->query("DELETE FROM revise WHERE id_re ='$id_re'");
    return $hasil;
  }
}
?>