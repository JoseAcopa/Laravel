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

          @include('admin.quotation.formEdit')

        {!! Form::close() !!}
      </div>
    </section>

    <section class="content container-fluid">
      @if ($message = Session::get('success_product'))
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
          <h3 class="box-title"><i class="fa fa-book"></i> Editar productos cotizados</h3>
        </div>
        <div class="box-body">
          <div class="col-md-12">
            {!! Form::open(['method' => 'POST', 'route' => 'producto_cotizado.store']) !!}
              {{ csrf_field() }}
              <div class="box box-primary box-solid">
                <div class="box-header with-border">
                  <h3 class="box-title">Buscar Producto</h3>
                </div>
                <div class="box-body" style="">
                  <div class="form-group">
                    <a href="#"  class="pull-right"><i class="fa fa-plus"></i> Nuevo producto</a>
                    {{ Form::label('producto_id', 'Productos') }}
                    <div class="input-group">
                      {!! Form::select('producto_id', $productos, null, ['class' => 'form-control select2', 'id' => 'producto_id', 'placeholder' => 'Seleccione', 'style' => 'width: 100%;', 'onchange' => 'getProducto(this)']); !!}
                      <span class="input-group-addon"><i class="fa fa-search"></i></span>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-md-4">
              {{ Form::label('descripcion_producto', 'Descripción:') }}
              {!! Form::text('descripcion_producto', null,  ['class' => 'form-control', 'placeholder' => 'descripción', 'id' => 'descripcion', 'readonly', 'required']); !!}
            </div>
            <div class="col-md-3">
              {{ Form::label('producto_cotizar', 'Producto:') }}
              {!! Form::text('producto_cotizar', null,  ['class' => 'form-control', 'placeholder' => 'producto_cotizar', 'id' => 'producto_cotizar', 'readonly', 'required']); !!}
            </div>
            <div class="col-md-2">
              {{ Form::label('precio', 'Precio:') }}
              <select class="form-control" id="precios" name="precio">

              </select>
            </div>
            <div class="col-md-1">
              {{ Form::label('stock', 'Stock:') }}
              {!! Form::number('stock', null,  ['class' => 'form-control', 'placeholder' => 'stock', 'id' => 'stock', 'readonly', 'required']); !!}
            </div>
            <div class="col-md-1">
              {{ Form::label('cantidad', 'Cantidad:') }}
              {!! Form::number('cantidad', null,  ['class' => 'form-control', 'placeholder' => 'cantidad', 'id' => 'cantidad', 'min' => '1', 'required']); !!}
              {!! Form::number('cotizacion_id', $cotizacion->id,  ['class' => 'form-control']); !!}
            </div>
            <div class="col-md-1">
              {{ Form::label('Agregar', 'Agregar:') }}
              <button type="submit" class="btn btn-block bg-navy btn-flat"><i class="fa fa-plus"></i></button>
            </div>
          {!! Form::close() !!}
          <div class="col-md-12">
            <br>
            <table class="table table-bordered table-hover">
              <thead>
                <tr>
                  <th style="width: 10px;">#</th>
                  <th>Descripción</th>
                  <th style="width: 30px;">Cantidad</th>
                  <th style="width: 30px;">Precio</th>
                  <th style="width: 30px;">Subtotal</th>
                  <th style="width: 30px;">Accion</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($productos_cotizados as $key => $producto_cotizado)
                  <tr>
                    <td style="width: 10px;">{{$key+1}}</td>
                    <td>{{$producto_cotizado->producto->description}}</td>
                    <td style="width: 30px;">{{$producto_cotizado->cantidad}}</td>
                    <td style="width: 30px;">${{$producto_cotizado->precio}}</td>
                    <td style="width: 30px;">${{$producto_cotizado->subtotal}}</td>
                    <td>
                      <button type="button" class="btn btn-danger" onclick="destroy('{{route('producto_cotizado.destroy', $producto_cotizado->id)}}')"><i class="fa fa-trash"></i></button>
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
        <div class="box-footer">

        </div>
      </div>
    </section>

@endsection

<script type="text/javascript">
// obteniendo producto para cotizar
function getProducto(val) {
  var id = val.value
  $.ajax({
    url: '/producto/'+id,
    type: 'GET',
    success: (res)=>{
      $('#descripcion').val(res.description);
      $('#producto_cotizar').val(res.category.type);
      $('#stock').val(+res.stock);
      $('.precio1').remove();
      $('.precio2').remove();
      $('.precio3').remove();
      $('.precio4').remove();
      $('.precio5').remove();
      $('#precios').append('<option class="precio1">$'+res.priceSales1+'</option><option class="precio2">$'+res.priceSales2+'</option><option class="precio3">$'+res.priceSales3+'</option><option class="precio4">$'+res.priceSales4+'</option><option class="precio5">$'+res.priceSales5+'</option>')
    }
  })
}
</script>
