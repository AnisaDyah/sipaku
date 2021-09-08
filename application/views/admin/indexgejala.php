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
                            <h1 class="mt-4"></h1>
                            <ol class="breadcrumb mb-4">
                                <li class="breadcrumb-item"><a href="User">Dashboard</a></li>
                                <li class="breadcrumb-item active">Gejala</li>
                            </ol>
                            <div class="card mb-4">
                                <div class="card-header"><i class="fas fa-table mr-1"></i>Data Gejala</div>
                                <div class="card-body">
                                <?php echo $this->session->flashdata('notif') ?>
                                    <div class="table-responsive">
                                        <table class="table table-bordered" id="mydata" width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <td>No.</td>
                                                    <td>Kode</td>
                                                    <td>Nama Gejala</td>
                                                    <td>
                                                        <button type="button" id="btn-tambah" data-toggle="modal" data-target="#modal-add" class="btn btn-success pull-right">
                                                        <i class="fas fa-plus"></i>Tambah</a></button>
                                                    </td>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php 
                                                $no = 1;
                                                $kode = "G00";
                                                $kd_gejala = $kode.$no;
                                                foreach($data->result_array() as $i):;
                                                $nama_gejala=$i['nama_gejala'];
                                                ?>
                                                <tr>
                                                    <td><?php echo $no++;?></td>
                                                    <td><?php echo $kd_gejala++;?></td>
                                                    <td><?php echo $nama_gejala;?></td>
                                                    <td style="width: 120px;">
                                                    <a href="" class="btn btn-info" data-toggle="modal" data-target="#modal-edit<?php echo $i['kd_gejala'];?>"><i class="fas fa-pencil-alt"></i></a>
                                                    <a href="" class="btn btn-danger" data-toggle="modal" data-target="#modal-delete<?php echo $i['kd_gejala'];?>"><i class="fas fa-trash-alt"></i></a>
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
                    
                    <!-- ============ MODAL ADD =============== -->
                    <div class="modal fade" id="modal-add" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h3 class="modal-title" id="myModalLabel">Tambahkan Data Gejala</h3>
                                </div>
                                <form class="form-horizontal" method="post" action="<?php echo base_url().'Gejala/simpan_gejala'?>">
                                <div class="modal-body">
                                    <div class="form-group">
                                        <input type="hidden" name="kd_gejala" value="<?php echo $kd_gejala;?>">
                                        <label class="control-label col-xs-3" >Nama Gejala</label>
                                        <div class="col-xs-8">
                                            <input name="nama_gejala" class="form-control" type="text" placeholder="Masukkan Nama Gejala..." required>
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
                    <?php foreach($data->result_array() as $i):
                    $id_gejala=$i['id_gejala'];
                    $kd_gejala=$i['kd_gejala'];
                    $nama_gejala=$i['nama_gejala'];
                    ?>
                    <div class="modal fade" id="modal-edit<?php echo $kd_gejala;?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h3 class="modal-title" id="myModalLabel">Edit Data Gejala</h3>
                            </div>
                            <form class="form-horizontal" method="post" action="<?php echo base_url().'Gejala/edit_gejala'?>">
                            <div class="modal-body">
                                <div class="form-group">
                                    <label class="control-label col-xs-3" >Nama Gejala</label>
                                    <div class="col-xs-8">
                                        <input type="hidden" name="kd_gejala" value="<?php echo $kd_gejala;?>">
                                        <input type="hidden" name="id_gejala" value="<?php echo $id_gejala;?>">
                                        <input name="nama_gejala" value="<?php echo $nama_gejala;?>" class="form-control" type="text" placeholder="Edit Nama Gejala..." required>
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
                    <?php endforeach;?>
                    <!-- ============ END MODAL EDIT =============== -->
           
                    <?php foreach($data->result_array() as $i):
                    $nama_gejala=$i['nama_gejala'];
                    $kd_gejala=$i['kd_gejala'];
                    $id_gejala=$i['id_gejala'];
                    ?>
                    <!-- ============ MODAL HAPUS =============== -->
                    <div class="modal fade" id="modal-delete<?php echo $kd_gejala;?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h3 class="modal-title" id="myModalLabel">Hapus Gejala</h3>
                            </div>
                            <form class="form-horizontal" method="post" action="<?php echo base_url().'Gejala/hapus_gejala'?>">
                            <div class="modal-body">
                                <p>Anda yakin mau menghapus <b><?php echo $nama_gejala;?></b> ?</p>
                            </div>
                            <div class="modal-footer">
                                <input type="hidden" name="kd_gejala" value="<?php echo $kd_gejala;?>">
                                <input type="hidden" name="id_gejala" value="<?php echo $id_gejala;?>">
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
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="<?php echo base_url('assets/')?>demo/chart-area-demo.js"></script>
        <script src="<?php echo base_url('assets/')?>demo/chart-bar-demo.js"></script>
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