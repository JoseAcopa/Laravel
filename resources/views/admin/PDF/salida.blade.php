<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{$invoice->supplier->business}}</title>
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
          <h2 class="title-bussines">{{$invoice->supplier->business}}</h2>
          <p class="title-bussines">{{$invoice->supplier->address}}</p>
        </div>
        <div class="table">
          <ul class="ul-table">
            <li class="li-active">Fecha de entrada</li>
            <li>{{$invoice->checkin}}</li>
            <li class="li-active">No. de Factura</li>
            <li>{{$invoice->nInvoice}}</li>
            {{-- <li class="li-active">No. de Licitacón</li>
            <li>N/A</li> --}}
          </ul>
        </div>
        <div class="usuario">
          <h2>Tipo:</h2>
          <p>{{$invoice->category->type}}</p>
          <h2>Categoria:</h2>
          <p>{{$invoice->category->categorias}}</p>
        </div>
        <div class="container-table">
          <table>
            <thead class="default">
              <tr>
                <th>#</th>
                <th>DESCRIPCIÓN</th>
                <th>CANTIDAD</th>
                <th>U.MEDIDA</th>
                <th>P. LISTA</th>
                <th>COSTO</th>
              </tr>
            </thead>
            <tbody class="tbody">
              <tr>
                <td>1</td>
                <td class="tjustify">
                  {{strtoupper($invoice->description)}}
                </td>
                <td>{{$invoice->quantity}}</td>
                <td>{{$invoice->unit}}</td>
                <td>${{$invoice->priceList}} {{$invoice->coin->type}}</td>
                <td>${{$invoice->cost}} {{$invoice->coin->type}}</td>
              </tr>
            </tbody>
          </table>
        </div>
        {{-- <p class="sub-condiciones">
          TOTAL = $19166.25 (DIECINUEVE MIL CIENTO SESENTA SEIS USD 25/100)
        </p>

        <p class="sub-condiciones">
          FAVOR DE RAVISAR TODAS LAS CONDICIONES DE VENTA, GRACIAS!!!
        </p>

        <p class="title-bussines">
          RESUMEN DE CONDICIONES DE VENTA <br>
          CONDICIONES DE PAGO: 30 días a presentación de factura. <br>
          Precios Sin I.V.A.: Se agrega al Facturar <br>
          VIGENCIA DE PRECIOS: 15 días <br>
          LUGAR DE ENTREGA: LAB su almacén <br>
          TIEMPO DE ENTREGA: <br>
          Partida 1 y 2: 15 días hábiles una vez recibida su orden de compra. <br>
          Partida 3: 3 a 5 días hábiles una vez recibida su orden de compra, salvo previa venta. <br>
          MONEDA: USD Americanos pagaderosal tipo de cambio DOF vigente del dia de su pago ó directamente a nuestra cuenta en USD. <br><br>

          DATOS FISCALES <br>
          Rayos X y Servicios Industriales S.A. de C.V. <br>
          Calle Júpiter No. 115 <br>
          Fracc. Galaxia <br>
          Villahermosa, Tab. <br>
          CP 86035 <br>
          RFC: RXS050608SY3 <br><br>

          No. de Cuenta BANAMEX: 8004175 SUC: 820 <br>
          CLABE INTERBANCARIA: 002790082080041755 <br>
          Cuenta en USD: 7000 / 9669750
        </p>
      </div>
      <div class="firma">
        <p class="title-bussines">ATENTAMENTE</p>
        <p class="title-bussines">_____________________</p>
        <p class="title-bussines">M. en A. Francisco Mar Velazquez</p>
        <p class="title-bussines">Gerencia</p>
      </div> --}}
    </main>
  </body>
</html>
