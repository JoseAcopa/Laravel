@extends('layouts.app')

@section('content')

    <section class="content-header">
      <h1>
        Roles y Permisos
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><i class="fa fa-dashboard"></i> Se encuentra en</li>
        <li class="active">Registrar Roles</li>
      </ol>
    </section>

    <section class="content container-fluid">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title"><i class="fa fa-pencil"></i> Registrar Roles</h3>
        </div>
        {!! Form::open(['method' => 'POST','route' => 'roles.store']) !!}
          {{ csrf_field() }}

          @include('admin.roles.form')

        {!! Form::close() !!}
      </div>
    </section>

@endsection
  <script type="text/javascript">
    function activateRadio(val) {
      var value = val.value

      if (value == 'no-access') {
        $('input:checkbox').removeAttr('checked');
        $("input:checkbox").attr("disabled", true);
      }else {
        $("input:checkbox").attr("checked", true);
        $('input:checkbox').removeAttr('disabled');
      }
    }

    function activateCheckbox() {
      var inputRadio = document.getElementsByName('special');

      for (var i = 0; i < inputRadio.length; i++) {
          var radio = inputRadio[i];
          radio.checked = false;
      }
    }
  </script>
