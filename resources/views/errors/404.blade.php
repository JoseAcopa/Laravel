<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SIYC RayosX</title>

    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="{{ asset('bower_components/bootstrap/dist/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ asset('bower_components/font-awesome/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{ asset('dist/css/skins/skin-blue.min.css')}}">
    <link rel="stylesheet" href="{{ asset('dist/css/AdminLTE.min.css')}}">
    <link rel="stylesheet" href="{{ asset('dist/css/skins/_all-skins.min.css')}}">
  </head>
  <body>
    <section class="content-header">
      <h1>
        404 Error de página
      </h1>
    </section>

    <section class="content container-fluid">
      <div class="error-page">
        <h2 class="headline text-red"> 404</h2>

        <div class="error-content">
          <h3><i class="fa fa-warning text-red"></i> Oops! Página no encontrada.</h3>

          <p>
            La página que estabas buscando no existe.
            Mientras tanto, puede regresar al <a href="{{ url('admin/admin-welcome') }}">inicio.</a>
          </p>
        </div>
        <!-- /.error-content -->
      </div>
    </section>
    <!-- Bootstrap 3.3.7 -->
    <script src="{{ asset('bower_components/jquery/dist/jquery.min.js')}}"></script>
    <script src="{{ asset('bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
    <script src="{{ asset('bower_components/fastclick/lib/fastclick.js')}}"></script>
    <script src="{{ asset('dist/js/adminlte.min.js')}}"></script>
    <script src="{{ asset('/dist/js/demo.js')}}"></script>
  </body>
</html>
