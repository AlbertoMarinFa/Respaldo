<?php
include $_SERVER['DOCUMENT_ROOT'].'/Respaldo/PHP/Connection/dbconnect.php';
$idtipoDocumento = $_POST['idDocumento'];

$resultadoSelect = $DBcon->query("DELETE FROM tipodocumento where idtipoDocumento = '$idtipoDocumento';") or die (mysqli_error());
echo 1;

$DBcon->close();
?>
