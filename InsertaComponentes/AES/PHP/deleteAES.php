<?php
include $_SERVER['DOCUMENT_ROOT'].'/Respaldo/PHP/Connection/dbconnect.php';
$idAES = $_POST['idAES'];

$resultadoSelect = $DBcon->query("DELETE FROM aes where idAES = $idAES;") or die (mysqli_error());
echo 1;

$DBcon->close();
?>
