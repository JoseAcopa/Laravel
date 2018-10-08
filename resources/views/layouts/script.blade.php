
<!-- Bootstrap 3.3.7 -->
<script src="{{ asset('bower_components/jquery/dist/jquery.min.js')}}"></script>
<script src="{{ asset('bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<script src="{{ asset('bower_components/select2/dist/js/select2.full.min.js')}}"></script>
<script src="{{ asset('bower_components/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>
<script src="{{ asset('bower_components/moment/min/moment.min.js')}}"></script>
<script src="{{ asset('bower_components/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
<script src="{{ asset('bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')}}"></script>
<script src="{{ asset('bower_components/bootstrap-datepicker/dist/locales/bootstrap-datepicker.es.min.js')}}"></script>
<script src="{{ asset('bower_components/fastclick/lib/fastclick.js')}}"></script>
<script src="{{ asset('dist/js/adminlte.min.js')}}"></script>
<script src="{{ url('bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script type="text/javascript" src="{{ url('js/sweetalert2/sweetalert2.js') }}"></script>
<script type="text/javascript" src="{{ url('js/sweetalert2/sweetalert2.all.min.js') }}"></script>
<script src="{{ url('bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
<script src="{{ asset('/dist/js/demo.js')}}"></script>
<script type="text/javascript">
  $(function () {
    $('#Jtabla').dataTable({
      "bLengthChange": true,
      "bFilter": true,
      "bSort": true,
      "bInfo": true,
      "bAutoWidth": true,
      "lengthMenu": [[10, 25, 50, 100, -1], [10, 25, 50, 100, "Todo"]],
      "language": {
        "sProcessing": "Procesando...",
        "sLengthMenu": "Mostrar _MENU_ registros",
        "sZeroRecords": "No se encontraron resultados",
        "sEmptyTable": "Ningún registro disponible.",
        "sInfo": "Mostrando de _START_ al _END_ de un total de _TOTAL_ registros",
        "sInfoEmpty": "Mostrando del 0 al 0 de un total de 0 registros",
        "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
        "sInfoPostFix": "",
        "sSearch": "Buscar:",
        "sUrl": "",
        "sInfoThousands": ",",
        "sLoadingRecords": "Cargando...",
        "oPaginate": {
          "sFirst": "Primero",
          "sLast": "Último",
          "sNext": "Siguiente",
          "sPrevious": "Anterior"
        },
        "oAria": {
          "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
          "sSortDescending": ": Activar para ordenar la columna de manera descendente"
        }
      },
    });

    $('#correos').dataTable({
      "bLengthChange": true,
      "bFilter": true,
      "bSort": true,
      "bInfo": true,
      "bAutoWidth": true,
      "lengthMenu": [[10, 25, 50, 100, -1], [10, 25, 50, 100, "Todo"]],
      "language": {
        "sProcessing": "Procesando...",
        "sLengthMenu": "Mostrar _MENU_ registros",
        "sZeroRecords": "No se encontraron resultados",
        "sEmptyTable": "Ningún registro disponible.",
        "sInfo": "Mostrando de _START_ al _END_ de un total de _TOTAL_ registros",
        "sInfoEmpty": "Mostrando del 0 al 0 de un total de 0 registros",
        "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
        "sInfoPostFix": "",
        "sSearch": "Buscar:",
        "sUrl": "",
        "sInfoThousands": ",",
        "sLoadingRecords": "Cargando...",
        "oPaginate": {
          "sFirst": "Primero",
          "sLast": "Último",
          "sNext": "Siguiente",
          "sPrevious": "Anterior"
        },
        "oAria": {
          "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
          "sSortDescending": ": Activar para ordenar la columna de manera descendente"
        }
      },
    });
  });
</script>
<script type="text/javascript">
  $(document).ready(function() {
    //Date range picker
    $('#reservation').daterangepicker({
      "locale": {
        "format": "DD/MM/YYYY",
        "separator": " - ",
        "applyLabel": "Aplicar",
        "cancelLabel": "Cancelar",
        "fromLabel": "desde",
        "toLabel": "hasta",
        "customRangeLabel": "Personalizar",
        "daysOfWeek": [
          "Dom",
          "Lun",
          "Mar",
          "Mie",
          "Jue",
          "Vie",
          "Sáb"
        ],
        "monthNames": [
          "Enero",
          "Febrero",
          "Marzo",
          "Abril",
          "Mayo",
          "Junio",
          "Julio",
          "Agosto",
          "Septiembre",
          "Octubre",
          "Noviembre",
          "Diciembre"
        ],
        "firstDay": 1
      }
    })

    $('.select2').select2()
    $('#datepicker').datepicker({
      todayHighlight: true,
      endDate: new Date(),
      autoclose: true,
      language: 'es',
      format: 'dd/mm/yyyy'
    });

    $('#datepickerProduct').datepicker({
      todayHighlight: true,
      endDate: new Date(),
      autoclose: true,
      language: 'es',
      format: 'dd/mm/yyyy'
    });

    $('#datepickerSalida').datepicker({
      startDate: '-5d',
      todayHighlight: true,
      endDate: new Date(),
      autoclose: true,
      language: 'es',
      format: 'dd/mm/yyyy'
    });

  });
</script>
<script type="text/javascript">
  function changePass(value) {
    if (value === "change") {
      document.getElementById('btn-password').style.display = "block"
      document.getElementById('btn-cancel').style.display = "block"
      document.getElementById('btn-change').style.display = "none"
    }else {
      document.getElementById('btn-password').style.display = "none"
      document.getElementById('btn-cancel').style.display = "none"
      document.getElementById('btn-change').style.display = "block"
    }
  }

  function destroy(url){
    event.preventDefault();
    swal({
      title: '¿Desea eliminar este dato?',
      text: "¡No podra revertir esto!",
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3c8dbc',
      cancelButtonColor: '#dd4b39',
      confirmButtonText: 'Sí, eliminar!',
      cancelButtonText: 'No, cancelar!'
    }).then((res) => {
      if (res.value) {
        $.ajax({
          url: url,
          method: "POST",
          data: {
              _token: "{{csrf_token()}}",
              _method: "DELETE"
          },
          success: function(data){
            swal(
              '¡Eliminado!',
              'El registro ha sido eliminado.',
              'success'
            ).then(()=>{
              location.reload();
            })
          }
        })
      }else if (res.dismiss === "cancel") {
        swal(
          '¡Cancelado!',
          'La accion fue cancelada.',
          'error'
        )
      }
    })
  }
</script>
