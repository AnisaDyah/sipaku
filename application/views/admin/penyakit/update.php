<?php $this->load->view('admin/template/header.php') ?>

<!-- page content -->
<div class="right_col">
  <div class="container">
    <br /><br /><br />
    <legend>Edit Data penyakit</legend>
    <div class="col-xs-12 col-sm-12 col-md-12">
      <?php echo form_open('penyakit/update/' . $penyakit->id_penyakit); ?>
      <?php echo form_hidden('id_penyakit', $penyakit->id_penyakit) ?>

      <div class="form-group">
        <label for="nama">Nama penyakit</label>
        <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $penyakit->nama ?>">
      </div>
      <div class="form-group">
        <label> Status </label>
        <select class="form-control" name="status" id="status">
          <option selected> <?php echo $penyakit->status ?></option>
          <option value="aktif">Aktif</option>
          <option value="dikunci">Kunci</option>
        </select>
      </div>


      <a class="btn btn-info" href="<?php echo base_url('penyakit/index') ?>">Kembali</a>
      <button type="submit" class="btn btn-primary">OK</button>
      <?php echo form_close(); ?>
    </div>
  </div>
</div>
<!-- /page content -->

<?php $this->load->view('admin/template/footer.php') ?>