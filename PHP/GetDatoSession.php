<?php
include $_SERVER['DOCUMENT_ROOT'].'/Respaldo/PHP/Connection/dbconnect.php';
$Usuario = $_POST['Usuario'];

$resultadoSelect = $DBcon->query("SELECT idUsuario,codTipoUsuario from usuario WHERE Nombre = '$Usuario';") or die (mysqli_error());

$colors = [];
while ($userRow1 = $resultadoSelect->fetch_assoc()) {
  $colors = array("idUsuario"=>$userRow1["idUsuario"], "codTipoUsuario"=>$userRow1["codTipoUsuario"]);
}
while ($DBcon->more_results() && $DBcon->next_result());

echo json_encode($colors);
$DBcon->close();
?>
