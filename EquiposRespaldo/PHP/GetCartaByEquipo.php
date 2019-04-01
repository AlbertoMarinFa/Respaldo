<?php
include $_SERVER['DOCUMENT_ROOT'].'/Respaldo/PHP/Connection/dbconnect.php';
$idEquipo = $_POST['idEquipo'];

$query1 = $DBcon->query("SELECT idEquipo,descripcion Archivo from documentos where idequipo = $idEquipo LIMIT 1;") or die (mysqli_error());
$rowcount = mysqli_num_rows($query1);
if($rowcount != 0){
  while ($userRow1 = $query1->fetch_assoc()) {
    echo '/Respaldo/Archivos/CartaResponsiva/' . $userRow1["Archivo"];
  }
  while ($DBcon->more_results() && $DBcon->next_result());
}
else{
  echo 0;
}

$DBcon->close();
?>
