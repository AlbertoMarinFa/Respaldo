<?php
include $_SERVER['DOCUMENT_ROOT'].'/Respaldo/PHP/Connection/dbconnect.php';
$idTipoKit = $_POST['idTipoKit'];

$resultadoSelect = $DBcon->query("DELETE FROM cattipokit where idtipokit = '$idTipoKit';") or die (mysqli_error());
echo 1;

$DBcon->close();
?>
