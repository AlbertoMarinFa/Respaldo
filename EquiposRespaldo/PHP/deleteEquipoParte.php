<?php
include $_SERVER['DOCUMENT_ROOT'].'/RSP/PHP/Connection/dbconnect.php';
$idEquipoParte = $_POST['idEquipoParte'];

$resultadoSelect = $DBcon->query("DELETE FROM equipoparte where idEquipoParte = $idEquipoParte;") or die (mysqli_error());
echo 1;

$DBcon->close();
?>
