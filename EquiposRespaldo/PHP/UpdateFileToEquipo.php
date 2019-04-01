<?php
include $_SERVER['DOCUMENT_ROOT'].'/Respaldo/PHP/Connection/dbconnect.php';
$idArchivo = $_POST['idArchivo'];
$idEquipo = $_POST['idEquipo'];

$query1 = $DBcon->query("INSERT into documentos (Descripcion,idEquipo,idTipoDocumento) values ('$idArchivo',$idEquipo,1);") or die (mysqli_error());
echo 1;

$DBcon->close();
?>
