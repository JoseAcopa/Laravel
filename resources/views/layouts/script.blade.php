
<!-- Bootstrap 3.3.7 -->
<script src="{{ asset('bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<!-- SlimScroll -->
<script src="{{ asset('bower_components/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>
<!-- FastClick -->
<script src="{{ asset('bower_components/fastclick/lib/fastclick.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('dist/js/adminlte.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('dist/js/demo.js')}}"></script>
<script src="{{ url('js/datatable/jQuery-2.1.3.min.js') }}"></script>
<script src="{{ url('js/datatable/jquery.dataTables.js') }}" type="text/javascript"></script>
<script src="{{ url('js/datatable/dataTables.bootstrap.js') }}" type="text/javascript"></script>
<script src="{{ asset('bower_components/select2/dist/js/select2.full.min.js')}}"></script>
<script type="text/javascript">
  $(function () {
    $('#Jtabla').dataTable({
      "bPaginate": true,
      "bLengthChange": true,
      "bFilter": true,
      "bSort": true,
      "bInfo": true,
      "bAutoWidth": true
    });
  });
</script>
