<html>
<head>
  <title> SUBASTA</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
</head>
<body>

<div class="row">
  <div class="col-md-4"></div>

  <div class="col-md-4">

    <center><h1>BASE DE DATOS SUBASTA SC</h1></center>
    <center><h1>Formulario Tabla licitante</h1></center>

    <form method="POST" action="licitante.php" >

    <div class="form-group">
      <label for="nit_licitante">Nit_licitante </label>
      <input type="text" name="nit_licitante" class="form-control" id="nit_licitante">
    </div>

    <div class="form-group">
        <label for="nombre_licitante">Nombre_licitante </label>
        <input type="text" name="nombre_licitante" class="form-control" id="nombre_licitante" >
    </div>

    <div class="form-group">
        <label for="direccion">Direccion </label>
        <input type="text" name="direccion" class="form-control" id="direccion" >
    </div>

    <div class="form-group">
        <label for="id_convocatoria">Id convocatoria </label>
        <input type="text" name="id_convocatoria" class="form-control" id="id_convocatoria">
    </div>

    <div class="form-group">
        <label for="telefono">Telefono </label>
        <input type="text" name="telefono" class="form-control" id="telefono">
    </div>

    <center>

      <input type="submit" value="Consultar" class="btn btn-primary" name="btn_consultar">
      <input type="submit" value="Nuevo" class="btn btn-success" name="btn_nuevo">
      <input type="submit" value="Actualizar" class="btn btn-info" name="btn_actualizar">
      <input type="submit" value="Eliminar" class="btn btn-danger" name="btn_eliminar">
    </center>

  </form>

  <?php
    include("conexion.php");

      $nit    ="";
      $nomb   ="";
      $direc  ="";
      $id_convo  ="";
      $tel    ="";

      if(isset($_POST['btn_consultar']))
      {
        $nit  = $_POST['nit_licitante'];
        $exit=0;

         if ($nit =="")
         {
           echo '<div class= "alert alert-success">Se requiere el número de nit_licitante</div>';

         }
           else
           {
             $ver = $myPDO -> query ("SELECT * FROM licitante  WHERE nit_licitante = '$nit'");
               WHILE ($row =$ver ->fetch())
               {
                   echo $row['nit_licitante'].'<br>';
                   echo $row['nombre_licitante'].'<br>';
                   echo $row['direccion'].'<br>';
                   echo $row['id_convocatoria'].'<br>';
                   echo $row['telefono'].'<br>';
                   $exit++;
           }
           if ($exit==0)
           {
             echo '<div class= "alert alert-success">La nit_licitante del licitante no existe en la tabla</div>';
           }
        }
      }

      if(isset($_POST['btn_nuevo']))
      {
        $nit  = $_POST['nit_licitante'];
        $nomb = $_POST ['nombre_licitante'];
        $direc = $_POST ['direccion'];
        $id_convo= $_POST ['id_convocatoria'];
        $tel = $_POST ['telefono'];

         if ($nit =="" || $nomb ==""  || $direc =="")
         {
           echo '<div class= "alert alert-success">El campo: nit_licitante es obligatorio</div>';
         }
           else
           {
           $sql_insert = "INSERT INTO licitante (nit_licitante,nombre_licitante,direccion,
             id_convocatoria,telefono)
            VALUES ('$nit', '$nomb','$direc','$id_convo','$tel')";
           $myPDO -> query($sql_insert);

          echo '<div class= "alert alert-success">El licitante se registro en la tabla</div>';
           }

      }

      if(isset($_POST['btn_actualizar']))
      {
        $nit  = $_POST['nit_licitante'];
        $nomb = $_POST ['nombre_licitante'];
        $direc = $_POST ['direccion'];
        $id_convo= $_POST ['id_convocatoria'];
        $tel = $_POST ['telefono'];

         if ($nit =="" || $nomb ==""  || $direc =="")
         {
           echo '<div class= "alert alert-success">Los campos: nit_licitante,
           nombre_licitante, direccion son obligatorios</div>';
         }
           else
           {
             $exit=0;
             $ver = $myPDO -> query ("SELECT * FROM licitante  WHERE nit_licitante = '$nit'");
               WHILE ($row =$ver ->fetch())
               {
                   $exit++;
             }
             if ($exit==0)
             {
             echo '<div class= "alert alert-success">La nit_licitante del licitante no existe en la tabla</div>';
             }
              else
              {
                $sql_update = "UPDATE licitante SET
                               nit_licitante='$nit',
                               nombre_licitante ='$nomb',
                               direccion='$direc',
                               id_convocatoria='$id_convo',
                               telefono='$tel'
                             WHERE nit_licitante='$nit'";
                $myPDO -> query($sql_update);

                echo '<div class= "alert alert-success">Actualizacion relizada</div>';
              }
           }

      }

      if(isset($_POST['btn_eliminar']))
      {
        $nit  = $_POST['nit_licitante'];
        $exit=0;
         if ($nit =="")
         {
           echo '<div class= "alert alert-success">Se requiere el número de nit_licitante</div>';
         }
           else
           {
             $ver = $myPDO -> query ("SELECT * FROM licitante  WHERE nit_licitante = '$nit'");
               WHILE ($row =$ver ->fetch())
               {
                   $exit++;
           }
           if ($exit==0)
           {
             echo '<div class= "alert alert-success">La nit_licitante del licitante no existe en la tabla</div>';
           }
           else
           {
             $sql = "DELETE FROM licitante WHERE nit_licitante='$nit'";
             $myPDO ->query($sql);
             echo '<div class= "alert alert-success">El registro de elimino</div>';
           }
      }
    }

  ?>

  </div>

  <div class="col-md-4"></div>
</div>

</body>
</html>