    <?php $this->load->view('admin/template/header.php') ?>
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                <h1 class="mt-4"></h1>
                <div class="card mb-4">
                    <div class="card-header"><i class="fas fa-table mr-1"></i>Detail Revisi</div>
                    <div class="card-body">
                        <form class="form-horizontal" method="post" action="<?php echo base_url() . 'Revisi/simpan_kasus' ?>">
                            <input type="hidden" name="id_basiskasus" value="<?php echo $revise[0]->id_re;   ?>">
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Pilih Jenis Hama atau Penyakit</label>
                                <select class="form-control" id="id_hamapenyakit" name="id_hamapenyakit" required>
                                    <?php foreach ($this->db->select('*')->from('hamapenyakit')->get()->result() as $v) : ?>
                                        <option value="<?= $v->id_hamapenyakit; ?>" <?php if ($v->id_hamapenyakit == $revise[0]->id_hamapenyakit) {
                                                                                        echo 'selected';
                                                                                    } ?>>
                                            <?php echo $v->nama_hamapenyakit; ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Gejala</th>
                                            <th>Bobot</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        foreach ($revise as $key => $value) :
                                            $id_re = $value->id_re ?>
                                            <tr>
                                                <td><?php echo $no++; ?></td>
                                                <td><?php echo $value->nama_gejala; ?>
                                                    <input type="hidden" name="gejala[]" value="<?= $value->id_gejala ?>">
                                                </td>
                                                <td>
                                                    <select class="form-control" name="bobot[]" id="bobot[]" required>
                                                        <?php foreach ($this->db->select('*')->from('bobot')->get()->result() as $bob) : ?>
                                                            <option value="<?= $bob->id_bobot; ?>"><?php echo $bob->bobot; ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                            <a href="<?php echo base_url('Revisi') ?>" class="btn btn-warning"></i>Kembali</a>
                            <input type="submit" class="btn btn-success"></i>
                    </div>
                    </form>
                </div>
            </div>

        </main>



        <!-- footer -->
        <?php $this->load->view('admin/template/footer.php') ?>
        <!-- end footer -->
    </div>