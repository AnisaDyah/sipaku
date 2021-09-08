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
                                <li class="breadcrumb-item active">Revisi</li>
                            </ol>
                            <div class="card mb-4">
                                <div class="card-header"><i class="fas fa-table mr-1"></i>Data Revisi</div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>Tanggal</th>
                                                <th>Hasil Diagnosa</th>
                                                <th>Persentasi Hasil Diagnosa (%)</th>
                                                <th>Detail Revisi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php 
                                        $no = 1;
                                        foreach ($revise as $key => $value) :
                                            $id_re = $value->id_re ?>
                                            <tr>
                                                <td><?php echo $no++;?></td>
                                                <td><?php echo $value->tanggal ?></td>
                                                <td><?php echo $value->fk_hamapenyakit ?></td>
                                                <td><?php echo $value->persentase ?></td>
                                                <td>
                                                <a href="<?php echo base_url('Revisi/detail/'.$value->id_re) ?>" class="btn btn-md btn-info">Detail Diagnosa</a>
                                                <a href="" class="btn btn-danger" data-toggle="modal" data-target="#modal-delete<?php echo $id_re;?>"><i class="fas fa-trash-alt"></i></a>
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

                    <?php foreach ($revise as $key => $value) :
                    $id_re = $value->id_re ?>
                    <tr>
                    <!-- ============ MODAL HAPUS =============== -->
                    <div class="modal fade" id="modal-delete<?php echo $id_re;?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h3 class="modal-title" id="myModalLabel">Hapus Data Revisi</h3>
                            </div>
                            <form class="form-horizontal" method="post" action="<?php echo base_url().'Revisi/hapus_revisi'?>">
                            <div class="modal-body">
                                <p>Anda yakin mau menghapus ?</p>
                            </div>
                            <div class="modal-footer">
                                <input type="hidden" name="id_re" value="<?php echo $id_re;?>">
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
    </body>
</html>