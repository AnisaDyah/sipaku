<!-- footer -->
<footer class="py-4 bg-light mt-auto">
  <div class="container-fluid">
    <div class="d-flex align-items-center justify-content-between small">
      <div class="text-muted">Copyright &copy; SISTEM PAKAR PENYAKIT KULIT 2021</div>
    </div>
  </div>
</footer>
<!-- end footer -->
</div>
</div>

<script src=" <?php echo base_url('assets/jquery-3.4.1.min.js') ?>" crossorigin="anonymous"></script>
<script src="<?php echo base_url('assets/bootstrap/4.3.1/js/bootstrap.bundle.min.js') ?>" crossorigin="anonymous"></script>
<script src="<?php echo base_url('assets/js/scripts.js') ?>"></script>
<script src="<?php echo base_url('assets/ajax/libs/Chart.js/2.8.0/Chart.min.js') ?>" crossorigin="anonymous"></script>
<script src="<?php echo base_url('assets/demo/chart-area-demo.js') ?>"></script>
<script src="<?php echo base_url('assets/demo/chart-bar-demo.js') ?>"></script>
<script src="<?php echo base_url('assets/js/jquery.dataTables.min.js') ?>" crossorigin="anonymous"></script>
<script src="<?php echo base_url('assets/js/dataTables.bootstrap4.min.js') ?>" crossorigin="anonymous"></script>
<script src="<?php echo base_url('assets/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') ?>"></script>
<script src="<?php echo base_url('assets/demo/datatables-demo.js') ?>"></script>
<script>
  $(document).ready(function() {
    $('#mydata').DataTable();
  });
</script>
<script>
  $(function() {
    //Date picker
    $('#datepicker').datepicker({
      autoclose: true,
      format: 'yyyy-mm-dd'
    })

    $('#datepicker2').datepicker({
      autoclose: true,
      format: 'yyyy-mm-dd'
    })

    $('#datepicker3').datepicker({
      autoclose: true,
      format: 'yyyy-mm-dd'
    })

    //Date picker Bulan
    $('#datepickerbulan').datepicker({
      autoclose: true,
      format: 'M yyyy'
    })

    $('#datepickerbulan2').datepicker({
      autoclose: true,
      format: 'M yyyy'
    })
    $('#datepickerbulan3').datepicker({
      autoclose: true,
      format: 'M yyyy'
    })


  })
</script>
</body>

</html>