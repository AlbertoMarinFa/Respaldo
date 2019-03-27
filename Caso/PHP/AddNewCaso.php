<?php
include $_SERVER['DOCUMENT_ROOT'].'/RSP/PHP/Connection/dbconnect.php';
$idEquipo = $_POST['idEquipo'];
$CodEstatusCaso = $_POST['CodEstatusCaso'];
$NumeroCaso = $_POST['NumeroCaso'];

$query1 = $DBcon->query("INSERT INTO caso (idEquipo,FechaInicio,CodEstatusCaso,NumeroCaso) VALUES
($idEquipo,now(),$CodEstatusCaso, $NumeroCaso);");
echo 1;

$DBcon->close();
?>
