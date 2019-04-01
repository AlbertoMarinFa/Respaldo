<?php
include $_SERVER['DOCUMENT_ROOT'].'/Respaldo/PHP/Connection/dbconnect.php';
$NombreModelo = $_POST['NombreModelo'];
$resultadoSelect = $DBcon->query("SELECT * FROM modelo where Descripcion = '$NombreModelo';");
if(mysqli_num_rows($resultadoSelect)==0)
{
  $query1 = $DBcon->query("INSERT into modelo (Descripcion) values('$NombreModelo');") or die (mysqli_error());
  echo 1;
}
else{
  echo 0;
}

$DBcon->close();
?>
