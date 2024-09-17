<?php

try {
$myPDO = new PDO("pgsql:host=localhost;dbname=subasta","postgres","chimuela");
   
echo "Esta conectado a la base de datos de PostgreSQL";

} catch (PDOException $e) {
  echo $e -> getMessage();
}

 ?>
 
