<?php
include $_SERVER['DOCUMENT_ROOT'].'/Respaldo/PHP/Connection/dbconnect.php';
$idCuenta = $_POST['idCuenta'];

$resultadoSelect = $DBcon->query("DELETE FROM cuenta where idCuenta = '$idCuenta';") or die (mysqli_error());
echo 1;

$DBcon->close();
?>
