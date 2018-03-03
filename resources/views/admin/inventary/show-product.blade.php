
@extends('layouts.app')

@section('content')

    <section class="content-header">
      <h1>
        Administrador
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><i class="fa fa-dashboard"></i> Se encuentra en</li>
        <li class="active">Ver Producto</li>
      </ol>
    </section>

    <section class="content container-fluid">
      <div class="col-md-8">
        <div class="box box-primary">
          <div class="box-header ui-sortable-handle" style="cursor: move;">
            <i class="ion ion-clipboard"></i>
            <h3 class="box-title">Producto</h3>
          </div>
          <div class="box-body">
            <ul class="todo-list ui-sortable">
              <li>
                <span class="handle ui-sortable-handle">
                  <i class="fa fa-ellipsis-v"></i>
                  <i class="fa fa-ellipsis-v"></i>
                </span>
                <span class="text">{{$product->category}}</span>
                <div class="tools">
                  <small class="label label-info"><i class="fa fa-clock-o"></i> Categoria</small>
                </div>
              </li>
              <li>
                <span class="handle ui-sortable-handle">
                  <i class="fa fa-ellipsis-v"></i>
                  <i class="fa fa-ellipsis-v"></i>
                </span>
                <span class="text">{{$product->initials}}</span>
                <div class="tools">
                  <small class="label label-info"><i class="fa fa-clock-o"></i> Iniciales</small>
                </div>
              </li>
              <li>
                <span class="handle ui-sortable-handle">
                  <i class="fa fa-ellipsis-v"></i>
                  <i class="fa fa-ellipsis-v"></i>
                </span>
                <span class="text">{{$product->supplier}}</span>
                <div class="tools">
                  <small class="label label-info"><i class="fa fa-clock-o"></i> Proveedor</small>
                </div>
              </li>
              <li>
                <span class="handle ui-sortable-handle">
                  <i class="fa fa-ellipsis-v"></i>
                  <i class="fa fa-ellipsis-v"></i>
                </span>
                <span class="text">{{$product->checkin}}</span>
                <div class="tools">
                  <small class="label label-info"><i class="fa fa-clock-o"></i> Fecha de Entrada</small>
                </div>
              </li>
              <li>
                <span class="handle ui-sortable-handle">
                  <i class="fa fa-ellipsis-v"></i>
                  <i class="fa fa-ellipsis-v"></i>
                </span>
                <span class="text">{{$product->unit}}</span>
                <div class="tools">
                  <small class="label label-info"><i class="fa fa-clock-o"></i> Unidad de medida</small>
                </div>
              </li>
              <li>
                <span class="handle ui-sortable-handle">
                  <i class="fa fa-ellipsis-v"></i>
                  <i class="fa fa-ellipsis-v"></i>
                </span>
                <span class="text">{{$product->description}}</span>
                <div class="tools">
                  <small class="label label-info"><i class="fa fa-clock-o"></i> Descripción</small>
                </div>
              </li>
              <li>
                <span class="handle ui-sortable-handle">
                  <i class="fa fa-ellipsis-v"></i>
                  <i class="fa fa-ellipsis-v"></i>
                </span>
                <span class="text">{{$product->priceList}}</span>
                <div class="tools">
                  <small class="label label-info"><i class="fa fa-clock-o"></i> Precio Lista</small>
                </div>
              </li>
              <li>
                <span class="handle ui-sortable-handle">
                  <i class="fa fa-ellipsis-v"></i>
                  <i class="fa fa-ellipsis-v"></i>
                </span>
                <span class="text">{{$product->cost}}</span>
                <div class="tools">
                  <small class="label label-info"><i class="fa fa-clock-o"></i> Costo</small>
                </div>
              </li>
              <li>
                <span class="handle ui-sortable-handle">
                  <i class="fa fa-ellipsis-v"></i>
                  <i class="fa fa-ellipsis-v"></i>
                </span>
                <span class="text">
                  <span  <?php echo (int)$product->stock <= 20 ? "class='badge bg-red'" : "class='badge bg-green'"; ?>>
                    {{$product->stock}}
                  </span>
                </span>
                <div class="tools">
                  <small class="label label-info"><i class="fa fa-clock-o"></i> Stock</small>
                </div>
              </li>
            </ul>
          </div>
          <div class="box-footer clearfix no-border">
            <a href="{{url('admin/inventary')}}" class="btn btn-info pull-right"><i class="fa fa-mail-reply"></i> Atras</a>
          </div>
        </div>
      </div>
    </section>

@endsection
