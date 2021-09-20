<div id="layoutSidenav_content">
  <main>
    <div class="container-fluid">
      <h1 class="mt-4"></h1>
      <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="<?php echo base_url("Admin") ?>">Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="<?php echo base_url("PenyakitController/index") ?>">Gejala</a></li>
        <li class="breadcrumb-item active">Insert Gejala Penyakit</li>
      </ol>
      <div class="card mb-6">
        <?php echo form_open_multipart("", array("id" => "form-input")); ?>
        <div class="form-group">
          <label for="input-kode_gejala" class="form-control-label">Kode Gejala</label>
          <input type="text" id="input-kode_gejala" name="kode_gejala" placeholder="Masukan kode_gejala" class="form-control" value="<?php echo set_value("kode_gejala") ?>">
          <?php echo form_error("kode_gejala") ?>
        </div>
        <div class="form-group">
          <label for="input-nama_gejala" class="form-control-label">Nama Gejala</label>
          <input type="text" id="input-nama_gejala" name="nama_gejala" placeholder="Masukan nama_gejala" class="form-control" value="<?php echo set_value("nama_gejala") ?>">
          <?php echo form_error("nama_gejala") ?>
        </div>

        <div class="form-group">
          <label for="input-ket_gejala" class="form-control-label">Keterangan</label>
          <textarea class="form-control" name="ket_gejala" rows="3" placeholder="Masukan Keterangan Penyakit" value="<?php echo set_value("ket_gejala") ?>"></textarea>
          <?php echo form_error("konten") ?>
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