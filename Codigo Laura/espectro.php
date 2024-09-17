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
    <center><h1>Formulario Tabla Espectro</h1></center>

    <form method="POST" action="espectro.php" >

    <div class="form-group">
      <label for="id_espectro">Espectro </label>
      <input type="text" name="id_espectro" class="form-control" id="id_espectro">
    </div>

    <div class="form-group">
        <label for="ancho_banda">Ancho de banda </label>
        <input type="text" name="ancho_banda" class="form-control" id="ancho_banda" >
    </div>

    <div class="form-group">
        <label for="frecuencia">Frecuencia </label>
        <input type="text" name="frecuencia" class="form-control" id="frecuencia" >
    </div>

    <div class="form-group">
        <label for="id_region">Id region </label>
        <input type="text" name="id_region" class="form-control" id="id_region">
    </div>

    <div class="form-group">
        <label for="id_convocatoria">Id convocatoria </label>
        <input type="text" name="id_convocatoria" class="form-control" id="id_convocatoria">
    </div>

    <div class="form-group">
        <label for="id_oferta">Id oferta </label>
        <input type="text" name="id_oferta" class="form-control" id="id_oferta">
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

      $id_espec    ="";
      $ancho_banda   ="";
      $frecu  ="";
      $id_reg  ="";
      $id_convo    ="";
      $id_ofer="";

      if(isset($_POST['btn_consultar']))
      {
        $id_espec  = $_POST['id_espectro'];
        $exit=0;

         if ($id_espec =="")
         {
           echo '<div class= "alert alert-success">Se requiere el id de espectro</div>';

         }
           else
           {
             $ver = $myPDO -> query ("SELECT * FROM espectro  WHERE id_espectro = '$id_espec'");
               WHILE ($row =$ver ->fetch())
               {
                   echo $row['id_espectro'].'<br>';
                   echo $row['ancho_banda'].'<br>';
                   echo $row['frecuencia'].'<br>';
                   echo $row['id_region'].'<br>';
                   echo $row['id_convocatoria'].'<br>';
                   echo $row['id_oferta'].'<br>';
                   $exit++;
           }
           if ($exit==0)
           {
             echo '<div class= "alert alert-success">El id del espectro no existe en la tabla</div>';
           }
        }
      }

      if(isset($_POST['btn_nuevo']))
      {
        $id_espec  = $_POST['id_espectro'];
        $ancho_banda = $_POST ['ancho_banda'];
        $frecu = $_POST ['frecuencia'];
        $id_reg= $_POST ['id_region'];
        $id_convo = $_POST ['id_convocatoria'];
        $id_ofer = $_POST ['id_oferta'];

         if ($id_espec =="")
         {
           echo '<div class= "alert alert-success">El campo: id_espectro es obligatorio</div>';
         }
           else
           {
           $sql_insert = "INSERT INTO espectro (id_espectro,ancho_banda,frecuencia,
             id_region,id_convocatoria,id_oferta)
            VALUES ('$id_espec', '$ancho_banda','$frecu','$id_reg','$id_convo','$id_ofer')";
           $myPDO -> query($sql_insert);

          echo '<div class= "alert alert-success">El espectro se registro en la tabla</div>';
           }

      }

      if(isset($_POST['btn_actualizar']))
      {
        $id_espec  = $_POST['id_espectro'];
        $ancho_banda = $_POST ['ancho_banda'];
        $frecu = $_POST ['frecuencia'];
        $id_reg= $_POST ['id_region'];
        $id_convo = $_POST ['id_convocatoria'];
        $id_ofer = $_POST ['id_oferta'];

        if ($id_espec =="")
        {
          echo '<div class= "alert alert-success">El campo: id_espectro es obligatorio</div>';
        }
          else
           {
             $exit=0;
             $ver = $myPDO -> query ("SELECT * FROM espectrp  WHERE id_espectro = '$id_espec'");
               WHILE ($row =$ver ->fetch())
               {
                   $exit++;
             }
             if ($exit==0)
             {
             echo '<div class= "alert alert-success">El id del espectro no existe en la tabla</div>';
             }
              else
              {
                $sql_update = "UPDATE autor SET
                               id_espectro='$id_espec',
                               ancho_banda ='$ancho_banda',
                               frecuencia='$frecu',
                               id_region='$id_reg',
                               id_convocatoria='$id_convo'
                               id_oferta='$id_ofer'
                             WHERE cedula='$id_espec'";
                $myPDO -> query($sql_update);

                echo '<div class= "alert alert-success">Actualizacion relizada</div>';
              }
           }

      }

      if(isset($_POST['btn_eliminar']))
      {
        $id_espect  = $_POST['cedula'];
        $exit=0;
         if ($ced =="")
         {
           echo '<div class= "alert alert-success">Se requiere el número del id del espectro</div>';
         }
           else
           {
             $ver = $myPDO -> query ("SELECT * FROM espectro  WHERE id_espectro = '$id_espec'");
               WHILE ($row =$ver ->fetch())
               {
                   $exit++;
           }
           if ($exit==0)
           {
             echo '<div class= "alert alert-success">El Id del espectro no existe en la tabla</div>';
           }
           else
           {
             $sql = "DELETE FROM espectro WHERE id_espectro='$id_espec'";
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