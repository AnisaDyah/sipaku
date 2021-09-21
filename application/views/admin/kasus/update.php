<div id="layoutSidenav_content">
  <main>
    <div class="container-fluid">
      <h1 class="mt-4"></h1>
      <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="<?php echo base_url("Admin") ?>">Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="<?php echo base_url("KasusController/index") ?>">Gejala</a></li>
        <li class="breadcrumb-item active">Update Gejala </li>
      </ol>
      <div class="card mb-6">
        <?php echo form_open_multipart("", array("id" => "form-input")); ?>
        <form class="form-horizontal" method="post" action="<?php echo base_url() . 'KasusController/update_kasus' ?>">
          <input type="hidden" name="id_bk" value="<?php echo $data[0]->id_bk;   ?>">

          <div class="form-group">
            <label for="exampleFormControlSelect1">Pilih Jenis Penyakit</label>
            <input type="text" class="form-control" id="id_penyakit" name="id_penyakit" value="<?= $data[0]->nama_hamapenyakit; ?>" readonly>
            </select>
          </div>
          <div class="form-group">
            <label for="exampleFormControlSelect1">Pilih Gejala</label>
            <select class="form-control" id="id_gejala" name="id_gejala" required>
              <?php foreach ($this->db->select('*')->from('gejala')->get()->result() as $v) : ?>
                <option value="<?= $v->id_gejala; ?>" <?php if ($v->id_gejala == $data[0]->id_gejala) {
                                                        echo 'selected';
                                                      } ?>>
                  <?php echo $v->nama_gejala; ?>
                </option>
              <?php endforeach; ?>
            </select>
          </div>
          <center>
            <button type="submit" class="btn btn-info"></i>Tambah Ke Tabel</button>
          </center>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Gejala</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $no = 1;
                  foreach ($data as $key => $value) :
                    $id_bk = $value->id_bk;
                  ?>
                    <tr>
                      <td><?php echo $no++; ?></td>
                      <td><?php echo $value->nama_gejala ?></td>
                      <td>
                        <!-- <?= $id_detailkasus; ?> -->
                        <a href="<?php echo base_url() . 'KasusController/hapus_detail/' . $id_detailkasus . '/' . $id_bk; ?>" class="btn btn-danger">
                          <i class="fas fa-trash-alt"></i>
                        </a>
                      </td>
                      </td>
                    </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
            </div>
          </div>
        </form>


        <?php echo form_close(); ?>
      </div>



      <div class="card-footer">
        <button type="submit" class="btn btn-primary btn-sm" form="form-input">
          <i class="fa fa-dot-circle-o"></i> Submit
        </button>
        <a href="<?php echo base_url('KasusController') ?>" class="btn btn-secondary btn-sm">
          <i class="fa fa-ban"></i> Cancel
        </a>
      </div>
    </div>



  </main>
  <?php $this->load->view('admin/template/footer.php') ?>

  <!-- end footer -->

</div>