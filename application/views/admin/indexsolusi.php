            <?php $this->load->view('admin/template/header.php') ?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4"> </h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="user">Dashboard</a></li>
                            <li class="breadcrumb-item active">Solusi</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-body">
                                <h2>INFORMASI MENU SOLUSI</h2>
                                <li> Menu Solusi merupakan solusi dari Hama dan Penyakit</li>
                                <li> Pada submenu Solusi, Anda dapat menambahkan data Solusi pada tombol <button type="button" class="btn btn-success" disabled><i class="fas fa-plus"></i>Tambah</button><br>
                                <li> Mengubah data Solusi pada tombol <button type="button" class="btn btn-info" disabled><i class="fas fa-pencil-alt"></i></button>
                                    & Menghapus data Solusi pada tombol <button type="button" class="btn btn-danger" disabled><i class="fas fa-trash-alt"></i></button>
                                </li>
                            </div>
                        </div>
                        <div class="card mb-4">
                            <div class="card-header"><i class="fas fa-table mr-1"></i>Data Solusi Hama dan Penyakit</div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <td>Kode</td>
                                                <td>Jenis Hama dan Penyakit</td>
                                                <td>Solusi Pengendalian</td>
                                                <td>
                                                    <button type="button" id="btn-tambah" data-toggle="modal" data-target="#modal-add" class="btn btn-success pull-right"> <i class="fas fa-plus"></i>Tambah</a>
                                                </td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($data->result_array() as $i) :
                                                $kd_solusi = $i['kd_solusi'];
                                                $nama_hamapenyakit = $i['nama_hamapenyakit'];
                                                $solusi = $i['solusi'];
                                            ?>
                                                <tr>
                                                    <td><?php echo $kd_solusi; ?></td>
                                                    <td>
                                                        <?php echo $nama_hamapenyakit; ?>
                                                    </td>
                                                    <td><?php echo $solusi; ?></td>
                                                    <td style="width: 120px;">
                                                        <a href="" class="btn btn-info" data-toggle="modal" data-target="#modal-edit<?php echo $kd_solusi; ?>"><i class="fas fa-pencil-alt"></i></a>
                                                        <a href="" class="btn btn-danger" data-toggle="modal" data-target="#modal-delete<?php echo $kd_solusi; ?>"><i class="fas fa-trash-alt"></i></a>
                                                    </td>
                                                </tr>
                                            <?php endforeach;
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>

                <!-- ============ MODAL ADD =============== -->
                <div class="modal fade" id="modal-add" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h3 class="modal-title" id="myModalLabel">Tambahkan Data Solusi</h3>
                            </div>
                            <form class="form-horizontal" method="post" action="<?php echo base_url() . 'Solusi/simpan_solusi' ?>">
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label class="control-label col-xs-3">Kode Solusi</label>
                                        <div class="col-xs-8">
                                            <input name="kd_solusi" class="form-control" type="text" placeholder="Kode Solusi..." required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-xs-3">Pilih Jenis Hama dan Penyakit</label>
                                        <div class="col-xs-8">
                                            <div class="col-xs-8">
                                                <select class="form-control" id="exampleFormControlSelect1">
                                                    <?php foreach ($data_hp->result_array() as $i) :
                                                        $id_solusi = $i['id_solusi'];
                                                        $id_hamapenyakit = $i['id_hamapenyakit'];
                                                        $nama_hamapenyakit = $i['nama_hamapenyakit'];
                                                    ?>
                                                        <option id="<?php echo $id_hamapenyakit; ?>"><?php echo $nama_hamapenyakit; ?></option>
                                                    <?php endforeach; ?>
                                                    <input name="id_solusi" class="form-control" type="hidden" value="<?php echo $id_solusi; ?>" required>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-xs-3">Solusi Pengendalian</label>
                                        <div class="col-xs-8">
                                            <textarea name="solusi" class="form-control" type="text" placeholder="Solusi..." required>
                                            </textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                                    <button class="btn btn-info">Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- ============ END MODAL ADD =============== -->

                <!-- ============ MODAL EDIT =============== -->
                <?php foreach ($data->result_array() as $i) :
                    $kd_solusi = $i['kd_solusi'];
                    $solusi = $i['solusi'];
                ?>
                    <div class="modal fade" id="modal-edit<?php echo $kd_solusi; ?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h3 class="modal-title" id="myModalLabel">Edit Data Solusi</h3>
                                </div>
                                <form class="form-horizontal" method="post" action="<?php echo base_url() . 'Solusi/edit_solusi' ?>">
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label class="control-label col-xs-3">Id Gejala</label>
                                            <div class="col-xs-8">
                                                <input name="kd_solusi" value="<?php echo $kd_solusi; ?>" class="form-control" type="text" placeholder="Kode..." required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-xs-3">Jenis Hama dan Penyakit</label>
                                            <div class="col-xs-8">
                                                <select class="form-control" id="exampleFormControlSelect1">
                                                    <?php foreach ($data_hp->result_array() as $i) :
                                                        $id_solusi = $i['id_solusi'];
                                                        $id_hamapenyakit = $i['id_hamapenyakit'];
                                                        $nama_hamapenyakit = $i['nama_hamapenyakit'];
                                                    ?>
                                                        <option id="<?php echo $id_hamapenyakit; ?>"><?php echo $nama_hamapenyakit; ?></option>
                                                    <?php endforeach; ?>
                                                    <input name="id_solusi" class="form-control" type="hidden" value="<?php echo $id_solusi; ?>" required>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-xs-3">Solusi Pengendalian</label>
                                            <div class="col-xs-8">
                                                <textarea name="solusi" class="form-control" type="text" placeholder="Solusi..." required><?php echo $solusi; ?></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                                        <button class="btn btn-info">Update</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
                <!-- ============ END MODAL EDIT =============== -->

                <?php foreach ($data->result_array() as $i) :
                    $kd_solusi = $i['kd_solusi'];
                    $solusi = $i['solusi'];
                ?>
                    <!-- ============ MODAL HAPUS =============== -->
                    <div class="modal fade" id="modal-delete<?php echo $kd_solusi; ?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h3 class="modal-title" id="myModalLabel">Hapus Solusi</h3>
                                </div>
                                <form class="form-horizontal" method="post" action="<?php echo base_url() . 'Solusi/hapus_solusi' ?>">
                                    <div class="modal-body">
                                        <p>Anda yakin mau menghapus <b><?php echo $solusi; ?></b> ?</p>
                                    </div>
                                    <div class="modal-footer">
                                        <input type="hidden" name="kd_solusi" value="<?php echo $kd_solusi; ?>">
                                        <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                                        <button class="btn btn-danger">Hapus</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
                <!-- ============ END MODAL HAPUS =============== -->
                <!-- footer -->
                <?php $this->load->view('admin/template/footer.php') ?>
                <!-- end footer -->

            </div>