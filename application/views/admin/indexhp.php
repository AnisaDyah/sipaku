<?php $this->load->view('admin/template/header.php') ?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4"></h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="User">Dashboard</a></li>
                <li class="breadcrumb-item active">Hama dan Penyakit</li>
            </ol>
            <div class="card mb-4">
                <div class="card-header"><i class="fas fa-table mr-1"></i>Data Hama dan Penyakit</div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <td>No.</td>
                                    <td>Kode</td>
                                    <td>Nama Hama Penyakit</td>
                                    <td>Gambar</td>
                                    <td>Keterangan</td>
                                    <td>Solusi</td>
                                    <td>
                                        <button type="button" id="btn-tambah" data-toggle="modal" data-target="#modal-add" class="btn btn-success pull-right">
                                            <i class="fas fa-plus"></i>Tambah</button>
                                    </td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                $kode = "P00";
                                $kd_hamapenyakit = $kode . $no;
                                foreach ($data->result_array() as $i) :
                                    $nama_hamapenyakit = $i['nama_hamapenyakit'];
                                    $gambar = $i['gambar'];
                                    $keterangan = $i['keterangan'];
                                    $solusi = $i['solusi'];
                                ?>
                                    <tr>
                                        <td><?php echo $no++; ?></td>
                                        <td><?php echo $kd_hamapenyakit++; ?></td>
                                        <td><?php echo $nama_hamapenyakit; ?></td>
                                        <td>
                                            <img src="<?php echo base_url() ?>/assets/upload/<?php echo $gambar ?>" alt="" width=100 height=100>
                                        </td>
                                        <td><?php echo $keterangan; ?></td>
                                        <td><?php echo $solusi; ?></td>
                                        <td style="width: 120px;">
                                            <a href="" class="btn btn-info" data-toggle="modal" data-target="#modal_edit<?php echo $i['kd_hamapenyakit']; ?>"><i class="fas fa-pencil-alt"></i></a>
                                            <a href="" class="btn btn-danger" data-toggle="modal" data-target="#modal_hapus<?php echo $i['kd_hamapenyakit']; ?>"><i class="fas fa-trash-alt"></i></a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
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
                    <h3 class="modal-title" id="myModalLabel">Tambahkan Data Hama dan Penyakit</h3>
                </div>
                <form class="form-horizontal" method="post" enctype="multipart/form-data" action="<?php echo base_url() . 'Hamapenyakit/simpan_hp' ?>">
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="hidden" name="kd_hamapenyakit" value="<?php echo $kd_hamapenyakit; ?>">
                            <label class="control-label col-xs-3">Nama Hama dan Penyakit</label>
                            <div class="col-xs-8">
                                <input name="nama_hamapenyakit" class="form-control" type="text" placeholder="Masukkan Nama Hama dan Penyakit..." required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-xs-3">Gambar</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="file" name="file" required>
                                <label class="custom-file-label" for="customFile">Unggah Gambar</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-xs-3">Keterangan</label>
                            <div class="col-xs-8">
                                <textarea name="keterangan" class="form-control" rows="3" required></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-xs-3">Solusi Pengendalian</label>
                            <div class="col-xs-8">
                                <textarea name="solusi" class="form-control" rows="3" required></textarea>
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
        $id_hamapenyakit = $i['id_hamapenyakit'];
        $kd_hamapenyakit = $i['kd_hamapenyakit'];
        $nama_hamapenyakit = $i['nama_hamapenyakit'];
        $gambar = $i['gambar'];
        $keterangan = $i['keterangan'];
        $solusi = $i['solusi'];
    ?>
        <div class="modal fade" id="modal_edit<?php echo $kd_hamapenyakit; ?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title" id="myModalLabel">Edit Data Hama Penyakit</h3>
                    </div>
                    <form class="form-horizontal" method="post" enctype="multipart/form-data" action="<?php echo base_url() . 'Hamapenyakit/edit_hp' ?>">
                        <div class="modal-body">
                            <div class="form-group">
                                <label class="control-label col-xs-3">Nama Hama Penyakit</label>
                                <div class="col-xs-8">
                                    <input type="hidden" name="kd_hamapenyakit" value="<?php echo $kd_hamapenyakit; ?>">
                                    <input type="hidden" name="id_hamapenyakit" value="<?php echo $id_hamapenyakit; ?>">
                                    <input name="nama_hamapenyakit" value="<?php echo $nama_hamapenyakit; ?>" class="form-control" type="text" placeholder="Nama Hama Penyakit..." required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-xs-3">Gambar</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="file" name="file" required>
                                    <label class="custom-file-label" for="customFile">Unggah Gambar</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-xs-3">Keterangan</label>
                                <div class="col-xs-8">
                                    <textarea class="form-control" name="keterangan" rows="3"><?php echo $keterangan; ?></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-xs-3">Solusi</label>
                                <div class="col-xs-8">
                                    <textarea class="form-control" name="solusi" rows="3" required><?php echo $solusi; ?></textarea>
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
        $id_hamapenyakit = $i['id_hamapenyakit'];
        $kd_hamapenyakit = $i['kd_hamapenyakit'];
        $nama_hamapenyakit = $i['nama_hamapenyakit'];
        $gambar = $i['gambar'];
        $keterangan = $i['keterangan'];
    ?>
        <!-- ============ MODAL HAPUS =============== -->
        <div class="modal fade" id="modal_hapus<?php echo $kd_hamapenyakit; ?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title" id="myModalLabel">Hapus Hama Penyakit</h3>
                    </div>
                    <form class="form-horizontal" method="post" action="<?php echo base_url() . 'Hamapenyakit/hapus_hp' ?>">
                        <div class="modal-body">
                            <p>Anda yakin mau menghapus <b><?php echo $nama_hamapenyakit; ?></b> ?</p>
                        </div>
                        <div class="modal-footer">
                            <input type="hidden" name="kd_hamapenyakit" value="<?php echo $kd_hamapenyakit; ?>">
                            <input type="hidden" name="id_hamapenyakit" value="<?php echo $id_hamapenyakit; ?>">
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