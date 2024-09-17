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
    <center><h1>Formulario Tabla Tecnologia</h1></center>

    <form method="POST" action="tecnologia.php" >

    <div class="form-group">
      <label for="id_tec">Id_Tec </label>
      <input type="text" name="id_tec" class="form-control" id="id_tec">
    </div>

    <div class="form-group">
        <label for="escalabilidad">Escalabilidad </label>
        <input type="text" name="escalabilidad" class="form-control" id="escalabilidad" >
    </div>

    <div class="form-group">
        <label for="cobertura">Cobertura </label>
        <input type="text" name="cobertura" class="form-control" id="cobertura" >
    </div>

    <div class="form-group">
        <label for="velocidad">Velocidad </label>
        <input type="text" name="velocidad" class="form-control" id="velocidad">
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
      $esca   ="";
      $cob  ="";
      $vel  ="";

      if(isset($_POST['btn_consultar']))
      {
        $id  = $_POST['id_tec'];
        $exit=0;

         if ($id =="")
         {
           echo '<div class= "alert alert-success">Se requiere id de tecnologia</div>';

         }
           else
           {
             $ver = $myPDO -> query ("SELECT * FROM tecnologia  WHERE id_tec = '$id'");
               WHILE ($row =$ver ->fetch())
               {
                   echo $row['id_tec'].'<br>';
                   echo $row['escalabilidad'].'<br>';
                   echo $row['cobertura'].'<br>';
                   echo $row['velocidad'].'<br>';
                   $exit++;
           }
           if ($exit==0)
           {
             echo '<div class= "alert alert-success">El id de tecnologia no existe en la tabla</div>';
           }
        }
      }

      if(isset($_POST['btn_nuevo']))
      {
        $ced  = $_POST['id_tec'];
        $nomb = $_POST ['escalabilidad'];
        $apell = $_POST ['cobertura'];
        $nacio= $_POST ['velocidad'];

         if ($id =="")
         {
           echo '<div class= "alert alert-success">El campo de id_tec es obligatorios</div>';
         }
           else
           {
           $sql_insert = "INSERT INTO tecnologia (id_tec,escalabiidad,cobertura,
             velocidad)
            VALUES ('$id', '$esca','$cob','$vel')";
           $myPDO -> query($sql_insert);

          echo '<div class= "alert alert-success">La tecnologia se registro en la tabla</div>';
           }

      }

      if(isset($_POST['btn_actualizar']))
      {
        $ced  = $_POST['id_tec'];
        $nomb = $_POST ['escalabilidad'];
        $apell = $_POST ['cobertura'];
        $nacio= $_POST ['velocidad'];

         if ($id =="")
         {
           echo '<div class= "alert alert-success">el campo id_tec es obligatorio</div>';
         }
           else
           {
             $exit=0;
             $ver = $myPDO -> query ("SELECT * FROM tecnologia  WHERE id_tec = '$id'");
               WHILE ($row =$ver ->fetch())
               {
                   $exit++;
             }
             if ($exit==0)
             {
             echo '<div class= "alert alert-success">El id de la tecnologia no existe en la tabla</div>';
             }
              else
              {
                $sql_update = "UPDATE tecnologia  SET
                               id_tec='$id',
                               escalabilidad ='$esca',
                               cobertura='$cob',
                               velocidad='$vel',
                             WHERE id_tec='$id'";
                $myPDO -> query($sql_update);

                echo '<div class= "alert alert-success">Actualizacion relizada</div>';
              }
           }

      }

      if(isset($_POST['btn_eliminar']))
      {
        $ced  = $_POST['id_tec'];
        $exit=0;
         if ($id =="")
         {
           echo '<div class= "alert alert-success">Se requiere el número de id de tecnologia</div>';
         }
           else
           {
             $ver = $myPDO -> query ("SELECT * FROM tecnologia  WHERE id_tec = '$id'");
               WHILE ($row =$ver ->fetch())
               {
                   $exit++;
           }
           if ($exit==0)
           {
             echo '<div class= "alert alert-success">El id de tecnologia no existe en la tabla</div>';
           }
           else
           {
             $sql = "DELETE FROM tecnologia WHERE id_tec='$id'";
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