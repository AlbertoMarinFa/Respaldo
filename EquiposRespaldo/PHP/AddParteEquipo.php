<?php
include $_SERVER['DOCUMENT_ROOT'].'/RSP/PHP/Connection/dbconnect.php';
$idEquipo = $_POST['idEquipo'];
$idParte = $_POST['idParte'];

$resultadoSelect = $DBcon->query("SELECT *
  from equipoparte
  where idEquipo = $idEquipo and idParte = $idParte;") or die (mysqli_error());

if(mysqli_num_rows($resultadoSelect)==0)
{
  $query1 = $DBcon->query("INSERT INTO equipoparte
    (idEquipo,idParte,isActive) VALUES
    ($idEquipo,$idParte,1);") or die (mysqli_error());
  echo 1;
}
else{
  echo 0;
}

$DBcon->close();
?>
