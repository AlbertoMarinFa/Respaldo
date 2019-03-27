<?php
include $_SERVER['DOCUMENT_ROOT'].'/RSP/PHP/Connection/dbconnect.php';
$NombreDocumento = $_POST['NombreDocumento'];
$resultadoSelect = $DBcon->query("SELECT * FROM tipodocumento where Descripcion = '$NombreDocumento';");
if(mysqli_num_rows($resultadoSelect)==0)
{
  $query1 = $DBcon->query("INSERT into tipodocumento (Descripcion) values('$NombreDocumento');") or die (mysqli_error());
  echo 1;
}
else{
  echo 0;
}

$DBcon->close();
?>
