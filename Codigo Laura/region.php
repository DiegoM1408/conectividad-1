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
    <center><h1>Formulario Tabla region</h1></center>

    <form method="POST" action="region.php" >

    <div class="form-group">
      <label for="id_region">Id_region</label>
      <input type="text" name="id_region" class="form-control" id="id_region">
    </div>

    <div class="form-group">
        <label for="nombre">Nombre </label>
        <input type="text" name="nombre" class="form-control" id="nombre" >
    </div>

    <div class="form-group">
        <label for="poblacion">Poblacion </label>
        <input type="text" name="poblacion" class="form-control" id="poblacion" >
    </div>

    <div class="form-group">
        <label for="ubicacion">Ubicacion </label>
        <input type="text" name="ubicacion" class="form-control" id="ubicacion">
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

      $id    ="";
      $nomb   ="";
      $ubi  ="";
      $pobla  ="";

      if(isset($_POST['btn_consultar']))
      {
        $id  = $_POST['id_region'];
        $exit=0;

         if ($id =="")
         {
           echo '<div class= "alert alert-success">Se requiere el número de id</div>';

         }
           else
           {
             $ver = $myPDO -> query ("SELECT * FROM region  WHERE id_region = '$id'");
               WHILE ($row =$ver ->fetch())
               {
                   echo $row['id_region'].'<br>';
                   echo $row['nombre'].'<br>';
                   echo $row['poblacion'].'<br>';
                   echo $row['ubicacion'].'<br>';
                   $exit++;
           }
           if ($exit==0)
           {
             echo '<div class= "alert alert-success">el id de region no existe en la tabla</div>';
           }
        }
      }

      if(isset($_POST['btn_nuevo']))
      {
        $id  = $_POST['id_region'];
        $nomb = $_POST ['nombre'];
        $ubi = $_POST ['ubicacion'];
        $pobla= $_POST ['poblacion'];

         if ($id =="")
         {
           echo '<div class= "alert alert-success">Los campos: id_region es obligatorio</div>';
         }
           else
           {
           $sql_insert = "INSERT INTO region (id_region, nombre, ubicacion, poblacion)
            VALUES ('$id', '$nomb','$ubi','$pobla')";
           $myPDO -> query($sql_insert);

          echo '<div class= "alert alert-success">La region se registro en la tabla</div>';
           }

      }

      if(isset($_POST['btn_actualizar']))
      {
        $id  = $_POST['id_region'];
        $nomb = $_POST ['nombre'];
        $ubi = $_POST ['ubicacion'];
        $pobla= $_POST ['poblacion'];

         if ($id =="")
         {
           echo '<div class= "alert alert-success">el campo id_region es obligatorio</div>';
         }
           else
           {
             $exit=0;
             $ver = $myPDO -> query ("SELECT * FROM region  WHERE id_region = '$id'");
               WHILE ($row =$ver ->fetch())
               {
                   $exit++;
             }
             if ($exit==0)
             {
             echo '<div class= "alert alert-success">el id de region no existe en la tabla</div>';
             }
              else
              {
                $sql_update = "UPDATE region SET
                               id_region='$id',
                               nombre ='$nomb',
                               ubicacion='$ubi',
                               poblacion='$pobla',
                             WHERE id_region='$id'";
                $myPDO -> query($sql_update);

                echo '<div class= "alert alert-success">Actualizacion relizada</div>';
              }
           }

      }

      if(isset($_POST['btn_eliminar']))
      {
        $id  = $_POST['id_region'];
        $exit=0;
         if ($id =="")
         {
           echo '<div class= "alert alert-success">Se requiere el número de id_region</div>';
         }
           else
           {
             $ver = $myPDO -> query ("SELECT * FROM region  WHERE id_region = '$id'");
               WHILE ($row =$ver ->fetch())
               {
                   $exit++;
           }
           if ($exit==0)
           {
             echo '<div class= "alert alert-success">El id de region no existe en la tabla</div>';
           }
           else
           {
             $sql = "DELETE FROM id_region WHERE id_region='$id'";
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