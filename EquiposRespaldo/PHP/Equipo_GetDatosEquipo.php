<?php
include $_SERVER['DOCUMENT_ROOT'].'/Respaldo/PHP/Connection/dbconnect.php';
$idEquipo = $_POST['idEquipo'];

$resultadoSelect = $DBcon->query("SELECT ifnull(Contacto,'')Contacto,ifnull(Numero,'')Numero,
IsDisponible,idEstadoEquipo
from equipo where equipo.idEquipo = $idEquipo;") or die (mysqli_error());
$tennisArray = [];
  while ($userRow1 = $resultadoSelect->fetch_assoc()) {
    $tennisArray = array('Contacto' => $userRow1["Contacto"], 'Numero' => $userRow1["Numero"],
    'IsDisponible' => $userRow1["IsDisponible"], 'idEstadoEquipo' => $userRow1["idEstadoEquipo"]);
  }
  while ($DBcon->more_results() && $DBcon->next_result());

  echo json_encode($tennisArray);
$DBcon->close();
?>
