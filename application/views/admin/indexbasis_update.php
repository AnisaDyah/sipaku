<?php $this->load->view('admin/template/header.php') ?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4"></h1>
            <div class="card mb-4">
                <div class="card-header"><i class="fas fa-table mr-1"></i>Ubah Basis Kasus</div>
                <div class="card-body">
                    <form class="form-horizontal" method="post" action="<?php echo base_url() . 'Basis/update_kasus' ?>">
                        <input type="hidden" name="id_basiskasus" value="<?php echo $data[0]->id_basiskasus;   ?>">

                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Pilih Jenis Hama atau Penyakit</label>
                            <input type="text" class="form-control" id="id_hamapenyakit" name="id_hamapenyakit" value="<?= $data[0]->nama_hamapenyakit; ?>" readonly>
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
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Pilih Bobot</label>
                            <select class="form-control" id="id_bobot" name="id_bobot" required>
                                <?php foreach ($this->db->select('*')->from('bobot')->get()->result() as $v) : ?>
                                    <option value="<?= $v->id_bobot; ?>" <?php if ($v->id_bobot == $data[0]->id_bobot) {
                                                                                echo 'selected';
                                                                            } ?>>
                                        <?php echo $v->bobot; ?>
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
                                            <th>Bobot</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        foreach ($data as $key => $value) :
                                            $id_basiskasus = $value->id_basiskasus;
                                            $id_detailkasus = $value->id_detailkasus; ?>
                                            <tr>
                                                <td><?php echo $no++; ?></td>
                                                <td><?php echo $value->nama_gejala ?></td>
                                                <td>
                                                    <?php foreach ($this->db->select('*')->from('bobot')->where('id_bobot', $value->fk_bobot)->get()->result() as $v) :
                                                        echo $v->bobot;
                                                    endforeach; ?>
                                                </td>
                                                <td>
                                                    <!-- <?= $id_detailkasus; ?> -->
                                                    <a href="<?php echo base_url() . 'Basis/hapus_detail/' . $id_detailkasus . '/' . $id_basiskasus; ?>" class="btn btn-danger">
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
                        <a href="<?php echo base_url('Basis') ?>" class="btn btn-warning"></i>Kembali</a>
                        <button type="submit" class="btn btn-success"></i>Simpan Kasus</button>
                    </form>
                </div>

            </div>
        </div>
    </main>


    <!-- footer -->
    <?php $this->load->view('admin/template/footer.php') ?>
    <!-- end footer -->
</div>