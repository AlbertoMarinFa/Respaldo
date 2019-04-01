<?php
include $_SERVER['DOCUMENT_ROOT'].'/Respaldo/PHP/Connection/dbconnect.php';
$idCobertura = $_POST['idCobertura'];

$resultadoSelect = $DBcon->query("DELETE FROM cobertura where idCobertura = '$idCobertura';") or die (mysqli_error());
echo 1;

$DBcon->close();
?>
