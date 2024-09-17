<html>
<head>
  <title> SUBASTA </title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
</head>
<body>
<ul>
  <li><a href="index.html">Antena</a></li>
</ul>


<div class="row">
        <div class="col-md-4"></div>

        <div class="col-md-4">
            <center><h1>BASE DE DATOS SUBASTAS</h1></center>
            <center><h1>Formulario Tabla antenas</h1></center>

            <form method="POST" action="">
                <div class="form-group">
                    <label for="id_antena">Antena</label>
                    <input type="text" name="id_antena" class="form-control" id="id_antena">
                </div>

                <div class="form-group">
                    <label for="instalacion">Instalacion</label>
                    <input type="text" name="instalacion" class="form-control" id="instalacion">
                </div>

                <div class="form-group">
                    <label for="fecha">Fecha</label>
                    <input type="text" name="fecha" class="form-control" id="fecha">
                </div>

                <div class="form-group">
                    <label for="altura_torre">Altura_torre</label>
                    <input type="text" name="altura_torre" class="form-control" id="altura_torre">
                </div>

                <div class="form-group">
                    <label for="id_tec">Id_tec</label>
                    <input type="text" name="id_tec" class="form-control" id="id_tec">
                </div>

                <div class="form-group">
                    <label for="id_ofer">Id oferta</label>
                    <input type="text" name="id_ofer" class="form-control" id="id_ofer">
                </div>

                <center>
                    <input type="submit" value="Enviar" class="btn btn-success" name="btn_enviar">
                    <input type="submit" value="Consultar" class="btn btn-primary" name="btn_consultar">
                </center>
            </form>

          <?php
          session_start();
          error_reporting(E_ALL);
          ini_set('display_errors', 1);

          // Datos de conexión
          $servername = "localhost";  // Seleccionar servidor
          $username = "root";
          $password = "";
          $database = "antena"; // Seleccionar base de datos

          // Conectar a la base de datos
          $conexion = mysqli_connect($servername, $username, $password, $database);

          if (!$conexion) {
              die("Error al conectar a la base de datos: " . mysqli_connect_error());
          }

          // Insertar los datos
          if (isset($_POST['btn_enviar'])) {
              $id_antena = $_POST['id_antena'];
              $instalacion = $_POST['instalacion'];
              $fecha = $_POST['fecha'];
              $altura_torre = $_POST['altura_torre'];
              $id_tec = $_POST['id_tec'];
              $id_ofer = $_POST['id_ofer'];

              // Validar que los campos se hayan llenado y no estén vacíos
              if (empty($id_antena) || empty($instalacion) || empty($fecha) || empty($altura_torre) || empty($id_tec) || empty($id_ofer)) {
                  echo '<div class="alert alert-danger">Todos los campos son obligatorios</div>';
              } else {
                  // Consulta SQL para insertar en la tabla 'antenas'
                  $sql = "INSERT INTO antenas (id_antena, instalacion, fecha, altura_torre, id_tec, id_ofer)
                          VALUES ('$id_antena', '$instalacion', '$fecha', '$altura_torre', '$id_tec', '$id_ofer')";

                  $query = mysqli_query($conexion, $sql);

                  if ($query) {
                      echo '<div class="alert alert-success">Antena registrada con éxito</div>';
                  } else {
                      echo "Error al insertar los datos: " . mysqli_error($conexion);
                  }
              }
          }

          // Lógica para consultar los datos
          if (isset($_POST['btn_consultar'])) {
              $id_antena = $_POST['id_antena'];

              if (empty($id_antena)) {
                  echo '<div class="alert alert-danger">El campo id_antena es obligatorio para consultar</div>';
              } else {
                  // Consulta SQL para buscar la antena en la tabla 'antenas'
                  $sql = "SELECT * FROM antenas WHERE id_antena = '$id_antena'";
                  $result = mysqli_query($conexion, $sql);

                  if (mysqli_num_rows($result) > 0) {
                      while ($row = mysqli_fetch_assoc($result)) {
                          echo "<div class='alert alert-info'>";
                          echo "ID Antena: " . $row['id_antena'] . "<br>";
                          echo "Instalación: " . $row['instalacion'] . "<br>";
                          echo "Fecha: " . $row['fecha'] . "<br>";
                          echo "Altura Torre: " . $row['altura_torre'] . "<br>";
                          echo "ID Técnico: " . $row['id_tec'] . "<br>";
                          echo "ID Oferta: " . $row['id_ofer'] . "<br>";
                          echo "</div>";
                      }
                  } else {
                      echo '<div class="alert alert-danger">No se encontraron registros con el ID Antena proporcionado</div>';
                  }
              }
          }

          // Cerrar la conexión
          mysqli_close($conexion);
          ?>

        <div class="col-md-4"></div>
    </div>
</body>
</html>