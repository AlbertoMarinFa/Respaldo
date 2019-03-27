<?php
include $_SERVER['DOCUMENT_ROOT'].'/RSP/PHP/Connection/dbconnect.php';
$Serie = $_POST['Serie'];
$Contacto = $_POST['Contacto'];
$Numero = $_POST['Numero'];
$IsDisponible = $_POST['IsDisponible'];
$idModelo = $_POST['idModelo'];
$idCuenta = $_POST['idCuenta'];
$idEstadoEquipo = $_POST['idEstadoEquipo'];
$idAES = $_POST['idAES'];
$idEstado = $_POST['idEstado'];
$idMunicipio = $_POST['idMunicipio'];

$resultadoSelect = $DBcon->query("SELECT * from equipo
  WHERE Serie = '$Serie'
  and idModelo = $idModelo
  and idEstado = $idEstado
  and idMunicipio = $idMunicipio
  and idAES = $idAES
  and idCuenta = $idCuenta
  and idEstadoEquipo = $idEstadoEquipo;") or die (mysqli_error());

if(mysqli_num_rows($resultadoSelect)==0)
{
  $query1 = $DBcon->query("INSERT into equipo (Serie,Contacto,Numero,IsDisponible,idModelo,idCuenta,idEstadoEquipo,idAES,idEstado,idMunicipio) values
  ('$Serie','$Contacto','$Numero',$IsDisponible,$idModelo,$idCuenta,$idEstadoEquipo,$idAES,$idEstado,$idMunicipio);") or die (mysqli_error());
  echo 1;
}
else{
  echo 0;
}

$DBcon->close();
?>
