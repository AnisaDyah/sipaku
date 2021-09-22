<?php $this->load->view('admin/template/header.php') ?>
<div id="layoutSidenav_content">
  <main>
    <div class="container-fluid">
      <h1 class="mt-4"> </h1>
      <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="<?php echo base_url("Dashboard") ?>">Dashboard</a></li>
        <li class="breadcrumb-item active">Rule Diagnosa</li>

      </ol>
      <!-- <div class="x_content"> -->
      <?php $error = $this->session->flashdata('message');
      if ($error) { ?>
        <div class="alert alert-danger alert-dismissable">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
          <?php echo $error; ?>
        </div>
      <?php } ?>
      <div class="card mb-4">
        <div class="card-header"><i class="fas fa-table mr-1"></i>Data Rule Diagnosa


        </div>

        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <td class="text-center" style="width:10px">No</td>
                  <td class="text-center">Kode Rule</td>
                  <td class="text-center">IF</td>
                  <td class="text-center">THEN</td>
                  <td class="text-center">
                    <a class="btn btn-success" href="<?php echo base_url("KasusController/insert") ?>">Insert</a>
                  </td>
                </tr>
              </thead>
              <tbody>
                <?php
                $no = 1;
                foreach ($kasus as $key => $value) :
                  $no1 = ++$key ?>

                  <tr>
                    <td class="text-center"><?php echo $no1; ?></td>
                    <td class="text-center"> R <?php echo $no1; ?></td>
                    <td>
                      <?php //$result = $this->db->query('SELECT * FROM detail_diagnosa INNER JOIN mst_gejala on mst_gejala.id_gejala = detail_diagnosa.id_gejala WHERE id_diagnosa = ' . $id_diagnosa)->result_array();
                      foreach ($value['gejala'][0] as $v) :
                        echo $v['kode_gejala'] . " | " . $v['nama_gejala'];
                        echo "<br>";
                      endforeach; ?>
                    </td>
                    <td>
                      <?php
                      echo  $value['nama_penyakit'];
                      ?>
                    </td>
                    <td class="text-center">
                      <a class="btn btn-sm btn-primary" href="<?php echo base_url("KasusController/update/" . $value['id_penyakit']) ?>"><i class="fas fa-edit"></i></a>
                      <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#modal-delete" data-href="<?php echo base_url("KasusController/delete/" . $value['id_penyakit']) ?>">
                        <i class="fas fa-trash"></i>
                      </button>
                    </td>

                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </main>

  <!-- <?php foreach ($konsul as $key => $value) :
          $id_diagnosa = $value->id_diagnosa ?>
        <tr> -->
  <!-- ============ MODAL HAPUS =============== -->
  <div class="modal fade" id="modal-cetak" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="myModalLabel">Pilih Periode Riwayat</h4>
        </div>
        <form class="form-horizontal" method="post" action="<?php echo base_url() . 'RiwayatDiagnosaController/cetak' ?>">
          <div class="modal-body">
            <div class="form-group">
              <label>Tanggal Awal</label>
              <input type="text" name="tgl_awal" class="form-control pull-right" id="datepicker" placeholder="YYYY-MM-DD">
            </div>
            <div class="form-group">
              <label>Tanggal Akhir</label>
              <input type="text" name="tgl_akhir" class="form-control pull-right" id="datepicker2" placeholder="YYYY-MM-DD">
            </div>
          </div>
          <div class="modal-footer">
            <!-- <input type="hidden" name="id_diagnosa" value="<?php echo $id_diagnosa; ?>"> -->
            <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
            <button class="btn btn-warning"><i class="fa fa-print"></i> Cetak</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <!-- <?php endforeach; ?> -->
  <!-- ============ END MODAL HAPUS =============== -->

  <!-- footer -->
  <?php $this->load->view('admin/template/footer.php') ?>
  <!-- end footer -->
</div>