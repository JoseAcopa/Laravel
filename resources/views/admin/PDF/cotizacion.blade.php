<!DOCTYPE html>
<html>
  <head>
    <style>
      @page {
        margin: 0cm 0cm;
      }
      body {
        margin-top:    3.5cm;
        margin-bottom: 1cm;
        margin-left:   1cm;
        margin-right:  1cm;
      }

      #fondo {
        position: fixed;
        bottom: 0px;
        left: 30px;
        right: 30px;
        top: 250px;
        width: 750px;
        height: 580px;
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
        padding-top: 20px;
        padding-bottom: 10px;
      }

      .title-bussines {
        font-size: 12px;
        font-family: sans-serif !important;
        color: #456;
        margin: 0;
      }

      .table {
        position: absolute;
        width:180px;
        right:10px;
        top: 10px;
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
      </div>
    </main>
  </body>
</html>
