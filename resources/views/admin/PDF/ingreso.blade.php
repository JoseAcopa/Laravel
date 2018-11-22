<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{$factura->proveedor->nombre_empresa}}</title>
    <link rel="icon" type="image/png" href="/img/icono1.png"/>
    <style>
      @page {
        margin: 0cm 0cm;
      }
      body {
        margin-top:    235px;
        margin-bottom: 130px;
        margin-left:   1cm;
        margin-right:  1cm;
      }

      #fondo {
        position: fixed;
        bottom: 0px;
        left: 30px;
        right: 30px;
        top: 270px;
        width: 750px;
        height: 500px;
        z-index: -100;
      }

      #header {
        position: fixed;
        bottom: 0px;
        left: 30px;
        top: 30px;
        width: 750px;
        height: 130px;
        z-index: -100;
      }

      #footer {
        position: fixed;
        bottom: 30px;
        left: 30px;
        width: 750px;
        height: 130px;
        z-index: -100;
        right: 30px;
      }

      .bussines {
        position: fixed;
        bottom: 0px;
        left: 40px;
        top: 140px;
        width: 470px;
        height: auto;
        padding-bottom: 10px;
        z-index: -100;
      }

      .title-bussines {
        font-size: 12px;
        font-family: sans-serif;
        color: #456;
        margin: 0;
      }

      .table {
        position: fixed;
        width: 180px;
        right: 45px;
        top: 140px;
        z-index: -100;
      }

      .ul-table {
        list-style: none;
        color: #456;
        font-family: sans-serif;
        text-align: center;
        font-size: 10px;
      }

      .li-active {
        background: #cdcdcd;
      }

      .usuario {
        position: fixed;
        top: 173px;
        z-index: -100;
        width: 100%;
        text-align: center;
      }

      .usuario p{
        color: #456;
        font-family: sans-serif;
        font-size: 12px;
        margin: 0;
      }

      .usuario h2{
        color: #456;
        font-family: sans-serif;
        font-size: 12px;
        margin: 0;
      }

      .container-table{
        border-top: #456 solid 2px;
        border-bottom: #456 solid 2px;
        width: 730px;
        margin-top: 10px;
      }

      .default{
        color: #fff;
        font-family: sans-serif;
        font-weight: bold;
        background: #456;
        width: 100%;
        font-size: 12px;
      }

      .defaulttr{
        width: 405px !important;
      }

      .tbody{
        color: #456;
        font-family: sans-serif;
        font-size: 10px;
        text-align: center;
      }

      .tjustify{
        color: #456;
        font-family: sans-serif;
        font-size: 10px;
        text-align: justify;
      }

      .sub-condiciones{
        font-size: 12px;
        font-family: sans-serif !important;
        color: #456;
      }

      .firma{
        text-align: center;
        width: 100%;
      }

    </style>
  </head>
  <body>
    <div id="header">
      <img class=""src="img/ENCABEZADO.jpg" height="100%" width="100%">
    </div>
    <div id="fondo">
      <img src="img/LogoRXGris.jpg" height="100%" width="100%" />
    </div>
    <div id="footer">
      <img src="img/PIE_DE_PAGINA.jpg" height="100%" width="100%" />
    </div>

    <main>
      <div class="row">
        <div class="bussines">
          <h2 class="title-bussines">{{$factura->proveedor->nombre_empresa}}</h2>
          <p class="title-bussines">{{$factura->proveedor->direccion}}</p>
        </div>
        <div class="table">
          <ul class="ul-table">
            <li class="li-active">Fecha de entrada</li>
            <li>{{$factura->fecha_entrada}}</li>
            <li class="li-active">No. de Factura</li>
            <li>{{$factura->numero_factura}}</li>
          </ul>
        </div>
        <div class="usuario">
          <h2>Tipo:</h2>
          <p>{{$factura->categoria->tipo}}</p>
          <h2>Categoria:</h2>
          <p>{{$factura->categoria->categorias}}</p>
        </div>
        <div class="container-table">
          <table>
            <thead class="default">
              <tr>
                <th>#</th>
                <th>PRODUCTO</th>
                <th style="width: 220px;">DESCRIPCIÓN</th>
                <th>CANTIDAD</th>
                <th>U.MEDIDA</th>
                <th>P. LISTA</th>
                <th>COSTO</th>
                <th>PROVEEDOR</th>
                <th>FECHA</th>
              </tr>
            </thead>
            <tbody class="tbody">
              <tr>
                <td>1</td>
                <td>{{$factura->categoria->tipo}}</td>
                <td class="tjustify">
                  @if ($factura->producto)
                    {{strtoupper($factura->producto->descripcion)}}
                  @endif
                </td>
                <td>{{$factura->cantidad_entrada}}</td>
                <td>
                  @if ($factura->producto)
                    {{$factura->producto->unidad_medida}}
                  @endif
                </td>
                <td>${{$factura->precio_lista}} {{$factura->moneda}}</td>
                <td>${{$factura->costo}} {{$factura->moneda}}</td>
                <td>{{$factura->proveedor->nombre_empresa}}</td>
                <td>{{$factura->fecha_entrada}}</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </main>
  </body>
</html>
