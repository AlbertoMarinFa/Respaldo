<?php
include $_SERVER['DOCUMENT_ROOT'].'/Respaldo/PHP/Connection/dbconnect.php';
$idCaso = $_POST['idCaso'];

$query1 = $DBcon->query("SELECT comentarios.idComentarios,usuario.Nombre,comentarios.Descrpcion,comentarios.FechaInsert
from comentarios
inner join caso on caso.idCaso = comentarios.idCaso
inner join usuario on usuario.idUsuario = comentarios.idUsuario
where comentarios.idCaso = $idCaso;") or die (mysqli_error());

$rowcount = mysqli_num_rows($query1);

if($rowcount != 0){
  $count = 1;
  while ($userRow1 = $query1->fetch_assoc()) {
  echo '</tr>
  <td style="font-size: 13px">'.$count.'</td>
  <td style="font-size: 13px">'.$userRow1["Descrpcion"].'</td>
  <td style="font-size: 13px">'.$userRow1["Nombre"].'</td>
  <td style="font-size: 13px">'.$userRow1["FechaInsert"].'</td>
  </tr>';

  $count++;
  }
  while ($DBcon->more_results() && $DBcon->next_result());
}
else{
  echo 0;
}
$DBcon->close();
?>
