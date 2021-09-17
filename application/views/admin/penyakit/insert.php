<div id="layoutSidenav_content">
  <main>
    <div class="container-fluid">
      <h1 class="mt-4"></h1>
      <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="<?php echo base_url("Admin") ?>">Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="<?php echo base_url("PenyakitController/index") ?>">Penyakit Kulit</a></li>
        <li class="breadcrumb-item active">Insert Penyakit Kulit</li>
      </ol>
      <div class="card mb-6">
        <?php echo form_open_multipart("", array("id" => "form-input")); ?>
        <div class="form-group">
          <label for="input-kode_penyakit" class="form-control-label">Kode Penyakit</label>
          <input type="text" id="input-kode_penyakit" name="kode_penyakit" placeholder="Masukan kode_penyakit" class="form-control" value="<?php echo set_value("kode_penyakit") ?>">
          <?php echo form_error("kode_penyakit") ?>
        </div>
        <div class="form-group">
          <label for="input-nama_penyakit" class="form-control-label">Nama Penyakit</label>
          <input type="text" id="input-nama_penyakit" name="nama_penyakit" placeholder="Masukan nama_penyakit" class="form-control" value="<?php echo set_value("nama_penyakit") ?>">
          <?php echo form_error("nama_penyakit") ?>
        </div>

        <div class="form-group">
          <label for="input-ket_penyakit" class="form-control-label">Keterangan</label>
          <textarea class="form-control" name="ket_penyakit" rows="3" placeholder="Masukan Keterangan Penyakit" value="<?php echo set_value("ket_penyakit") ?>"></textarea>
          <?php echo form_error("konten") ?>
        </div>
        <div class="form-group">
          <label for="input-solusi" class="form-control-label">Solusi</label>
          <textarea class="form-control" name="solusi" rows="3" placeholder="Masukan Solusi" value="<?php echo set_value("solusi") ?>"></textarea>
          <?php echo form_error("solusi") ?>
        </div>
        <div class="form-group">
          <label for="input-gambar" class="form-control-label">Gambar</label>
          <input type="file" name="gambar" class="form-control">
          <?php echo (isset($error) ? $error : "") ?>
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