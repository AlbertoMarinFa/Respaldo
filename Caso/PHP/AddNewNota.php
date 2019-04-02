<?php
include $_SERVER['DOCUMENT_ROOT'].'/Respaldo/PHP/Connection/dbconnect.php';
$Descrpcion = $_POST['Descrpcion'];
$idCaso = $_POST['idCaso'];
$idUsuario = $_POST['idUsuario'];

$resultadoSelect = $DBcon->query("INSERT into comentarios (Descrpcion,idCaso,idUsuario,FechaInsert)
values ('$Descrpcion',$idCaso,$idUsuario,now());") or die (mysqli_error());

echo "1";

$DBcon->close();
?>
