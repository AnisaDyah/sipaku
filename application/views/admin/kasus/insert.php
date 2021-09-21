<?php $this->load->view('admin/template/header.php') ?>
<div id="layoutSidenav_content">
  <main>
    <div class="container-fluid">
      <h1 class="mt-4"></h1>
      <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="<?php echo base_url("Admin") ?>">Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="<?php echo base_url("PenyakitController/index") ?>">Gejala</a></li>
        <li class="breadcrumb-item active">Insert Kasus Penyakit</li>
      </ol>
      <div class="card mb-6">
        <form class="form-horizontal" method="post" action="<?php echo base_url() . 'KasusController/simpan_kasus' ?>">
          <?php echo form_open_multipart("", array("id" => "form-input")); ?>

          <div class="form-group">
            <label for="exampleFormControlSelect1"><b>Pilih Jenis Penyakit</b></label>
            <select class="form-control" id="id_penyakit" name="id_penyakit" required>
              <?php foreach ($data->result_array() as $i) :
                $id_penyakit = $i['id_penyakit'];
                $nama_penyakit = $i['nama_penyakit'];
              ?>
                <option value="<?php echo $id_penyakit; ?>"><?php echo $nama_penyakit; ?></option>
              <?php endforeach; ?>
            </select>


          </div>
          <div class="form-group">
            <div class="form-check">
              <div class="col-md-12"><label for="gejala"><b>Pilih Gejala</b></label></div>
              <?php $no = 1;
              foreach ($gejala->result_array() as $v) : ?>
                <div class="col-md-12">
                  <input type="checkbox" name="gejala[<?= $no ?>]" id="gejala[]" value=<?= $v['id_gejala']; ?>>
                  <?= $v['nama_gejala']; ?>
                  <br> <br>
                </div>

              <?php $no++;

              endforeach; ?>
            </div>
            <?php echo form_close(); ?>

        </form>

      </div>

      <div class="card-footer">
        <button type="submit" class="btn btn-primary btn-sm" form="form-input">
          <i class="fa fa-dot-circle-o"></i> Submit
        </button>
        <a href="<?php echo base_url('KasusController') ?>" class="btn btn-danger btn-sm">
          <i class="fa fa-ban"></i> Cancel
        </a>
      </div>
    </div>



  </main>
  <?php $this->load->view('admin/template/footer.php') ?>

  <!-- end footer -->
</div>