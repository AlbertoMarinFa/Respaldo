<?php
include $_SERVER['DOCUMENT_ROOT'].'/Respaldo/PHP/Connection/dbconnect.php';
$idCaso = $_POST['idCaso'];

$query1 = $DBcon->query("UPDATE caso set FechaFin = now(), CodEstatusCaso = 2 where idCaso = $idCaso;");
echo 1;

$DBcon->close();
?>
