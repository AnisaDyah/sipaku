<?php $this->load->view('layouts/header_admin'); ?>

        <!-- page content -->
        <div class="right_col">
            <div class="container">
      <br/><br/><br/>
      <legend>Edit Data Pegawai</legend>
      <div class="col-xs-12 col-sm-12 col-md-12">
      <?php echo form_open('pegawai/update/'.$pegawai->id_pegawai); ?>
        <?php echo form_hidden('id_pegawai', $pegawai->id_pegawai) ?>
       
        <div class="form-group">
                <label for="nama">Nama Pegawai</label>
                <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $pegawai->nama ?>">
              </div>
        <div class="form-group">
          <label> Divisi </label>
              <select class="form-control" name ="divisi" id="divisi"> 
                <option selected>
                <?php
                  foreach($divisi as $k) {
                    $s='';
                      if($k->id_divisi == $pegawai->divisi)
                      { $s='selected'; }
                ?>
                 <option value="<?php echo $k->id_divisi ?>" <?php echo $s ?>>
                    <?php echo $k->divisi ?>
                  </option>
                  <?php } ?>
            </select>
        </div>
              <div class="form-group">
          <label> Status </label>
              <select class="form-control" name ="status" id="status"> 
              <option selected> <?php echo $pegawai->status ?></option>
                  <option value="aktif">Aktif</option>
                  <option value="dikunci">Kunci</option>
            </select>
        </div>
       

        <a class="btn btn-info" href="<?php echo base_url('pegawai/index') ?>">Kembali</a>
        <button type="submit" class="btn btn-primary">OK</button>
      <?php echo form_close(); ?>
      </div>
</div>
        </div>        
        <!-- /page content -->

        <?php $this->load->view('layouts/footer_admin'); ?>