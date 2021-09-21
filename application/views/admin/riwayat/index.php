<?php $this->load->view('admin/template/header.php') ?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4"> </h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="User">Dashboard</a></li>
                <li class="breadcrumb-item active">Riwayat Diagnosa</li>
            </ol>
            <!-- <div class="x_content"> -->
            <?php $error = $this->session->flashdata('message');
            if ($error) { ?>
                <div class="alert alert-danger alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <?php echo $error; ?>
                </div>
            <?php } ?>
            <div class="card mb-4">
                <div class="card-header"><i class="fas fa-table mr-1"></i>Data Riwayat Diagnosa

                    <button type="button" name="button" class="btn btn-warning pull-right " style="float:right;" data-toggle="modal" data-target="#modal-cetak"> <i class="fa fa-print"></i> Cetak Riwayat Diagnosa</button>

                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th class="text-center">No.</th>
                                    <th class="text-center">Tanggal</th>
                                    <th class="text-center">Nama Pasien</th>
                                    <th class="text-center">Hasil Diagnosa</th>
                                    <th class="text-center">Gejala</th>
                                    <th class="text-center" width="10%">Persentase Hasil Diagnosa (%)</th>
                                    <!-- <th></th> -->
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($konsul as $key => $value) :
                                    $id_diagnosa = $value->id_diagnosa ?>
                                    <tr>
                                        <td class="text-center"><?php echo $no++; ?></td>
                                        <td><?php echo $value->tgl_diagnosa ?></td>
                                        <td><?php echo $value->nama_lengkap ?></td>
                                        <td><?php echo $value->nama_penyakit ?></td>
                                        <td>
                                            <?php $result = $this->db->query('SELECT * FROM detail_diagnosa INNER JOIN mst_gejala on mst_gejala.id_gejala = detail_diagnosa.id_gejala WHERE id_diagnosa = ' . $id_diagnosa)->result_array();
                                            foreach ($result as $v) :
                                                echo $v['kode_gejala'] . " | " . $v['nama_gejala'];
                                                echo "<br>";
                                            endforeach; ?>
                                        </td>
                                        <td class="text-center"><?php echo $value->bobot ?></td>
                                        <!-- <td>
                                            <a href="" class="btn btn-danger" data-toggle="modal" data-target="#modal-delete<?php echo $id_diagnosa; ?>"><i class="fas fa-trash-alt"></i></a>
                                        </td> -->
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- <?php foreach ($konsul as $key => $value) :
                $id_diagnosa = $value->id_diagnosa ?>
        <tr> -->
    <!-- ============ MODAL HAPUS =============== -->
    <div class="modal fade" id="modal-cetak" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Pilih Periode Riwayat</h4>
                </div>
                <form class="form-horizontal" method="post" action="<?php echo base_url() . 'RiwayatDiagnosaController/cetak' ?>">
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Tanggal Awal</label>
                            <input type="text" name="tgl_awal" class="form-control pull-right" id="datepicker" placeholder="YYYY-MM-DD">
                        </div>
                        <div class="form-group">
                            <label>Tanggal Akhir</label>
                            <input type="text" name="tgl_akhir" class="form-control pull-right" id="datepicker2" placeholder="YYYY-MM-DD">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <!-- <input type="hidden" name="id_diagnosa" value="<?php echo $id_diagnosa; ?>"> -->
                        <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                        <button class="btn btn-warning"><i class="fa fa-print"></i> Cetak</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- <?php endforeach; ?> -->
    <!-- ============ END MODAL HAPUS =============== -->

    <!-- footer -->
    <?php $this->load->view('admin/template/footer.php') ?>
    <!-- end footer -->
</div>