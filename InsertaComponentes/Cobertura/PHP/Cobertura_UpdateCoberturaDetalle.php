<?php
include $_SERVER['DOCUMENT_ROOT'].'/Respaldo/PHP/Connection/dbconnect.php';
$idCobertura = $_POST['idCobertura'];
$idEstado = $_POST['idEstado'];
$idMunicipio = $_POST['idMunicipio'];
$idDetalleCobertura = $_POST['idDetalleCobertura'];
$isActive = $_POST['isActive'];
if($idDetalleCobertura == 0){
  $resultadoSelect = $DBcon->query("INSERT INTO detallecobertura (idEstado,idMunicipio,idCobertura,isActive) values($idEstado,$idMunicipio,$idCobertura,1);") or die (mysqli_error());
  echo 1;
}
else{
  $resultadoSelect = $DBcon->query("UPDATE detallecobertura set isActive = $isActive where idDetalleCobertura = $idDetalleCobertura ;") or die (mysqli_error());
  echo 2;
}

$DBcon->close();
?>
