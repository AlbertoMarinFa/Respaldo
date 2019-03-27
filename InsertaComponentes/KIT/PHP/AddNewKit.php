<?php
include $_SERVER['DOCUMENT_ROOT'].'/RSP/PHP/Connection/dbconnect.php';
$NombreKit = $_POST['NombreKit'];
$resultadoSelect = $DBcon->query("SELECT * FROM cattipokit where Descripcion = '$NombreKit';");
if(mysqli_num_rows($resultadoSelect)==0)
{
  $query1 = $DBcon->query("INSERT into cattipokit (Descripcion) values('$NombreKit');") or die (mysqli_error());
  echo 1;
}
else{
  echo 0;
}

$DBcon->close();
?>
