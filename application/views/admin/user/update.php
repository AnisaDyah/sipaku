<div id="layoutSidenav_content">
  <main>
    <div class="container-fluid">
      <h1 class="mt-4"></h1>
      <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="<?php echo base_url("Admin") ?>">Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="<?php echo base_url("UserController/index") ?>">Users</a></li>
        <li class="breadcrumb-item active">Update Users </li>
      </ol>
      <div class="card mb-6">
        <?php echo form_open_multipart("", array("id" => "form-input")); ?>
        <div class="form-group">
          <label for="input-nama-lengkap" class="form-control-label">Nama Lengkap</label>
          <input type="text" id="input-nama-lengkap" name="nama_lengkap" placeholder="Masukan Nama Lengkap" class="form-control" value="<?php echo $user->nama_lengkap ?>">
          <?php echo form_error("nama_lengkap") ?>
        </div>
        <div class="form-group">
          <label for="input-username" class="form-control-label">Username</label>
          <input type="text" id="input-username" name="username" placeholder="Masukan Username" class="form-control" value="<?php echo $user->username ?>">
          <?php echo form_error("username") ?>
        </div>
        <div class="form-group">
          <label for="input-password" class="form-control-label">Password</label>
          <input type="password" id="input-password" name="password" placeholder="Masukan Password" class="form-control" value="<?php echo $user->password ?>">
          <?php echo form_error("password") ?>
        </div>
        <div class="form-group">
          <label for="input-no_hp" class="form-control-label">No HP</label>
          <input type="text" id="input-no_hp" name="no_hp" placeholder="Masukan no_hp" class="form-control" value="<?php echo $user->no_hp ?>">
          <?php echo form_error("no_hp") ?>
        </div>

        <div class="form-group">
          <label for="input-alamat" class="form-control-label">Alamat</label>
          <input type="text" id="input-alamat" name="alamat" placeholder="Masukan alamat" class="form-control" value="<?php echo $user->alamat ?>">
          <?php echo form_error("alamat") ?>
        </div>
        <div class="form-group">
          <label for="input-tgl_lahir" class="form-control-label">tgl_lahir</label>
          <input type="tgl_lahir" id="datepicker" name="tgl_lahir" placeholder="YYYY-MM-DD" class="form-control" value="<?php echo $user->tgl_lahir ?>">
          <?php echo form_error("tgl_lahir") ?>
        </div>
        <div class="form-group">
          <label> Hak Akses </label>
          <select class="form-control" name="id_akses" id="id_akses">
            <option selected>
              <?php
              foreach ($hak_akses as $k) {
                $s = '';
                if ($k->id_akses == $user->fk_akses) {
                  $s = 'selected';
                }
              ?>
            <option value="<?php echo $k->id_akses ?>" <?php echo $s ?>><?php echo $k->nama_akses ?></option>
          <?php } ?>
          </select>
        </div>


        <?php echo form_close(); ?>
      </div>



      <div class="card-footer">
        <button type="submit" class="btn btn-primary btn-sm" form="form-input">
          <i class="fa fa-dot-circle-o"></i> Submit
        </button>
        <a href="<?php echo base_url($c_name) ?>" class="btn btn-secondary btn-sm">
          <i class="fa fa-ban"></i> Cancel
        </a>
      </div>
    </div>



  </main>
  <?php $this->load->view('admin/template/footer.php') ?>

  <!-- end footer -->

</div>