<?php
include $_SERVER['DOCUMENT_ROOT'].'/Respaldo/PHP/Connection/dbconnect.php';
$idEquipo = $_POST['idEquipo'];
$idCaso = $_POST['idCaso'];

$query1 = $DBcon->query("SELECT idDocumentos,
Descripcion,
idEquipo,
idTipoDocumento,
idCaso,
DATE_FORMAT(FechaInsert, '%m/%d/%Y %H:%i')FechaInsert,
Comentario
FROM documentos where idEquipo = $idEquipo
AND idCaso = $idCaso order by FechaInsert desc;") or die (mysqli_error());

$rowcount = mysqli_num_rows($query1);

if($rowcount != 0){
  $count = 1;
  while ($userRow1 = $query1->fetch_assoc()) {
  echo '</tr>
  <td style="font-size: 13px">'.$count.'</td>
  <td style="font-size: 13px">'.$userRow1["Comentario"].'</td>
  <td style="font-size: 13px">'.$userRow1["FechaInsert"].'</td>
  <td style="font-size: 13px"><a target="_blank" onclick=\'href = "/Respaldo/Archivos/\ArchivosCaso/'.$userRow1["Descripcion"].'";\' data-sub-html="" data-toggle="tooltip" title="Ver archivo" class="fa fa-file" style="font-size: 40px;cursor: pointer;"></a></td>
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
