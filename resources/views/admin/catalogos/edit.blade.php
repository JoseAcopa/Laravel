@extends('layouts.app')

@section('content')

    <section class="content-header">
      <h1>
        Catálogo
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><i class="fa fa-dashboard"></i> Se encuentra en</li>
        <li class="active">Editar Productos en Catálogo</li>
      </ol>
    </section>

    <section class="content container-fluid">
      @if ($message = Session::get('success'))
        <div class="box box-success box-solid">
          <div class="box-header">
            <h3 class="box-title"><i class="icon fa fa-check"></i> {{ $message }}</h3>
            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
            </div>
          </div>
        </div>
      @endif

      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title"><i class="fa fa-edit"></i> Editar Producto en Catálogo</h3>
        </div>
        {!! Form::model($catalogo, ['method' => 'PUT','route' => ['catalogo.update', $catalogo->id], 'role' => 'form']) !!}
          {{ csrf_field() }}

          @include('admin.catalogos.form')

        {!! Form::close() !!}
      </div>
    </section>
    <script type="text/javascript">
      var categoriasLetra = <?php echo $categoriasLetra;?>;
      document.getElementById('letra').value = categoriasLetra.letra;

      function categoria(val){
        var categorias = <?php echo $todas_categorias;?>;
        var newVal = {};

        categorias.map((item)=>{
          newVal[item.id] = item
        })

        var categoria = newVal[val.value]
        document.getElementById('letra').value = categoria.letra;
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
