<!DOCTYPE html>
<html>
  <head>
    <style>
      @page {
        margin: 0cm 0cm;
      }
      body {
        margin-top:    150px;
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
        width: 470px;
        height: auto;
        padding-bottom: 10px;
      }

      .title-bussines {
        font-size: 12px;
        font-family: sans-serif;
        color: #456;
        margin: 0;
      }

      .table {
        position: absolute;
        width:180px;
        right:10px;
        top: -5px;
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
          <h2 class="title-bussines">PEMEX EXPLORACION Y PRODUCCION</h2>
          <p class="title-bussines">Calle 25, No 48, ENTRE 6 y 38, COL. GPE, CP 24130, EDIF. CORP. CANTAREL, CD DEL CARMEN CAMPECHE</p>
        </div>
        <div class="table">
          <ul class="ul-table">
            <li class="li-active">Fecha</li>
            <li>{{ date('d/m/Y') }}</li>
            <li class="li-active">No. de Cotización</li>
            <li>RXS-001-2018-FMV-SEAP</li>
            <li class="li-active">No. de Licitacón</li>
            <li>N/A</li>
          </ul>
        </div>
        <div class="usuario">
          <h2>Atención:</h2>
          <p>Ing. {{Auth::user()->name}}</p>
          <p>{{Auth::user()->email}}</p>
        </div>
        <div class="container-table">
          <table>
            <thead class="default">
              <tr>
                <th>PARTIDA</th>
                <th>DESCRIPCIÓN</th>
                <th>CANTIDAD</th>
                <th>U.MEDIDA</th>
                <th>P.UNITARIO</th>
                <th>IMPORTE</th>
              </tr>
            </thead>
            <tbody class="tbody">
              <tr>
                <td>1</td>
                <td class="tjustify">
                  ENSAMBLE DE MNGUERA DE 4" x 196 FT, MARCA GATES, MODELO
                  BLACK GOLD OILFIELD SERVICE 400SD C/C 4" NPT MXM INCLUYE:
                  HAMMER UNION 4" FIGURA 200 ROSCABLE, CON CERTIFICADO DE PRUEBA.
                </td>
                <td>1</td>
                <td>Pieza</td>
                <td>$7060.19</td>
                <td>$7060.19</td>
              </tr>
              <tr>
                <td>2</td>
                <td class="tjustify">
                  ENSAMBLE DE MNGUERA DE 4" x 196 FT, MARCA GATES, MODELO
                  BLACK GOLD OILFIELD SERVICE 400SD C/C 4" NPT MXM INCLUYE:
                  HAMMER UNION 4" FIGURA 200 ROSCABLE, CON CERTIFICADO DE PRUEBA.
                </td>
                <td>1</td>
                <td>Pieza</td>
                <td>$7785.58</td>
                <td>$7785.58</td>
              </tr>
              <tr>
                <td>3</td>
                <td class="tjustify">
                  ENSAMBLE DE MNGUERA DE 4" x 196 FT, MARCA GATES, MODELO
                  BLACK GOLD OILFIELD SERVICE 400SD C/C 4" NPT MXM INCLUYE:
                  HAMMER UNION 4" FIGURA 200 ROSCABLE, CON CERTIFICADO DE PRUEBA.
                </td>
                <td>1</td>
                <td>Pieza</td>
                <td>$4320.48</td>
                <td>$4320.48</td>
              </tr>
            </tbody>
          </table>
        </div>
        <p class="sub-condiciones">
          SUBTOTAL = $19166.25 (DIECINUEVE MIL CIENTO SESENTA SEIS USD 25/100) + IVA
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
      </div>
    </main>
  </body>
</html>
