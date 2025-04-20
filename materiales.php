<?php require "check_auth.php" ?>
<!DOCTYPE html>
<html>

<head>
  <title>Buscador de modelos</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="CSS/pageStyles/styles.css">
  <link rel="stylesheet" type="text/css" href="CSS/pageStyles/materiales-estilos.css">
  <link rel="stylesheet" type="text/css" href="CSS/pageStyles/carrito-estilos.css">
  <link rel="stylesheet" type="text/css" href="CSS/pageStyles/materiales-estilos.css">
  <link rel="stylesheet" type="text/css" href="CSS/all.min.css">
</head>

<body>

  <?php require "header.php" ?>


  <div class="main">

    <div class="wrapper">

      <h3>Materiales de impresión</h3>
      <hr>

      <div class="row-mat">
        <div class="properties-row">
          <br>
          <br>
          <h2 class="title_materials" style="margin-top: 0;">Tabla comparativa de materiales 3D</h2>
          <div class="container">
            <div class="table100 ver1 m-b-110">
              <table data-vertable="ver1">
                <thead>
                  <tr class="row100 head">
                    <th class="column100 column3" data-column="column3"></th>
                    <th class="column100 column3" data-column="column3">RESISTENCIA</th>
                    <th class="column100 column3" data-column="column3">FLEXIBILIDAD</th>
                    <th class="column100 column3" data-column="column3">RESISTENCIA <br>A TEMPERATURA</th>
                    <th class="column100 column3" data-column="column3">NIVEL DE DETALLE</th>
                    <th class="column100 column3" data-column="column3">PRECIO</th>
                    <th class="column100 column3" data-column="column3">TECNOLOGÍA</th>
                  </tr>
                </thead>
                <tbody>
                  <tr class="row100">
                    <td class="column100 column8" data-column="column7">PLA</td>
                    <td class="column100 column3" data-column="column3"><i class="fas fa-circle"></i><i class="fas fa-circle"></i><i class="fas fa-circle"></i></td>
                    <td class="column100 column3" data-column="column3"><i class="fas fa-circle"></i></td>
                    <td class="column100 column3" data-column="column3"><i class="fas fa-circle"></i></td>
                    <td class="column100 column3" data-column="column3"><i class="fas fa-circle"></i><i class="fas fa-circle"></i><i class="fas fa-circle"></i></td>
                    <td class="column100 column3" data-column="column3"><i class="fas fa-circle"></i></td>
                    <td class="column100 column7" data-column="column7">FDM</td>
                  </tr>
                  <tr class="row100">
                    <td class="column100 column8" data-column="column8">ABS / ASA</td>
                    <td class="column100 column3" data-column="column3"><i class="fas fa-circle"></i><i class="fas fa-circle"></i><i class="fas fa-circle"></i><i class="fas fa-circle"></i></td>
                    <td class="column100 column3" data-column="column3"><i class="fas fa-circle"></i></td>
                    <td class="column100 column3" data-column="column3"><i class="fas fa-circle"></i><i class="fas fa-circle"></i><i class="fas fa-circle"></i><i class="fas fa-circle"></i></td>
                    <td class="column100 column3" data-column="column3"><i class="fas fa-circle"></i><i class="fas fa-circle"></i></td>
                    <td class="column100 column3" data-column="column3"><i class="fas fa-circle"></i><i class="fas fa-circle"></i><i class="fas fa-circle"></i></td>
                    <td class="column100 column7" data-column="column7">FDM</td>
                  </tr>
                  <tr class="row100">
                    <td class="column100 column8" data-column="column8">PETG</td>
                    <td class="column100 column3" data-column="column3"><i class="fas fa-circle"></i><i class="fas fa-circle"></i><i class="fas fa-circle"></i></td>
                    <td class="column100 column3" data-column="column3"><i class="fas fa-circle"></i><i class="fas fa-circle"></i></td>
                    <td class="column100 column3" data-column="column3"><i class="fas fa-circle"></i><i class="fas fa-circle"></i></td>
                    <td class="column100 column3" data-column="column3"><i class="fas fa-circle"></i><i class="fas fa-circle"></i></td>
                    <td class="column100 column3" data-column="column3"><i class="fas fa-circle"></i><i class="fas fa-circle"></i></td>
                    <td class="column100 column7" data-column="column7">FDM</td>
                  </tr>
                  <tr class="row100">
                    <td class="column100 column8" data-column="column8">FLEXIBLE</td>
                    <td class="column100 column3" data-column="column3"><i class="fas fa-circle"></i><i class="fas fa-circle"></i></td>
                    <td class="column100 column3" data-column="column3"><i class="fas fa-circle"></i><i class="fas fa-circle"></i><i class="fas fa-circle"></i><i class="fas fa-circle"></i><i class="fas fa-circle"></i></td>
                    <td class="column100 column3" data-column="column3"><i class="fas fa-circle"></i><i class="fas fa-circle"></i><i class="fas fa-circle"></i></td>
                    <td class="column100 column3" data-column="column3"><i class="fas fa-circle"></i></td>
                    <td class="column100 column3" data-column="column3"><i class="fas fa-circle"></i><i class="fas fa-circle"></i><i class="fas fa-circle"></i></td>
                    <td class="column100 column7" data-column="column7">FDM</td>
                  </tr>

                </tbody>
              </table>
              <div class="remark" style="font-weight: 400 !important;">* Los valores son de 1 a 5, siendo 1 más bajo y 5 más alto.</div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Buscador de modelos -->
  <div class="wrapper">
    <a href="">
      <div class="banner-buscador-general">
        <div class="texto-banner">
          Encuentra el objeto que necesitas en nuestro<br> <b> buscador de modelos</b>
        </div>

        <div class="separador">

        </div>

        <div class="button-banner">
          <div>
            BUSCAR AHORA
          </div>
        </div>
      </div>
    </a>
  </div>

  <?php require "footer.php"; ?>

  <script src="js/main.js"></script>
</body>

</html>