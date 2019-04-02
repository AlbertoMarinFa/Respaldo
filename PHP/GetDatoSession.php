<?php
include $_SERVER['DOCUMENT_ROOT'].'/Respaldo/PHP/Connection/dbconnect.php';
$Usuario = $_POST['Usuario'];

$resultadoSelect = $DBcon->query("SELECT idUsuario from usuario WHERE Nombre = '$Usuario';") or die (mysqli_error());

while ($userRow1 = $resultadoSelect->fetch_assoc()) {
  echo $userRow1["idUsuario"];
}
while ($DBcon->more_results() && $DBcon->next_result());

$DBcon->close();
?>
