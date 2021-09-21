<!DOCTYPE html>
<html>

<head>
    <title></title>
</head>

<body>
    <table style="margin-left: auto; margin-right: auto;">
        <tbody>
            <tr>
                <td colspan="2" width="605">
                    <p style="text-align: center;"><strong>&nbsp;Hasil Diagnosa</strong></p>
                    <p style="text-align: center;"><strong>&nbsp;Sistem Pakar Penyakit Kulit ( SIPAKU )</strong></p>
                </td>
            </tr>
            <tr>
                <td colspan="2" width="20%">
                    <p style="text-align: right;"> <?= $user['tanggal'] ?></p>
                </td>
            </tr>
            </tbody>
    </table>
                    <p style="text-align: left;">Nama &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : &nbsp;<strong> <?= $user['nama_lengkap'] ?></p>
                    <p style="text-align: left;">Alamat &nbsp;&nbsp;&nbsp;&nbsp; : &nbsp;<strong> <?= $user['alamat'] ?></p>
                    <p style="text-align: left;">Umur &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : &nbsp;<strong> <?= $user['umur'] ?> Tahun</p>
                    <p style="text-align: left;">No. Telp &nbsp;&nbsp; : &nbsp;<strong> <?= $user['no_hp'] ?></p>

    <h4 class="fw-bold lh-base text-center text-white" style="text-align: center;">Hasil Diagnosa</h4>
    <hr class="mx-auto" style="height:2px;width:350px;">
    <div class="form-group">
        <div class="row justify-content-center">
            <div class="col-md-8 mb-2">
                <h4 class="fw-bold lh-base text-white">Berdasarkan gejala yang anda rasakan :</h4>
                <?php foreach ($penyakit_terpilih->gejala_selected as $ge) {?> 
                <span>-> <?= $ge->nama_gejala ;?></span><br>
                <?php } ?>
                <h4 class="fw-bold lh-base text-white">Penyakit kulit yang anda alami adalah :
                    <?= $penyakit_terpilih->nama_penyakit?>
                </h4>
                <h4 class="fw-bold lh-base text-white">Dengan Prosentase Kemungkinan Sebesar :
                    <?= $penyakit_terpilih->perhitungan_fc ?> %</h4>
                <h4 class="fw-bold lh-base text-white">Saran Pengobatan yang harus dilakukan adalah :<br>
                    <?= $penyakit_terpilih->solusi ?>
                </h4>
            </div>
        </div>
    </div>
</body>

</html>