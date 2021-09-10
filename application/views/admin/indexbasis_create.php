<?php $this->load->view('admin/template/header.php') ?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4"></h1>
            <div class="card mb-4">
                <div class="card-header"><i class="fas fa-table mr-1"></i>Tambah Data Kasus Pada Basis Kasus</div>
                <div class="card-body">
                    <form class="form-horizontal" method="post" action="<?php echo base_url() . 'Basis/simpan_kasus' ?>">
                        <?php
                        $kd = $this->db->select('id_basiskasus,kd_kasus')->from('basiskasus')->order_by('id_basiskasus', 'desc')->get()->result();
                        if ($kd == null) {
                            $kd_basiskasus = 'K1';
                        } else {
                            $angka = preg_replace("/K/", "", $kd[0]->kd_kasus);
                            $angka++;
                            $kd_basiskasus = 'K' . $angka;
                        }
                        ?>
                        <div class="form-group">
                            <label for="kd_kasus">Kode Kasus</label>
                            <input type="text" name="kd_kasus" id="kd_kasus" class="form-control" value="<?= $kd_basiskasus ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Pilih Jenis Hama atau Penyakit</label>
                            <select class="form-control" id="id_hamapenyakit" name="id_hamapenyakit" required>
                                <?php foreach ($data->result_array() as $i) :
                                    $id_hamapenyakit = $i['id_hamapenyakit'];
                                    $nama_hamapenyakit = $i['nama_hamapenyakit'];
                                ?>
                                    <option value="<?php echo $id_hamapenyakit; ?>"><?php echo $nama_hamapenyakit; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <div class="form-check">
                                <div class="row">
                                    <div class="col-md-6"><label for="gejala">Pilih Gejala</label></div>
                                    <div class="col-md-6"> <label for="bobot">Pilih Bobot</label></div>
                                </div>
                                <div class="row">
                                    <?php $no = 1;
                                    foreach ($gejala->result_array() as $v) : ?>
                                        <div class="col-md-6">
                                            <input type="checkbox" name="gejala[<?= $no ?>]" id="gejala[]" value=<?= $v['id_gejala']; ?>>
                                            <?= $v['nama_gejala']; ?>
                                            <br>
                                            <!-- <input type="text" name="no_gejala[]" value="<?= $no ?>" hidden=""> -->
                                        </div>
                                        <div class="col-md-6">
                                            <select class="form-control" name="bobot[<?= $no ?>]" id="bobot[]" required>
                                                <option selected disabled="">Pilih Bobot</option>
                                                <option value="1">1 - Sedang</option>
                                                <option value="2">3 - Normal</option>
                                                <option value="3">5 - Tinggi</option>
                                            </select>
                                            <input type="text" name="no_bobot[]" value="<?= $no ?>" hidden="">
                                            <br>
                                        </div>

                                    <?php $no++;
                                    endforeach; ?>
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