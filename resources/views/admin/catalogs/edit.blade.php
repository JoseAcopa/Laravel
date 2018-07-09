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
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title"><i class="fa fa-edit"></i> Editar Producto en Catálogo</h3>
        </div>
        {!! Form::model($catalog, ['method' => 'POST','route' => ['catalogo.update', $catalog->id], 'role' => 'form']) !!}
          {{ csrf_field() }}
          <div class="box-body">
            <div class="col-md-6">
              <div class="form-group {{ $errors->has('category') ? 'has-error' : '' }}">
                <label for="category">Tipo de Producto:</label>
                <select class="form-control" name="category" id='tipo_producto' onchange="typeProduct(this);">
                  <option value="{{$catalog->category_id}}">{{$catalog->category->type}}</option>
                  @foreach ($categories as $categorie)
                    <option value="{{$categorie->id}}">{{$categorie->type}}</option>
                  @endforeach
                </select>
              </div>
              <div class="form-group {{ $errors->has('letter') ? 'has-error' : '' }}">
                <label for="initials" >Iniciales</label>
                <input type="text" id="letter" name="letter" class="form-control" value="{{$catalog->letter}}" readonly>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group {{ $errors->has('proveedor') ? 'has-error' : '' }}">
                <label for="proveedor">Proveedor:</label>
                <select class="form-control" name="proveedor">
                  <option value="{{$catalog->supplier_id}}">{{$catalog->supplier->business}}</option>
                  @foreach ($suppliers as $supplier)
                    <option value="{{$supplier->id}}">{{$supplier->business}}</option>
                  @endforeach
                </select>
              </div>
              <div class="form-group {{ $errors->has('unidad') ? 'has-error' : '' }}">
                <div class="row">
                  <div class="col-xs-6">
                    <label for="unidad">Unidad de Medida:</label>
                    <select class="form-control" onchange="getUnidad(this);">
                      <option value="{{$catalog->unit}}">{{$catalog->unit}}</option>
                      @foreach ($units as $unit)
                        <option value="{{$unit->type}}">{{$unit->type}}</option>
                      @endforeach
                    </select>
                    {!! $errors->first('unidad','<span class="help-block">:message</span>')!!}
                  </div>
                  <div class="col-xs-6 top-copasat">
                    <input type="text" class="form-control" name="unidad" id="unidad" value="{{$catalog->unit}}" readonly>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
                <label for="description">Descripción:</label>
                <textarea type="text" rows="6" name="description" id="description" class="form-control" placeholder="Descripción">{{$catalog->description}}</textarea>
                {!! $errors->first('description','<span class="help-block">:message</span>')!!}
              </div>
            </div>
          </div>
          <div class="box-footer">
            <button type="submit" class="btn btn-primary"><i class="fa fa-save fa-lg"></i> Guardar</button>
            <a href="{{url('admin/catalogo')}}" class="btn btn-danger"><i class="fa fa-times-rectangle-o fa-lg"></i> Cancelar</a>
          </div>
        {!! Form::close() !!}
      </div>
    </section>
    <script type="text/javascript">
      function typeProduct(val){
        var categories = <?php echo$categories;?>;
        var newVal = {};

        categories.map((item)=>{
          newVal[item.id] = item
        })

        var category = newVal[val.value]
        document.getElementById('letter').value = category.letters;
      }
    </script>
    <script type="text/javascript">
      function getUnidad(val) {
        var value = val.value
        if (value === 'Otros') {
          $('#unidad').val('')
          $('#unidad').removeAttr('readonly');
        }else {
          $('#unidad').val(value)
          $('#unidad').attr('readonly', 'readonly');
        }
      }
    </script>

@endsection
