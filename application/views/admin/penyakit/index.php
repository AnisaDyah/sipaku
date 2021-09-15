<?php $this->load->view('admin/template/header.php') ?>
<div id="layoutSidenav_content">
  <main>
    <div class="container-fluid">
      <h1 class="mt-4"></h1>
      <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="User">Dashboard</a></li>
        <li class="breadcrumb-item active">Penyakit Kulit</li>
      </ol>
      <div class="card mb-4">
        <div class="card-header"><i class="fas fa-table mr-1"></i>Data Penyakit</div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <td>No.</td>
                  <td>Kode Penyakit</td>
                  <td>Nama Penyakit</td>
                  <td>Gambar</td>
                  <td>ket_penyakit</td>
                  <td>Solusi</td>
                  <td>
                    <a class="btn btn-success" href="<?php echo base_url("Penyakit/insert") ?>">Insert</a>
                  </td>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($data as $key => $value) : ?>
                  <tr>
                    <td><?php echo ++$key; ?></td>
                    <td><?php echo $value->kode_penyakit ?></td>
                    <td><?php echo $value->nama_penyakit ?></td>
                    <td><?php echo $value->url_gambar ?></td>
                    <td><?php echo $value->ket_penyakit ?></td>
                    <td><?php echo $value->solusi ?></td>

                    <td>
                      <a class="btn btn-sm btn-success" href="<?php echo base_url("Penyakit/update/" . $value->id_penyakit) ?>"><i class="fas fa-edit"></i></a>
                      <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modal-delete" data-href="<?php echo base_url("Penyakit/delete/" . $value->id_penyakit) ?>">
                        <i class="fa fa-trash"></i>
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


  <!-- MODAL DELETE -->
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
          <a href="#" id="confirm-delete" class="btn btn-danger">Hapus</a>
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
</div>