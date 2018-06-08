@extends('layouts.app')

@section('content')

    <section class="content-header">
      <h1>
        403 Error de página (No autorizado)
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li><a href="#">Error</a></li>
        <li class="active">403 error</li>
      </ol>
    </section>

    <section class="content container-fluid">
      <div class="error-page">
        <h2 class="headline text-yellow"> 403</h2>

        <div class="error-content">
          <h3><i class="fa fa-warning text-yellow"></i> Oops! Página no encontrada.</h3>

          <p>
            No tiene acceso a la página que estabas buscando.
            Mientras tanto, puede regresar al <a href="{{ url('admin/admin-welcome') }}">inicio.</a>
          </p>
        </div>
        <!-- /.error-content -->
      </div>
    </section>


@endsection
