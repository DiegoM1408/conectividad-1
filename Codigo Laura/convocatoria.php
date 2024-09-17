<html>
<head>
  <title> SUBASTA </title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
</head>
<body>

<div class="row">
  <div class="col-md-4"></div>

  <div class="col-md-4">

    <center><h1>BASE DE DATOS SUBASTA SC</h1></center>
    <center><h1>Formulario Tabla Convocatoria</h1></center>

    <form method="POST" action="convocatoria.php" >

    <div class="form-group">
      <label for="id_convocatoria">Id_convocatoria </label>
      <input type="text" name="id_convocatoria" class="form-control" id="id_convocatoria">
    </div>

    <div class="form-group">
        <label for="fecha_inicio">Fecha_inicio </label>
        <input type="text" name="fecha_inicio" class="form-control" id="fecha_inicio" >
    </div>

    <div class="form-group">
        <label for="fecha_fin">Fecha_fin </label>
        <input type="text" name="fecha_fin" class="form-control" id="fecha_fin" >
    </div>

    <div class="form-group">
        <label for="nit_licitante">Nit_licitante </label>
        <input type="text" name="nit_licitante" class="form-control" id="nit_licitante">
    </div>

    <div class="form-group">
        <label for="id_requisitos">Id_requisitos </label>
        <input type="text" name="id_requisitos" class="form-control" id="id_requisitos">
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

      $id   ="";
      $ini   ="";
      $fin  ="";
      $nit  ="";
      $requi    ="";

      if(isset($_POST['btn_consultar']))
      {
        $id  = $_POST['id_convocatoria'];
        $exit=0;

         if ($id =="")
         {
           echo '<div class= "alert alert-success">Se requiere el número del id de convocatoria</div>';

         }
           else
           {
             $ver = $myPDO -> query ("SELECT * FROM convocatoria  WHERE id_convocatoria = '$id'");
               WHILE ($row =$ver ->fetch())
               {
                   echo $row['id_convocatoria'].'<br>';
                   echo $row['fecha_inicio'].'<br>';
                   echo $row['fecha_fin'].'<br>';
                   echo $row['nit_licitante'].'<br>';
                   echo $row['id_requisitos'].'<br>';
                   $exit++;
           }
           if ($exit==0)
           {
             echo '<div class= "alert alert-success">El id de la convocatoria no existe en la tabla</div>';
           }
        }
      }

      if(isset($_POST['btn_nuevo']))
      {
        $ced  = $_POST['id_convocatoria'];
        $nomb = $_POST ['fecha_inicio'];
        $apell = $_POST ['fecha_fin'];
        $nacio= $_POST ['nit_licitante'];
        $tel = $_POST ['id_requisitos'];

         if ($id == "")
         {
           echo '<div class= "alert alert-success">El campo id_convocatoria es obligatorio</div>';
         }
           else
           {
           $sql_insert = "INSERT INTO convocatoria (id_convocatoria,fecha_inicio,fecha_fin,
             nit_licitante,id_requisitos)
            VALUES ('$id', '$ini','$fin','$nit','$requi')";
           $myPDO -> query($sql_insert);

          echo '<div class= "alert alert-success">La convocatoria se registro en la tabla</div>';
           }

      }

      if(isset($_POST['btn_actualizar']))
      {
        $ced  = $_POST['id_convocatoria'];
        $nomb = $_POST ['fecha_inicio'];
        $apell = $_POST ['fecha_fin'];
        $nacio= $_POST ['nit_licitante'];
        $tel = $_POST ['id_requisitos'];

         if ($id == "")
         {
           echo '<div class= "alert alert-success">Los campos: id_convocatoria,
           fecha_inicio, fecha_fin son obligatorios</div>';
         }
           else
           {
             $exit=0;
             $ver = $myPDO -> query ("SELECT * FROM convocatoria  WHERE id_convocatoria = '$id'");
               WHILE ($row =$ver ->fetch())
               {
                   $exit++;
             }
             if ($exit==0)
             {
             echo '<div class= "alert alert-success">El id de la convocatoria no existe en la tabla</div>';
             }
              else
              {
                $sql_update = "UPDATE convocatoria SET
                               id_convocatoria='$id',
                               fecha_inicio ='$ini',
                               fecha_fin='$fin',
                               nit_licitante='$nit',
                               id_requisitos='$requi'
                             WHERE id_convocatoria='$id'";
                $myPDO -> query($sql_update);

                echo '<div class= "alert alert-success">Actualizacion relizada</div>';
              }
           }

      }

      if(isset($_POST['btn_eliminar']))
      {
        $ced  = $_POST['id_convocatoria'];
        $exit=0;
         if ($id =="")
         {
           echo '<div class= "alert alert-success">Se requiere el id de convocatoria</div>';
         }
           else
           {
             $ver = $myPDO -> query ("SELECT * FROM convocatoria  WHERE id_convocatoria = '$id'");
               WHILE ($row =$ver ->fetch())
               {
                   $exit++;
           }
           if ($exit==0)
           {
             echo '<div class= "alert alert-success">El id de la convocatoria no existe en la tabla</div>';
           }
           else
           {
             $sql = "DELETE FROM convocatoria WHERE id_convocatoria='$id'";
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