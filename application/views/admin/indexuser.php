<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Dashboard Admin</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/css/styles.css') ?>">
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>
    </head>
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
                            <li class="breadcrumb-item"><a href="User">Dashboard</a></li>
                            <li class="breadcrumb-item active">Pengguna</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-body">
                                <h2>INFORMASI MENU USER</h2>  
                                <li>
                                    Menu <i class='fas fa-user-circle'></i>Data User<br>
                                    Menu untuk mendaftarkan pengguna yang dapat mengakses halaman admin untuk mengelola data.
                                </li>
                            </div>
                            </div>
                        <div class="card mb-4">
                            <div class="card-header"><i class="fas fa-table mr-1"></i>Data Pengguna</div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <td>No.</td>
                                            <td>Username</td>
                                            <td>Password</td>
                                            <td>
                                                <button type="button" id="btn-tambah" data-toggle="modal" data-target="#modal-add" class="btn btn-success pull-right"><i class="fas fa-plus"></i>Tambah</a>
                                            </td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($data->result_array() as $i):
                                        $id_user=$i['id_user'];
                                        $username=$i['username'];
                                        $password=$i['password'];
                                        ?>
                                        <tr>
                                            <td><?php echo $id_user;?></td>
                                            <td><?php echo $username;?></td>
                                            <td><?php echo $password;?></td>
                                            <td style="width: 120px;">
                                            <a href="" class="btn btn-info" data-toggle="modal" data-target="#modal-edit<?php echo $id_user;?>"><i class="fas fa-pencil-alt"></i></a>
                                            <a href="" class="btn btn-danger" data-toggle="modal" data-target="#modal-delete<?php echo $id_user;?>"><i class="fas fa-trash-alt"></i></a>
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
                            <h3 class="modal-title" id="myModalLabel">Tambahkan User</h3>
                        </div>
                        <form class="form-horizontal" method="post" action="<?php echo base_url().'Users/simpan_user'?>">
                        <div class="modal-body">
                            <div class="form-group">
                                <label class="control-label col-xs-3" >Username</label>
                                <div class="col-xs-8">
                                    <input name="username" class="form-control" type="text" placeholder="Username..." required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-xs-3" >Password</label>
                                <div class="col-xs-8">
                                    <input type="password" name="password" class="form-control" type="text" placeholder="Password..." required>
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
            $id_user=$i['id_user'];
            $username=$i['username'];
            $password=$i['password'];
            ?>
            <div class="modal fade" id="modal-edit<?php echo $id_user;?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title" id="myModalLabel">Edit</h3>
                    </div>
                    <form class="form-horizontal" method="post" action="<?php echo base_url().'Users/edit_user'?>">
                    <div class="modal-body">
                        <div class="form-group">
                            <label class="control-label col-xs-3" >Username</label>
                            <div class="col-xs-8">
                                <input type="hidden" name="id_user" value="<?php echo $id_user;?>">
                                <input name="username" value="<?php echo $username;?>" class="form-control" type="text" placeholder="Username...">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-xs-3" >Password</label>
                            <div class="col-xs-8">
                                <input name="password" type="password" value="<?php echo $password;?>" class="form-control" type="text" placeholder="Password..." required>
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
            $id_user=$i['id_user'];
            $username=$i['username'];
            $password=$i['password'];
            ?>
            <!-- ============ MODAL HAPUS =============== -->
            <div class="modal fade" id="modal-delete<?php echo $id_user;?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title" id="myModalLabel">Hapus Data User</h3>
                    </div>
                    <form class="form-horizontal" method="post" action="<?php echo base_url().'Users/hapus_user'?>">
                    <div class="modal-body">
                        <p>Anda yakin mau menghapus <b><?php echo $username;?></b> ?</p>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="id_user" value="<?php echo $id_user;?>">
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
        <script src="assets/js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/datatables-demo.js"></script>
        <script>
        $(document).ready(function(){
            $('#mydata').DataTable();
            });
            </script>
    </body>
</html>