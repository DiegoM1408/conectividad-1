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
    <center><h1>Formulario Tabla oferta</h1></center>

    <form method="POST" action="oferta.php" >

    <div class="form-group">
      <label for="id_oferta">Id oferta </label>
      <input type="text" name="id_oferta" class="form-control" id="id_oferta">
    </div>

    <div class="form-group">
        <label for="nit_licitante">Nit_licitante </label>
        <input type="text" name="nit_licitante" class="form-control" id="nit_licitante" >
    </div>

    <div class="form-group">
        <label for="id_espectro">Id espectro </label>
        <input type="text" name="id_espectro" class="form-control" id="id_espectro" >
    </div>

    <div class="form-group">
        <label for="oferta_monetaria">Oferta Monetaria </label>
        <input type="text" name="oferta_monetaria" class="form-control" id="oferta_monetaria">
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

      $id_ofer    ="";
      $nit   ="";
      $id_espec  ="";
      $monet  ="";
      $tel    ="";

      if(isset($_POST['btn_consultar']))
      {
        $id_ofer  = $_POST['id_oferta'];
        $exit=0;

         if ($id_ofer =="")
         {
           echo '<div class= "alert alert-success">Se requiere el número de id_oferta</div>';

         }
           else
           {
             $ver = $myPDO -> query ("SELECT * FROM oferta  WHERE id_oferta = '$id_ofer'");
               WHILE ($row =$ver ->fetch())
               {
                   echo $row['id_oferta'].'<br>';
                   echo $row['nit_licitante'].'<br>';
                   echo $row['id_espectro'].'<br>';
                   echo $row['oferta_monetaria'].'<br>';
                   $exit++;
           }
           if ($exit==0)
           {
             echo '<div class= "alert alert-success">La id_oferta del oferta no existe en la tabla</div>';
           }
        }
      }

      if(isset($_POST['btn_nuevo']))
      {
        $id_ofer  = $_POST['id_oferta'];
        $nit = $_POST ['nit_licitante'];
        $id_espec = $_POST ['id_espectro'];
        $monet= $_POST ['oferta_monetaria'];

         if ($id_ofer =="")
         {
           echo '<div class= "alert alert-success">El campo id_oferta es obligatorio </div>';
         }
           else
           {
           $sql_insert = "INSERT INTO oferta (id_oferta,nit_licitante,id_espectro,
             oferta_monetaria,telefono)
            VALUES ('$id_ofer', '$nit','$id_espec','$monet','$tel')";
           $myPDO -> query($sql_insert);

          echo '<div class= "alert alert-success">El oferta se registro en la tabla</div>';
           }

      }

      if(isset($_POST['btn_actualizar']))
      {
        $id_ofer  = $_POST['id_oferta'];
        $nit = $_POST ['nit_licitante'];
        $id_espec = $_POST ['id_espectro'];
        $monet= $_POST ['oferta_monetaria'];
    

         if ($id_ofer =="")
         {
           echo '<div class= "alert alert-success">El campo: id_oferta es obligatorio</div>';
         }
           else
           {
             $exit=0;
             $ver = $myPDO -> query ("SELECT * FROM oferta  WHERE id_oferta = '$id_ofer'");
               WHILE ($row =$ver ->fetch())
               {
                   $exit++;
             }
             if ($exit==0)
             {
             echo '<div class= "alert alert-success">La id_oferta del oferta no existe en la tabla</div>';
             }
              else
              {
                $sql_update = "UPDATE oferta SET
                               id_oferta='$id_ofer',
                               nit_licitante ='$nit',
                               id_espectro='$id_espec',
                               oferta_monetaria='$monet',
                             WHERE id_oferta='$id_ofer'";
                $myPDO -> query($sql_update);

                echo '<div class= "alert alert-success">Actualizacion relizada</div>';
              }
           }

      }

      if(isset($_POST['btn_eliminar']))
      {
        $id_ofer  = $_POST['id_oferta'];
        $exit=0;
         if ($id_ofer =="")
         {
           echo '<div class= "alert alert-success">Se requiere el número de id_oferta</div>';
         }
           else
           {
             $ver = $myPDO -> query ("SELECT * FROM oferta  WHERE id_oferta = '$id_ofer'");
               WHILE ($row =$ver ->fetch())
               {
                   $exit++;
           }
           if ($exit==0)
           {
             echo '<div class= "alert alert-success">El id_oferta del oferta no existe en la tabla</div>';
           }
           else
           {
             $sql = "DELETE FROM oferta WHERE id_oferta='$id_ofer'";
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