<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Factura</title>
    <link rel="stylesheet" href="css/pdf.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/font-awesome.css">
    <link rel="stylesheet" href="css/ionicons.css">
    <link rel="stylesheet" href="css/AdminLTE.css">
  </head>
  <body>
    <section class="invoice">
      <div class="row">
        <div class="col-xs-12">
          <h2 class="page-header">
            <img src="img/LogoRX.png" alt="RX" class="logo"> Rayos X y Servicios Industriales S.A. de C.V.
            <small class="pull-right">Fecha: {{ date('d-m-Y') }}</small>
          </h2>
        </div>
      </div>

      <div class="row invoice-info">
        <div class="col-sm-4 invoice-col">
          Atención:
          <address>
            <strong>{{$selectQuotation->nombre}}</strong><br>
            Telefono: {{$selectQuotation->cliente->phone}}<br>
            Email: {{$selectQuotation->cliente->email}}
          </address>
        </div>

        <div class="col-sm-4 invoice-col">
          Empresa:
          <address>
            <strong>{{$selectQuotation->cliente->business}}.</strong><br>
            {{$selectQuotation->cliente->address}}<br>
            Las Bajadas, Veracruz.<br>
            CP 91726.
          </address>
        </div>

        <div class="col-sm-4 invoice-col">
          <b>No. de Cotización RXS-{{$selectQuotation->cotizacion}}</b><br>
          <br>
          <b>No. de Licitación:</b> {{$selectQuotation->licitacion}}<br>
          <b>Fecha:</b>{{$selectQuotation->fecha}}<br>
          <b>Cuenta:</b> 968-34567
        </div>
      </div>

      <div class="row">
        <div class="col-xs-12 table-responsive">
          <table class="table table-striped">
            <thead>
            <tr>
              <th>PRODUCTO</th>
              <th>DESCRIPCIÓN</th>
              <th>CANT.</th>
              <th>U.MEDIDA </th>
              <th>P.UNITARIO</th>
              <th>IMPORTE12.5</th>
            </tr>
            </thead>
            <tbody>
              @foreach ($quoteers as $quoteer)
                <tr>
                  <td>{{$quoteer->producto}}</td>
                  <td>{{$quoteer->descripcion}}</td>
                  <td>{{$quoteer->cantidad}}</td>
                  <td>Metros</td>
                  <td>{{$quoteer->precio}}</td>
                  <td>18000</td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>

      <div class="row">
        <div class="col-xs-12 invoice-col">
          <address>
            <strong>FAVOR DE REVISAR TODAS LAS CONDICIONES DE VENTA...GRACIAS!!!</strong><br>
          </address>
        </div>
      </div>

      <div class="row">
        <div class="col-xs-6">
          <p class="lead">Metodos de Pago:</p>
          <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
            DATOS FISCALES<br>
            Rayos X y Servicios Industriales S.A. de C.V.<br>
            Calle Júpiter No. 115<br>
            Fracc. Galaxia<br>
            Villahermosa, Tab.<br>
            CP 86035<br>
            RFC: RXS050608SY3<br><br>
            No. de Cuenta BANAMEX: 8004175 SUC: 820<br>
            CLABE INTERBANCARIA: 002790082080041755<br>
            CUENTA EN USD: 70009669750
          </p>
        </div>

        <div class="col-xs-6">
          <p class="lead">Monto adeudado:</p>
          <div class="table-responsive">
            <table class="table">
              <tr>
                <th style="width:50%">Subtotal:</th>
                <td>$250.30</td>
              </tr>
              <tr>
                <th>IVA</th>
                <td>${{$selectQuotation->IVA}}</td>
              </tr>
              <tr>
                <th>Subtotal:</th>
                <td>${{$selectQuotation->subtotal}}</td>
              </tr>
              <tr>
                <th>Total:</th>
                <td>${{$selectQuotation->total}}</td>
              </tr>
            </table>
          </div>
        </div>
      </div>
      <div class="row invoice-info">
        <hr>
        <div class="col-sm-4 invoice-col address">
          Calle Júpiter No. 115 Fracc. Galaxia<br>
          Tabasco 2000 C.P 86035<br>
          Villahermosa, Tabasco
        </div>

        <div class="col-sm-4 invoice-col address">
          rayosxyservicios@prodigy.net.mx<br>
          rxysisacv@prodigy.net.mx<br>
          rx@prodigy.net.mx
        </div>

        <div class="col-sm-4 invoice-col address">
          Tel. Oficina (993) 3 16 16 76<br>
          Nextel Ventas (993) 2 67 65 05<br>
          ID Nextel 92*976411*5
        </div>

      </div>
    </section>
  </body>
</html>
