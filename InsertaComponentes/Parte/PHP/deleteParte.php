<?php
include $_SERVER['DOCUMENT_ROOT'].'/Respaldo/PHP/Connection/dbconnect.php';
$idPartes = $_POST['idParte'];

$resultadoSelect = $DBcon->query("DELETE FROM catpartes where idPartes = '$idPartes';") or die (mysqli_error());
echo 1;

$DBcon->close();
?>
