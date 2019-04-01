<?php
include $_SERVER['DOCUMENT_ROOT'].'/Respaldo/PHP/Connection/dbconnect.php';
$NombreCuenta = $_POST['NombreCuenta'];
$resultadoSelect = $DBcon->query("SELECT * FROM cuenta where NombreCuenta = '$NombreCuenta';");
if(mysqli_num_rows($resultadoSelect)==0)
{
  $query1 = $DBcon->query("INSERT into cuenta (NombreCuenta) values('$NombreCuenta');") or die (mysqli_error());
  echo 1;
}
else{
  echo 0;
}

$DBcon->close();
?>
