<?php $this->load->view('admin/template/header.php') ?>
<div id="layoutSidenav_content">
  <main>
    <div class="container-fluid">
      <h1 class="mt-4"></h1>
      <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="<?php echo base_url("Dashboard") ?>">Dashboard</a></li>
        <li class="breadcrumb-item active">Kasus Penyakit</li>
      </ol>
      <div class="card mb-4">
        <?php if ($this->session->flashdata('error_message') != null) : ?>
          <div class="alert alert-danger" role="alert">
            <?php echo $this->session->flashdata('error_message'); ?>
          </div>
        <?php endif ?>
        <?php if ($this->session->flashdata('success_message') != null) : ?>
          <div class="alert alert-success" role="alert">
            <?php echo $this->session->flashdata('success_message'); ?>
          </div>
        <?php endif ?>

        <div class="card-header"><i class="fas fa-table mr-1"></i>Data Kasus Penyakit</div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <td>No</td>
                  <td>Gejala</td>
                  <td>Penyakit</td>
                  <td>
                    <a class="btn btn-success" href="<?php echo base_url("KasusController/insert") ?>">Insert</a>
                  </td>
                </tr>
              </thead>
              <tbody>
                <?php
                $no = 1;
                foreach ($kasus as $key => $value) :
                  $id_penyakit = $value->id_penyakit;
                  $id_bk = $value->id_bk
                ?>
                  <tr>
                    <td><?php echo ++$key; ?></td>
                    <td>
                      <?php $result = $this->db->query('SELECT  * FROM basis_kasus INNER JOIN mst_gejala on mst_gejala.id_gejala = basis_kasus.id_gejala where id_penyakit = ' . $id_bk)->result_array();

                      foreach ($result as $v) :
                        echo $v['kode_gejala'] . " | " . $v['nama_gejala'];
                        echo "<br>";
                      endforeach; ?>
                    </td>
                    <td><?php echo $value->nama_penyakit ?></td>


                    <td>
                      <a class="btn btn-sm btn-primary" href="<?php echo base_url("KasusController/update_kasus/" . $value->id_bk) ?>"><i class="fas fa-edit"></i></a>
                      <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#modal-delete" data-href="<?php echo base_url("KasusController/delete/" . $value->id_bk) ?>">
                        <i class="fas fa-trash"></i>
                      </button>
                    </td>
                  </tr>
                <?php endforeach ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

  </main>

  <!-- ============ END MODAL HAPUS =============== -->
  <div class="modal fade" id="modal-delete" tabindex="-1" role="dialog" aria-labelledby="modaldeleteLabel" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog modal-sm" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modaldeleteLabel">Konfirmasi Hapus</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p>
            Apakah anda yakin menghapus data ini?
          </p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
          <a href="<?php echo base_url("KasusController/delete/" . $value->id_gejala) ?>" id="confirm-delete" class="btn btn-danger">Hapus</a>
        </div>
      </div>
    </div>
  </div>
  <script>
    $('#modal-delete').on('show.bs.modal', function(event) {
      var button = $(event.relatedTarget)
      $(this).find('#confirm-delete').attr('href', button.data('href'));
    });
  </script>


  <!-- footer -->
  <?php $this->load->view('admin/template/footer.php') ?>
  <!-- end footer -->
</div>