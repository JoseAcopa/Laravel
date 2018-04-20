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
    <!-- Main content -->
    <section class="invoice">
      <!-- title row -->
      <div class="row">
        <div class="col-xs-12">
          <h2 class="page-header">
            <img src="img/LogoRX.png" alt="RX" class="logo"> Rayos X y Servicios Industriales S.A. de C.V.
            <small class="pull-right">Fecha: {{ date('d-m-Y') }}</small>
          </h2>
        </div>
        <!-- /.col -->
      </div>
      <!-- info row -->
      <div class="row invoice-info">
        <div class="col-sm-4 invoice-col">
          Atención:
          <address>
            <strong>{{Auth::user()->name}}</strong><br>
            Telefono: {{Auth::user()->phone}}<br>
            Email: {{Auth::user()->email}}
          </address>
        </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
          Para:
          <address>
            <strong>Grupo R Perforación S.A. de C.V.</strong><br>
            Camino a Mata de Pita 7A Bis<br>
            Las Bajadas, Veracruz.<br>
            CP 91726.
          </address>
        </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
          <b>Factura RXS-{{$invoice->nInvoice}}</b><br>
          <br>
          <b>No. de Licitación:</b> 4F3S8J<br>
          <b>Fecha:</b>{{ date('d-m-Y') }}<br>
          <b>Cuenta:</b> 968-34567
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <!-- Table row -->
      <div class="row">
        <div class="col-xs-12 table-responsive">
          <table class="table table-striped">
            <thead>
            <tr>
              <th>Cant.</th>
              <th>Producto</th>
              <th>U. Medida</th>
              <th>Descripcion</th>
              <th>Subtotal</th>
            </tr>
            </thead>
            <tbody>
            <tr>
              <td>1</td>
              <td>Call of Duty</td>
              <td>455-981-221</td>
              <td>El snort testosterone trophy driving gloves handsome</td>
              <td>$64.50</td>
            </tr>
            <tr>
              <td>1</td>
              <td>Need for Speed IV</td>
              <td>247-925-726</td>
              <td>Wes Anderson umami biodiesel</td>
              <td>$50.00</td>
            </tr>
            <tr>
              <td>1</td>
              <td>Monsters DVD</td>
              <td>735-845-642</td>
              <td>Terry Richardson helvetica tousled street art master</td>
              <td>$10.70</td>
            </tr>
            <tr>
              <td>1</td>
              <td>Grown Ups Blue Ray</td>
              <td>422-568-642</td>
              <td>Tousled lomo letterpress</td>
              <td>$25.99</td>
            </tr>
            </tbody>
          </table>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
      <div class="row">
        <div class="col-xs-12 invoice-col">
          <address>
            <strong>FAVOR DE REVISAR TODAS LAS CONDICIONES DE VENTA...GRACIAS!!!</strong><br>
          </address>
        </div>
      </div>

      <div class="row">
        <!-- accepted payments column -->
        <div class="col-xs-6">
          <p class="lead">Metodos de Pago:</p>
          {{-- <img src="image/visa.png" alt="Visa">
          <img src="image/mastercard.png" alt="Mastercard">
          <img src="image/american-express.png" alt="American Express">
          <img src="image/paypal2.png" alt="Paypal"> --}}

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
        <!-- /.col -->
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
                <td>$10.34</td>
              </tr>
              <tr>
                <th>Envío:</th>
                <td>$5.80</td>
              </tr>
              <tr>
                <th>Total:</th>
                <td>$265.24</td>
              </tr>
            </table>
          </div>
        </div>
        <!-- /.col -->
      </div>
      <div class="row invoice-info">
        <hr>
        <div class="col-sm-4 invoice-col address">
          Calle Júpiter No. 115 Fracc. Galaxia<br>
          Tabasco 2000 C.P 86035<br>
          Villahermosa, Tabasco
        </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col address">
          rayosxyservicios@prodigy.net.mx<br>
          rxysisacv@prodigy.net.mx<br>
          rx@prodigy.net.mx
        </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col address">
          Tel. Oficina (993) 3 16 16 76<br>
          Nextel Ventas (993) 2 67 65 05<br>
          ID Nextel 92*976411*5
        </div>
        <!-- /.col -->
      </div>
    </section>
  </body>
</html>
