<section class="py-2">

    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="text-center">
                    <p class="mb-0"> SISTEM PAKAR PENYAKIT KULIT &copy; This template is made with&nbsp;
                        <svg class="bi bi-suit-heart-fill" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#458FF6" viewBox="0 0 16 16">
                            <path d="M4 1c2.21 0 4 1.755 4 3.92C8 2.755 9.79 1 12 1s4 1.755 4 3.92c0 3.263-3.234 4.414-7.608 9.608a.513.513 0 0 1-.784 0C3.234 9.334 0 8.183 0 4.92 0 2.755 1.79 1 4 1z"></path>
                        </svg>&nbsp;by&nbsp;<a class="text-black" href="https://themewagon.com/" target="_blank">ThemeWagon </a>
                    </p>
                </div>
            </div>
        </div>
    </div><!-- end of .container-->

</section>
<!-- <section> close ============================-->
<!-- ============================================-->

</html>

</main>
<!-- ===============================================-->
<!--    End of Main Content-->
<!-- ===============================================-->




<!-- ===============================================-->
<!--    JavaScripts-->
<!-- ===============================================-->
<script src="<?php echo base_url('assets_home/public/vendors/@popperjs/popper.min.js') ?>"></script>
<script src="<?php echo base_url('assets_home/public/vendors/bootstrap/bootstrap.min.js') ?>"></script>
<script src="<?php echo base_url('assets_home/public/vendors/is/is.min.js') ?>"></script>
<script src="https://polyfill.io/v3/polyfill.min.js?features=window.scroll"></script>
<script src="<?php echo base_url('assets_home/public/assets/js/theme.js') ?>"></script>

<link href="https://fonts.googleapis.com/css2?family=Mulish:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500&amp;display=swap" rel="stylesheet">
<script src="<?php echo base_url('assets/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') ?>"></script>
<script src="<?php echo base_url('assets/') ?>demo/datatables-demo.js"></script>

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