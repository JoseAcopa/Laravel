@extends('layouts.app')

@section('content')

  <section class="content-header">
    <h1>
      Catálogo
      <small></small>
    </h1>
    <ol class="breadcrumb">
      <li><i class="fa fa-dashboard"></i> Se encuentra en</li>
      <li class="active">Registrar Productos en Catálogo</li>
    </ol>
  </section>

  <section class="content container-fluid">
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title"><i class="fa fa-plus"></i> Registrar Producto en Catálogo</h3>
      </div>
      {!! Form::open(['method' => 'POST','route' => 'catalogo.store']) !!}
        {{ csrf_field() }}

        @include('admin.catalogos.form')

      {!! Form::close() !!}
    </div>
  </section>
  <script type="text/javascript">
    function categoria(val){
      var categorias = <?php echo $todas_categorias;?>;
      var newVal = {};

      categorias.map((item)=>{
        newVal[item.id] = item
      })

      var categoria = newVal[val.value]
      document.getElementById('letra').value = categoria.letra;
      var hoy = moment().format('X')
      $('#sku').val(categoria.letra+'-'+hoy)
    }
  </script>
  <script type="text/javascript">
    function getUnidad(val) {
      var value = val.value
      
      if (value === 'Otros') {
        $('#unidad_medida').val('')
        $('#unidad_medida').removeAttr('readonly');
      }else {
        $('#unidad_medida').val(value)
        $('#unidad_medida').attr('readonly', 'readonly');
      }
    }
  </script>

@endsection
