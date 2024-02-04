
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.2.0
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="<?= APPADM ?>assets/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?= APPADM ?>assets/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="<?= APPADM ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="<?= APPADM ?>assets/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="<?= APPADM ?>assets/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="<?= APPADM ?>assets/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="<?= APPADM ?>assets/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?= APPADM ?>assets/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="<?= APPADM ?>assets/plugins/moment/moment.min.js"></script>
<script src="<?= APPADM ?>assets/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?= APPADM ?>assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="<?= APPADM ?>assets/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?= APPADM ?>assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= APPADM ?>assets/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?= APPADM ?>assets/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?= APPADM ?>assets/js/pages/dashboard.js"></script>
<!-- ============================ -->
<!-- DataTables  & Plugins -->
<script src="<?= APPADM ?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= APPADM ?>assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= APPADM ?>assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?= APPADM ?>assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="<?= APPADM ?>assets/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?= APPADM ?>assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="<?= APPADM ?>assets/plugins/jszip/jszip.min.js"></script>
<script src="<?= APPADM ?>assets/plugins/pdfmake/pdfmake.min.js"></script>
<script src="<?= APPADM ?>assets/plugins/pdfmake/vfs_fonts.js"></script>
<script src="<?= APPADM ?>assets/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="<?= APPADM ?>assets/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="<?= APPADM ?>assets/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
  });
</script>
</body>
</html>
