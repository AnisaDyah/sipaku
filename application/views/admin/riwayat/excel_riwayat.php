<?php 
	header("Content-type: application/vnd-ms-excel");
	header("Content-Disposition: attachment; filename=RiwayatDiagnosa.xls");
 ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<table border="1">
	  <thead>
	    <tr>
        <th class="text-center">No.</th>
        <th class="text-center">Tanggal</th>
        <th class="text-center">Nama Pasien</th>
        <th class="text-center">Alamat</th>
        <th class="text-center">Hasil Diagnosa</th>
        <th class="text-center">Gejala</th>
        <th class="text-center" width="10%">Persentase Hasil Diagnosa (%)</th>
	    </tr>
	  </thead>
	  <tbody>
      <?php
        $no = 1;
        foreach ($riwayat_diagnosa as $key => $value) :
            $id_diagnosa = $value->id_diagnosa ?>
            <tr>
                <td class="text-center"><?php echo $no++; ?></td>
                <td><?php echo $value->tgl_diagnosa ?></td>
                <td><?php echo $value->nama_lengkap ?></td>
                <td><?php echo $value->alamat ?></td>
                <td><?php echo $value->nama_penyakit ?></td>
                <td>
                    <?php $result = $this->db->query('SELECT * FROM detail_diagnosa INNER JOIN mst_gejala on mst_gejala.id_gejala = detail_diagnosa.id_gejala WHERE id_diagnosa = ' . $id_diagnosa)->result_array();
                    foreach ($result as $v) :
                        echo $v['kode_gejala'] . " | " . $v['nama_gejala'];
                        echo "<br>";
                    endforeach; ?>
                </td>
                <td class="text-center"><?php echo $value->bobot ?></td>
            </tr>
            <?php endforeach; ?>
	  </tbody>
	</table>
</body>
</html>