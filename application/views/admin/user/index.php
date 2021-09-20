<div id="layoutSidenav_content">
  <main>
    <div class="container-fluid">
      <h1 class="mt-4"></h1>
      <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="<?php echo base_url("Dashboard") ?>">Dashboard</a></li>
        <li class="breadcrumb-item active">Users</li>
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

        <div class="card-header"><i class="fas fa-table mr-1"></i>Data Users</div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <td>No.</td>
                  <td>Username</td>
                  <td>Password</td>
                  <td>ID Level User</td>
                  <td>No HP</td>
                  <td>Alamat</td>
                  <td>
                    <a class="btn btn-success" href="<?php echo base_url("UserController/insert") ?>">Insert</a>
                  </td>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($data as $key => $value) : ?>
                  <tr>
                    <td><?php echo ++$key; ?></td>
                    <td><?php echo $value->username ?></td>
                    <td><?php echo $value->password ?></td>
                    <td><?php echo $value->id_akses ?></td>
                    <td><?php echo $value->no_hp ?></td>
                    <td><?php echo $value->alamat ?></td>


                    <td>
                      <a class="btn btn-sm btn-primary" href="<?php echo base_url("UserController/update/" . $value->id_user) ?>"><i class="fas fa-edit"></i></a>
                      <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#modal-delete" data-href="<?php echo base_url("UserController/delete/" . $value->id_user) ?>">
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
          <a href="<?php echo base_url("UserController/delete/" . $value->id_user) ?>" id="confirm-delete" class="btn btn-danger">Hapus</a>
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