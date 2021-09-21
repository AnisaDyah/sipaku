<div id="layoutSidenav_content">
  <main>
    <div class="container-fluid">
      <h1 class="mt-4"></h1>
      <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="<?php echo base_url("Admin") ?>">Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="<?php echo base_url("UserController/index") ?>">Users</a></li>
        <li class="breadcrumb-item active">Insert Users</li>
      </ol>
      <div class="card mb-6">
        <?php echo form_open_multipart("", array("id" => "form-input")); ?>
        <div class="form-group">
          <label for="input-username" class="form-control-label">Username</label>
          <input type="text" id="input-username" name="username" placeholder="Masukan Username" class="form-control" value="<?php echo set_value("username") ?>">
          <?php echo form_error("username") ?>
        </div>
        <div class="form-group">
          <label for="input-password" class="form-control-label">Password</label>
          <input type="password" id="input-password" name="password" placeholder="Masukan Password" class="form-control" value="">
          <?php echo form_error("password") ?>
        </div>
        <div class="form-group">
          <label for="input-re-password" class="form-control-label">Ketik Ulang Password</label>
          <input type="password" id="input-re-password" name="re-password" placeholder="Ketik Ulang Password" class="form-control" value="">
          <?php echo form_error("re-password") ?>
        </div>

        <div class="form-group">
          <label for="input-no_hp" class="form-control-label">No HP</label>
          <input type="no_hp" id="input-no_hp" name="no_hp" placeholder="Masukan no_hp" class="form-control" value="">
          <?php echo form_error("no_hp") ?>
        </div>

        <div class="form-group">
          <label for="input-alamat" class="form-control-label">Alamat</label>
          <input type="alamat" id="input-alamat" name="alamat" placeholder="Masukan alamat" class="form-control" value="">
          <?php echo form_error("alamat") ?>
        </div>

        <div class="form-group">
          <label for="input-tgl_lahir" class="form-control-label">tgl_lahir</label>
          <input type="tgl_lahir" id="datepicker" name="tgl_lahir" placeholder="YYYY-MM-DD" class="form-control" value="">
          <?php echo form_error("tgl_lahir") ?>
        </div>

        <?php echo form_close(); ?>
      </div>

      <div class="card-footer">
        <button type="submit" class="btn btn-primary btn-sm" form="form-input">
          <i class="fa fa-dot-circle-o"></i> Submit
        </button>
        <a href="<?php echo base_url($c_name) ?>" class="btn btn-danger btn-sm">
          <i class="fa fa-ban"></i> Cancel
        </a>
      </div>
    </div>



  </main>
  <?php $this->load->view('admin/template/footer.php') ?>

  <!-- end footer -->
</div>