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
    <center><h1>Formulario Tabla Requisitos</h1></center>

    <form method="POST" action="requisitos.php" >

    <div class="form-group">
      <label for="id_requisitos">Id_requisitos</label>
      <input type="text" name="id_requisitos" class="form-control" id="id_requisitos">
    </div>

    <div class="form-group">
        <label for="despliegue">Despliegue </label>
        <input type="text" name="despliegue" class="form-control" id="despliegue" >
    </div>

    <div class="form-group">
        <label for="objetivos">Objetivos </label>
        <input type="text" name="objetivos" class="form-control" id="objetivos" >
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
      $despli   ="";
      $obje  ="";
     

      if(isset($_POST['btn_consultar']))
      {
        $id  = $_POST['id_requisitos'];
        $exit=0;

         if ($id =="")
         {
           echo '<div class= "alert alert-success">Se requiere el número de id_requisitos</div>';

         }
           else
           {
             $ver = $myPDO -> query ("SELECT * FROM requisitos  WHERE id_requisitos = '$id'");
               WHILE ($row =$ver ->fetch())
               {
                   echo $row['id_requisitos'].'<br>';
                   echo $row['despliegue'].'<br>';
                   echo $row['objetivos'].'<br>';
                   $exit++;
           }
           if ($exit==0)
           {
             echo '<div class= "alert alert-success">La id_requisitos de requisitos no existe en la tabla</div>';
           }
        }
      }

      if(isset($_POST['btn_nuevo']))
      {
        $id  = $_POST['id_requisitos'];
        $despli = $_POST ['despliegue'];
        $obje = $_POST ['objetivos'];

         if ($id =="")
         {
           echo '<div class= "alert alert-success">el campo: id_requisitos es obligatorio</div>';
         }
           else
           {
           $sql_insert = "INSERT INTO requisitos (id_requisitos,despliegue,objetivos)
            VALUES ('$id', '$despli','$obje')";
           $myPDO -> query($sql_insert);

          echo '<div class= "alert alert-success">El requisitos se registro en la tabla</div>';
           }

      }

      if(isset($_POST['btn_actualizar']))
      {
        $id  = $_POST['id_requisitos'];
        $despli = $_POST ['despliegue'];
        $obje = $_POST ['objetivos'];

         if ($id =="")
         {
           echo '<div class= "alert alert-success">el campo: id_requisitos es obligatorio</div>';
         }
           else
           {
             $exit=0;
             $ver = $myPDO -> query ("SELECT * FROM requisitos  WHERE id_requisitos = '$id'");
               WHILE ($row =$ver ->fetch())
               {
                   $exit++;
             }
             if ($exit==0)
             {
             echo '<div class= "alert alert-success">La id_requisitos del requisitos no existe en la tabla</div>';
             }
              else
              {
                $sql_update = "UPDATE requisitos SET
                               id_requisitos='$id',
                               despliegue ='$despli',
                               objetivos='$obje',
                             WHERE id_requisitos='$id'";
                $myPDO -> query($sql_update);

                echo '<div class= "alert alert-success">Actualizacion relizada</div>';
              }
           }

      }

      if(isset($_POST['btn_eliminar']))
      {
        $id  = $_POST['id_requisitos'];
        $exit=0;
         if ($id =="")
         {
           echo '<div class= "alert alert-success">Se requiere el número de id_requisitos</div>';
         }
           else
           {
             $ver = $myPDO -> query ("SELECT * FROM requisitos  WHERE id_requisitos = '$id'");
               WHILE ($row =$ver ->fetch())
               {
                   $exit++;
           }
           if ($exit==0)
           {
             echo '<div class= "alert alert-success">La id_requisitos del requisitos no existe en la tabla</div>';
           }
           else
           {
             $sql = "DELETE FROM requisitos WHERE id_requisitos='$id'";
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