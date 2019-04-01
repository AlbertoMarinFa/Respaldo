<?php
include $_SERVER['DOCUMENT_ROOT'].'/Respaldo/PHP/Connection/dbconnect.php';
$idModelo = $_POST['idModelo'];

$resultadoSelect = $DBcon->query("DELETE FROM modelo where idModelo = '$idModelo';") or die (mysqli_error());
echo 1;

$DBcon->close();
?>
