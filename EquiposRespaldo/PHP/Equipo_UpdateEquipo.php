<?php
include $_SERVER['DOCUMENT_ROOT'].'/RSP/PHP/Connection/dbconnect.php';
$idEquipo = $_POST['idEquipo'];
$Contacto = $_POST['Contacto'];
$Numero = $_POST['Numero'];
$IsDisponible = $_POST['IsDisponible'];
$idEstadoEquipo = $_POST['idEstadoEquipo'];

$resultadoSelect = $DBcon->query("UPDATE equipo set Contacto = '$Contacto' ,Numero = '$Numero', IsDisponible = $IsDisponible,
  idEstadoEquipo = $idEstadoEquipo where idEquipo = $idEquipo;") or die (mysqli_error());
  echo 1;

$DBcon->close();
?>
