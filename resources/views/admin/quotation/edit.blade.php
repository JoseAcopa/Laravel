@extends('layouts.app')

@section('content')

    <section class="content-header">
      <h1>
        Cotización
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><i class="fa fa-dashboard"></i> Se encuentra en</li>
        <li class="active">Editar Cotización</li>
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
          <h3 class="box-title"><i class="fa fa-book"></i> Editar Cotización</h3>
        </div>
        {!! Form::model($cotizacion, ['method' => 'POST','route' => ['cotizacion.update', $cotizacion->id]]) !!}
          {{ csrf_field() }}

          @include('admin.quotation.form')

        {!! Form::close() !!}
      </div>
    </section>

    <section class="content container-fluid">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title"><i class="fa fa-book"></i> Agregar productos a cotización</h3>
        </div>
        {!! Form::open(['method' => 'POST', 'route' => 'cotizacion.store']) !!}
          {{ csrf_field() }}
          <div class="col-md-12">
            <div class="form-group">
              <label>Buscar Producto</label>
              <select class="form-control select2" style="width: 100%;" name="producto_id" onchange="getProduct(this);">
                <option selected="selected" value="null">Buscar...</option>
                @foreach ($productos as $producto)
                  <option value="{{ $producto->id }}">{{ $producto->category->type }} | {{ $producto->description }}</option>
                @endforeach
              </select>
            </div>
          </div>
          <div class="col-md-7">
            {{ Form::label('producto', 'Producto:') }}
            {{ Form::text('producto', null, ['class' => 'form-control', 'placeholder' => 'producto', 'id' => 'producto', 'readonly']) }}
            {{ Form::text('cotizacion_id', $cotizacion->id, ['hidden']) }}
          </div>
          <div class="col-md-2">
            {{ Form::label('precio', 'Precio:') }}
            {{ Form::text('precio', null, ['class' => 'form-control', 'placeholder' => 'precio', 'id' => 'precio']) }}
          </div>
          <div class="col-md-2">
            {{ Form::label('cantidad', 'Cantidad:') }}
            {{ Form::number('cantidad', null, ['class' => 'form-control', 'placeholder' => 'cantidad']) }}
          </div>
          <div class="col-md-1">
            {{ Form::label('', 'Agregar:') }}
            <a href="" class="btn btn-primary"><i class="fa fa-plus"></i> </a>
          </div>
        {!! Form::close() !!}
        <div class="box-body">
          <div class="col-md-12">
            <br>
            <br>
            <table id="Jtabla" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Producto</th>
                  <th>Cantidad</th>
                  <th>Precio</th>
                  <th>Subtotal</th>
                  <th>Eliminar</th>
               </tr>
              </thead>
              <tbody>
                @foreach ($productos_cotizados as $key => $producto)
                  <tr>
                    <td>{{$key + 1}}</td>
                    <td>{{$producto->producto_id}}</td>
                    <td>{{$producto->cantidad}}</td>
                    <td>{{$producto->precio}}</td>
                    <td>{{$producto->subtotal}}</td>
                    <td class="row-copasat">
                        <a type="submit" class="btn btn-danger"><i class="fa fa-trash-o"></i></a>
                    </td>
                  </tr>
                @endforeach
              </tbody>
              <tfoot>
                <tr>
                  <th>#</th>
                  <th>Producto</th>
                  <th>Cantidad</th>
                  <th>Precio</th>
                  <th>Subtotal</th>
                  <th>Acciones</th>
               </tr>
              </tfoot>
            </table>
          </div>
        </div>
      </div>
    </section>

@endsection

<script type="text/javascript">
function getProduct(val) {
  var id = val.value
  $.ajax({
    url: '/producto/'+id,
    type: 'GET',
    success: (res)=>{
      // $('#price1').text('$'+res.priceSales1);
      // $('#price2').text('$'+res.priceSales2);
      // $('#price3').text('$'+res.priceSales3);
      // $('#price4').text('$'+res.priceSales4);
      // $('#price5').text('$'+res.priceSales5);

      $('#producto').val(res.description);
    }
  })
}
</script>
