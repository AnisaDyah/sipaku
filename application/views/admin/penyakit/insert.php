<?php $this->load->view('admin/template/header.php') ?>
<div id="layoutSidenav_content">
  <main>
    <div class="container-fluid">
      <h1 class="mt-4"></h1>
      <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="User">Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="Penyakit">Penyakit Kulit</a></li>
        <li class="breadcrumb-item active">Insert Penyakit Kulit</li>
      </ol>
      <div class="card mb-6">
        <div class="card-header"><i class="fas fa-table mr-1"></i>Insert Penyakit</div>
        <div class="card-body">
          <div class="table-responsive">
            <div class="modal-body">
              <?php echo form_open('Penyakit/insert'); ?>

              <div class="form-group">
                <input type="hidden" name="kode_penyakit" value="<?php echo $kode_penyakit; ?>">
                <label class="control-label col-xs-3">Kode Penyakit</label>
                <div class="col-xs-8">
                  <input name="nama_penyakit" class="form-control" type="text" placeholder="Masukkan Kode Penyakit" required>
                </div>
              </div>
              <div class="form-group">
                <input type="hidden" name="nama_penyakit" value="<?php echo $nama_penyakit; ?>">
                <label class="control-label col-xs-3">Nama Penyakit</label>
                <div class="col-xs-8">
                  <input name="nama_penyakit" class="form-control" type="text" placeholder="Masukkan Nama Penyakit" required>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-xs-3">Gambar</label>
                <div class="custom-file">
                  <input type="file" class="custom-file-input" name="url_gambar" required>
                  <label class="custom-file-label" for="input-gambar">Unggah Gambar</label>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-xs-3">Keterangan penyakit</label>
                <div class="col-xs-8">
                  <textarea name="ket_penyakit" class="form-control" rows="3" required></textarea>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-xs-3">Solusi Pengendalian</label>
                <div class="col-xs-8">
                  <textarea name="solusi" class="form-control" rows="3" required></textarea>
                </div>
              </div>
            </div>
            <div class="form-group">

              <button class="btn btn-danger" type="reset">Cancel</button>
              <button class="btn btn-info " type="submit">Simpan</button>

            </div>
            <?php echo form_close() ?>

          </div>
        </div>
      </div>
    </div>
  </main>

  <!-- footer -->
  <?php $this->load->view('admin/template/footer.php') ?>
  <!-- end footer -->
</div>