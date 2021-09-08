<!DOCTYPE html>
<html lang="en">
    <!-- Header -->
    <?php $this->load->view('admin/template/header.php')?>
    <!-- End Header -->
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <a class="navbar-brand" href="#">S I P A K O</a>
            <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
            <!-- Navbar -->
            <?php $this->load->view('admin/template/navbar.php')?>
            <!-- End Navbar -->
            <div id="layoutSidenav">
                <div id="layoutSidenav_nav">
                    <!-- Sidebar -->
                    <?php $this->load->view('admin/template/sidebar.php')?>
                    <!-- End Sidebar -->
                </div>
                <div id="layoutSidenav_content">
                    <main>
                        <div class="container-fluid">
                            <h1 class="mt-4"> </h1>
                            <ol class="breadcrumb mb-4">
                                <li class="breadcrumb-item"><a href="user">Dashboard</a></li>
                                <li class="breadcrumb-item active">Basis Kasus</li>
                            </ol>
                            <div class="card mb-4">
                                <div class="card-header"><i class="fas fa-table mr-1"></i>Data Basis Kasus</div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                        <tr>
                                            <td>No.</td>
                                            <td>Kode</td>
                                            <td>Nama Gejala</td>
                                            <td>Bobot Gejala</td>
                                            <td>Nama Penyakit</td>
                                            <td>
                                            <a href="<?php echo base_url() ?>Basis/create/" class="btn btn-md btn-success"><i class="fas fa-plus"></i>Tambah</a>
                                            </td>
                                        </tr>
                                        </thead>
                                    <tbody>
                                        <?php 
                                        $no = 1;
                                        // $kode = "K00";
                                        // $kd_kasus = $kode.$no;
                                        foreach($data->result_array() as $i):
                                        $id_kasus=$i['id_basiskasus'];
                                        $fk_hamapenyakit=$i['nama_hamapenyakit'];
                                        ?>
                                        <tr>
                                            <td><?php echo $no++;?></td>
                                            <td><?php echo $i['kd_kasus'];?></td>
                                            <td>
                                            <?php $result = $this->db->query('SELECT * FROM detail_kasus INNER JOIN gejala on detail_kasus.fk_gejala = gejala.id_gejala WHERE fk_kasus = '.$id_kasus)->result_array();
                                            foreach($result as $v):
                                                echo $v['kd_gejala']." | ".$v['nama_gejala'];
                                                echo "<br>";
                                            endforeach;?>
                                            </td>
                                            <td>
                                            <?php $result = $this->db->query('SELECT * FROM detail_kasus INNER JOIN bobot on detail_kasus.fk_bobot = bobot.id_bobot WHERE fk_kasus = '.$id_kasus.' order by id_detailkasus')->result_array();
                                            foreach($result as $v):
                                                echo $v['bobot'];
                                                echo "<br>";
                                            endforeach;?>
                                            </td>
                                            <td>
                                            <?php echo $fk_hamapenyakit;?>
                                            </td>
                                            <td>
                                                <a href="" class="btn btn-secondary" data-toggle="modal" data-target="#modal-edit<?php echo $i['kd_kasus'];?>">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <a href="<?php echo base_url() ?>Basis/update/<?= $id_kasus;?>" class="btn btn-md btn-info">
                                                    <i class="fas fa-pencil-alt"></i>
                                                </a>
                                                <a href="" class="btn btn-danger" data-toggle="modal" data-target="#modal_delete<?php echo $id_kasus;?>">
                                                    <i class="fas fa-trash-alt"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        <?php endforeach;?>
                                    </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </main>

                    <!-- ============ MODAL EDIT =============== -->
                    <?php foreach($data->result_array() as $i):
                        $id_kasus=$i['id_basiskasus'];
                        $fk_hamapenyakit=$i['nama_hamapenyakit'];
                        $id2_hamapenyakit=$i['id_hamapenyakit'];
                        $kd_kasus=$i['kd_kasus'];
                    ?>
                    <div class="modal fade" id="modal-edit<?php echo $kd_kasus;?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h3 class="modal-title" id="myModalLabel">Edit Jenis Hama dan Penyakit</h3>
                            </div>
                            <form class="form-horizontal" method="post" action="<?php echo base_url().'Basis/hp_kasus/'.$id_kasus?>">
                            <div class="modal-body">
                                <div class="form-group">
                                    <label class="control-label col-xs-3" >Pilih Jenis Hama dan Penyakit</label>
                                    <select class="form-control" id="id_hamapenyakit" name="id_hamapenyakit" required>
                                        <?php foreach($this->db->select('*')->from('hamapenyakit')->get()->result_array() as $v):
                                        $id_hamapenyakit=$v['id_hamapenyakit'];
                                        $nama_hamapenyakit=$v['nama_hamapenyakit'];
                                        ?>
                                        <option value="<?= $v['id_hamapenyakit'];?>" <?php if ($id_hamapenyakit == $id2_hamapenyakit) { echo 'selected'; } ?>><?php echo $nama_hamapenyakit; ?></option>
                                        <?php endforeach;?>
                                    </select>
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
                    <?php endforeach;?>
                    <!-- ============ END MODAL EDIT =============== -->
                    
    
                    <?php foreach($data->result_array() as $i):
                    $id_kasus=$i['id_basiskasus'];
                    $kd_kasus=$i['kd_kasus'];
                    $fk_hamapenyakit=$i['nama_hamapenyakit'];
                    ?>
                    <!-- ============ MODAL HAPUS =============== -->
                    <div class="modal fade" id="modal_delete<?php echo $id_kasus;?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h3 class="modal-title" id="myModalLabel">Hapus Kasus</h3>
                            </div>
                            <form class="form-horizontal" method="post" action="<?php echo base_url().'Basis/hapus_basis'?>">
                            <div class="modal-body">
                                <p>Anda yakin mau menghapus data basis kasus<b><?php echo $kd_kasus;?></b> ?</p>
                            </div>
                            <div class="modal-footer">
                                <input type="hidden" name="kd_kasus" value="<?php echo $kd_kasus;?>">
                                <input type="hidden" name="id_basiskasus" value="<?php echo $id_kasus;?>">
                                <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                                <button class="btn btn-danger">Hapus</button>
                            </div>
                            </form>
                        </div>
                    </div>
                    </div>
                    <?php endforeach;?>
                    <!-- ============ END MODAL HAPUS =============== -->
                    
                    <!-- footer -->
                    <?php $this->load->view('admin/template/footer.php')?>
                    <!-- end footer -->
                </div>
            </div>
        <script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="<?php echo base_url('assets/')?>js/scripts.js"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
        <script src="<?php echo base_url('assets/')?>demo/datatables-demo.js"></script>
        <script>
        $(document).ready(function(){
            $('#mydata').DataTable();
            });
            </script>
    </body>
</html>