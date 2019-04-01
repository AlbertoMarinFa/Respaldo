<?php
include $_SERVER['DOCUMENT_ROOT'].'/Respaldo/PHP/Connection/dbconnect.php';
$Nombre = $_POST['NombreCobertura'];
$resultadoSelect = $DBcon->query("SELECT * FROM cobertura where Nombre = '$Nombre';");
if(mysqli_num_rows($resultadoSelect)==0)
{
  $query1 = $DBcon->query("INSERT into cobertura (Nombre) values('$Nombre');") or die (mysqli_error());
  echo 1;
}
else{
  echo 0;
}

$DBcon->close();
?>
